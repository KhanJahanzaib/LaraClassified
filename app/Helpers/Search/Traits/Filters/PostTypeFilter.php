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

namespace App\Helpers\Search\Traits\Filters;

use App\Models\PostType;
use Illuminate\Support\Facades\Cache;

trait PostTypeFilter
{
	protected function applyPostTypeFilter()
	{
		if (config('settings.single.show_listing_types') != '1') {
			return;
		}
		
		if (!isset($this->posts)) {
			return;
		}
		
		$postTypeId = null;
		if (request()->filled('type')) {
			$postTypeId = request()->get('type');
		}
		
		if (!empty($postTypeId)) {
			if (!$this->checkIfPostTypeExists($postTypeId)) {
				abort(404, t('The requested listing type does not exist'));
			}
			
			$this->posts->where('post_type_id', $postTypeId);
		}
	}
	
	/**
	 * Check if PostType exist(s)
	 *
	 * @param $postTypeId
	 * @return bool
	 */
	private function checkIfPostTypeExists($postTypeId)
	{
		$found = false;
		
		// If Listing Type is filled, then check if the Listing Type exists
		if (!empty($postTypeId)) {
			$cacheId = 'search.postType.' . $postTypeId . '.' . config('app.locale');
			$postType = Cache::remember($cacheId, self::$cacheExpiration, function () use ($postTypeId) {
				return PostType::where('id', $postTypeId)->first(['id']);
			});
			
			if (!empty($postType)) {
				$found = true;
			}
		} else {
			$found = true;
		}
		
		return $found;
	}
}
