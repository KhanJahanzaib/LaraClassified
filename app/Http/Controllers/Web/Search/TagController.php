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

namespace App\Http\Controllers\Web\Search;

use App\Helpers\Search\PostQueries;
use Torann\LaravelMetaTags\Facades\MetaTag;

class TagController extends BaseController
{
	public $isTagSearch = true;
	public $tag;
	
	/**
	 * @param $countryCode (Can be $tag or $countryCode)
	 * @param null $tag
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($countryCode, $tag = null)
	{
		// Check multi-countries site parameters
		if (!config('settings.seo.multi_countries_urls')) {
			$tag = $countryCode;
		}
		
		view()->share('isTagSearch', $this->isTagSearch);
		
		// Get Tag
		$this->tag = rawurldecode($tag);
		
		// Search
		$data = (new PostQueries())->fetch();
		
		// Get Titles
		$bcTab = $this->getBreadcrumb();
		$htmlTitle = $this->getHtmlTitle();
		view()->share('bcTab', $bcTab);
		view()->share('htmlTitle', $htmlTitle);
		
		// Meta Tags
		[$title, $description, $keywords] = $this->getMetaTag();
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		MetaTag::set('keywords', $keywords);
		
		// Translation vars
		view()->share('uriPathTag', $tag);
		
		return appView('search.results', $data);
	}
}