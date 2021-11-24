<?php
/**
 * LaraClassifier - Classified Ads Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Http\Requests\Admin;

use App\Helpers\Number;
use App\Rules\BetweenRule;

class PostRequest extends Request
{
	/**
	 * Prepare the data for validation.
	 *
	 * @return void
	 */
	protected function prepareForValidation()
	{
		$input = $this->all();
		
		// price
		if ($this->has('price')) {
			if ($this->filled('price')) {
				$input['price'] = $this->input('price');
				// If field's value contains only numbers and dot,
				// Then decimal separator is set as dot.
				if (preg_match('/^[0-9\.]*$/', $input['price'])) {
					$input['price'] = Number::formatForDb($input['price'], '.');
				} else {
					$input['price'] = Number::formatForDb($input['price'], config('currency.decimal_separator', '.'));
				}
			} else {
				$input['price'] = null;
			}
		}
		
		// tags
		if ($this->filled('tags')) {
			$input['tags'] = tagCleaner($this->input('tags'));
		}
		
		request()->merge($input); // Required!
		$this->merge($input);
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [];
		$rules['category_id'] = ['required', 'not_in:0'];
		if (config('settings.single.show_listing_types')) {
			$rules['post_type_id'] = ['required', 'not_in:0'];
		}
		$rules['title'] = [
			'required',
			new BetweenRule(
				(int)config('settings.single.title_min_length', 2),
				(int)config('settings.single.title_max_length', 150)
			)
		];
		$rules['description'] = [
			'required',
			new BetweenRule(
				(int)config('settings.single.description_min_length', 5),
				(int)config('settings.single.description_max_length', 6000)
			)
		];
		$rules['contact_name'] = ['required', new BetweenRule(2, 200)];
		$rules['email'] = ['required', 'email', 'max:100'];
		
		// Tags
		if ($this->filled('tags')) {
			$rules['tags.*'] = ['regex:' . tagRegexPattern()];
		}
		
		return $rules;
	}
	
	/**
	 * Get custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes()
	{
		$attributes = [];
		
		if ($this->filled('tags')) {
			foreach ($this->input('tags') as $key => $tag) {
				$attributes['tags.' . $key] = t('tag X', ['key' => ($key + 1)]);
			}
		}
		
		return $attributes;
	}
}
