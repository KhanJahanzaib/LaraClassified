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

namespace App\Http\Controllers\Web\Search\Traits;

use App\Helpers\Search\PostQueries;
use App\Helpers\UrlGen;
use App\Http\Controllers\Web\Post\Traits\CatBreadcrumbTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait TitleTrait
{
	use CatBreadcrumbTrait;
	
	/**
	 * Get Search Meta Tags
	 *
	 * @return string[]
	 */
	public function getMetaTag()
	{
		$metaTag = ['title' => '', 'description' => '', 'keywords' => ''];
		
		[$title, $description, $keywords] = getMetaTag('search');
		
		$fallbackTitle = '';
		
		// Init.
		$fallbackTitle .= t('classified_ads');
		
		// Keyword
		if (request()->filled('q')) {
			$fallbackTitle .= ' ' . t('for') . ' ';
			$fallbackTitle .= '"' . rawurldecode(request()->get('q')) . '"';
		}
		
		// Category
		if (isset($this->cat) && !empty($this->cat)) {
			[$title, $description, $keywords] = getMetaTag('searchCategory');
			
			// SubCategory
			if (isset($this->subCat) && !empty($this->subCat)) {
				$title = str_replace('{category.name}', $this->subCat->name, $title);
				$title = str_replace('{category.title}', $this->subCat->seo_title, $title);
				$description = str_replace('{category.name}', $this->subCat->name, $description);
				$description = str_replace('{category.description}', $this->subCat->seo_description, $description);
				$keywords = str_replace('{category.name}', mb_strtolower($this->subCat->name), $keywords);
				$keywords = str_replace('{category.keywords}', mb_strtolower($this->subCat->seo_keywords), $keywords);
				
				$fallbackTitle .= ' ' . $this->subCat->name . ',';
				if (!empty($this->subCat->seo_description)) {
					$fallbackDescription = $this->subCat->seo_description . ', ' . config('country.name');
				}
			} else {
				$title = str_replace('{category.name}', $this->cat->name, $title);
				$title = str_replace('{category.title}', $this->cat->seo_title, $title);
				$description = str_replace('{category.name}', $this->cat->name, $description);
				$description = str_replace('{category.description}', $this->cat->seo_description, $description);
				$keywords = str_replace('{category.name}', mb_strtolower($this->cat->name), $keywords);
				$keywords = str_replace('{category.keywords}', mb_strtolower($this->cat->seo_keywords), $keywords);
				
				$fallbackTitle .= ' ' . $this->cat->name;
				if (!empty($this->cat->seo_description)) {
					$fallbackDescription = $this->cat->seo_description . ', ' . config('country.name');
				}
			}
		}
		
		// User
		if (isset($this->sUser) && !empty($this->sUser)) {
			[$title, $description, $keywords] = getMetaTag('searchProfile');
			$title = str_replace('{profile.name}', $this->sUser->name, $title);
			$description = str_replace('{profile.name}', $this->sUser->name, $description);
			$keywords = str_replace('{profile.name}', mb_strtolower($this->sUser->name), $keywords);
			
			$fallbackTitle .= ' ' . t('of') . ' ';
			$fallbackTitle .= $this->sUser->name;
		}
		
		// Tag
		if (isset($this->tag) && !empty($this->tag)) {
			[$title, $description, $keywords] = getMetaTag('searchTag');
			$title = str_replace('{tag}', $this->tag, $title);
			$description = str_replace('{tag}', $this->tag, $description);
			$keywords = str_replace('{tag}', mb_strtolower($this->tag), $keywords);
			
			$fallbackTitle .= ' ' . t('for') . ' ';
			$fallbackTitle .= $this->tag . ' (' . t('Tag') . ')';
		}
		
		// Location
		if (request()->filled('r') && !request()->filled('l')) {
			// Administrative Division
			if (isset($this->admin) && !empty($this->admin)) {
				[$title, $description, $keywords] = getMetaTag('searchLocation');
				$title = str_replace('{location.name}', $this->admin->name, $title);
				$description = str_replace('{location.name}', $this->admin->name, $description);
				$keywords = str_replace('{location.name}', mb_strtolower($this->admin->name), $keywords);
				
				$fallbackTitle .= ' ' . t('in') . ' ';
				$fallbackTitle .= $this->admin->name;
				$fallbackDescription = t('listings_in_location', ['location' => $this->admin->name])
					. ', ' . config('country.name')
					. '. ' . t('looking_for_product_or_service')
					. ' - ' . $this->admin->name
					. ', ' . config('country.name');
			}
		} else {
			// City
			if (isset($this->city) && !empty($this->city)) {
				[$title, $description, $keywords] = getMetaTag('searchLocation');
				$title = str_replace('{location.name}', $this->city->name, $title);
				$description = str_replace('{location.name}', $this->city->name, $description);
				$keywords = str_replace('{location.name}', mb_strtolower($this->city->name), $keywords);
				
				$fallbackTitle .= ' ' . t('in') . ' ';
				$fallbackTitle .= $this->city->name;
				$fallbackDescription = t('listings_in_location', ['location' => $this->city->name])
					. ', ' . config('country.name')
					. '. ' . t('looking_for_product_or_service')
					. ' - ' . $this->city->name
					. ', ' . config('country.name');
			}
		}
		
		// Country
		$fallbackTitle .= ', ' . config('country.name');
		
		// view()->share('title', $fallbackTitle);
		
		$title = replaceGlobalPatterns($title);
		$description = replaceGlobalPatterns($description);
		$keywords = mb_strtolower(replaceGlobalPatterns($keywords));
		
		$metaTag['title'] = !empty($title) ? $title : $fallbackTitle;
		$metaTag['description'] = !empty($description) ? $description : ($fallbackDescription ?? $fallbackTitle);
		$metaTag['keywords'] = $keywords;
		
		return array_values($metaTag);
	}
	
	/**
	 * Get Search HTML Title
	 *
	 * @return string
	 */
	public function getHtmlTitle()
	{
		// Title
		$htmlTitle = '';
		
		// Init.
		$attr = ['countryCode' => config('country.icode')];
		$htmlTitle .= '<a href="' . UrlGen::search() . '" class="current">';
		$htmlTitle .= '<span>' . t('All listings') . '</span>';
		$htmlTitle .= '</a>';
		
		// Location
		$searchUrl = UrlGen::search([], ['l', 'r', 'location', 'distance']);
		
		if (request()->filled('r') && !request()->filled('l')) {
			// Administrative Division
			if (isset($this->admin) && !empty($this->admin)) {
				$htmlTitle .= ' ' . t('in') . ' ';
				$htmlTitle .= '<a rel="nofollow" class="jobs-s-tag" href="' . $searchUrl . '">';
				$htmlTitle .= $this->admin->name;
				$htmlTitle .= '</a>';
			}
		} else {
			// City
			if (isset($this->city) && !empty($this->city)) {
				if (config('settings.list.cities_extended_searches')) {
					$htmlTitle .= ' ' . t('within') . ' ';
					$htmlTitle .= '<a rel="nofollow" class="jobs-s-tag" href="' . $searchUrl . '">';
					$htmlTitle .= t('x_distance_around_city', [
						'distance' => (PostQueries::$distance == 1) ? 0 : PostQueries::$distance,
						'unit'     => getDistanceUnit(config('country.code')),
						'city'     => $this->city->name]);
					$htmlTitle .= '</a>';
				} else {
					$htmlTitle .= ' ' . t('in') . ' ';
					$htmlTitle .= '<a rel="nofollow" class="jobs-s-tag" href="' . $searchUrl . '">';
					$htmlTitle .= $this->city->name;
					$htmlTitle .= '</a>';
				}
			}
		}
		
		// Category
		if (isset($this->cat) && !empty($this->cat)) {
			// Get the parent of parent category URL
			$exceptArr = ['c', 'sc', 'cf', 'minPrice', 'maxPrice'];
			$searchUrl = UrlGen::getCatParentUrl($this->cat->parent->parent ?? null, $this->city ?? null, $exceptArr);
			
			if (isset($this->cat->parent) && !empty($this->cat->parent)) {
				$htmlTitle .= ' ' . t('in') . ' ';
				$htmlTitle .= '<a rel="nofollow" class="jobs-s-tag" href="' . $searchUrl . '">';
				$htmlTitle .= $this->cat->parent->name;
				$htmlTitle .= '</a>';
				
				// Get the parent category URL
				$exceptArr = ['sc', 'cf', 'minPrice', 'maxPrice'];
				$searchUrl = UrlGen::getCatParentUrl($this->cat->parent ?? null, $this->city ?? null, $exceptArr);
			}
			
			$htmlTitle .= ' ' . t('in') . ' ';
			$htmlTitle .= '<a rel="nofollow" class="jobs-s-tag" href="' . $searchUrl . '">';
			$htmlTitle .= $this->cat->name;
			$htmlTitle .= '</a>';
		}
		
		// Tag
		if (isset($this->tag) && !empty($this->tag)) {
			$htmlTitle .= ' ' . t('for') . ' ';
			$attr = ['countryCode' => config('country.icode')];
			$htmlTitle .= '<a rel="nofollow" class="jobs-s-tag" href="' . UrlGen::search() . '">';
			$htmlTitle .= $this->tag;
			$htmlTitle .= '</a>';
		}
		
		// Date
		if (request()->filled('postedDate') && isset($this->dates) && isset($this->dates->{request()->get('postedDate')})) {
			$exceptArr = ['postedDate'];
			$searchUrl = UrlGen::search([], $exceptArr);
			
			$htmlTitle .= t('last');
			$htmlTitle .= '<a rel="nofollow" class="jobs-s-tag" href="' . $searchUrl . '">';
			$htmlTitle .= $this->dates->{request()->get('postedDate')};
			$htmlTitle .= '</a>';
		}
		
		// Condition
		if (request()->filled('new') && isset($this->conditions) && isset($this->conditions->{request()->get('new')})) {
			$exceptArr = ['new'];
			$searchUrl = UrlGen::search([], $exceptArr);
			
			$htmlTitle .= '<a rel="nofollow" class="jobs-s-tag" href="' . $searchUrl . '">';
			$htmlTitle .= $this->conditions->{request()->get('new')};
			$htmlTitle .= '</a>';
		}
		
		view()->share('htmlTitle', $htmlTitle);
		
		return $htmlTitle;
	}
	
	/**
	 * Get Breadcrumbs Tabs
	 *
	 * @return array
	 */
	public function getBreadcrumb()
	{
		$bcTab = [];
		
		// City
		if (isset($this->city) && !empty($this->city)) {
			$title = t('in_x_distance_around_city', [
				'distance' => (PostQueries::$distance == 1) ? 0 : PostQueries::$distance,
				'unit'     => getDistanceUnit(config('country.code')),
				'city'     => $this->city->name,
			]);
			
			$bcTab[] = collect([
				'name'     => (isset($this->cat) ? t('All listings') . ' ' . $title : $this->city->name),
				'url'      => UrlGen::city($this->city),
				'position' => (isset($this->cat) ? 5 : 3),
				'location' => true,
			]);
		}
		
		// Admin
		if (isset($this->admin) && !empty($this->admin)) {
			$queryArr = [
				'd' => config('country.icode'),
				'r' => $this->admin->name
			];
			$exceptArr = ['l', 'location', 'distance'];
			$searchUrl = UrlGen::search($queryArr, $exceptArr);
			
			$title = $this->admin->name;
			
			$attr = ['countryCode' => config('country.icode')];
			$bcTab[] = collect([
				'name'     => (isset($this->cat) ? t('All listings') . ' ' . $title : $this->admin->name),
				'url'      => $searchUrl,
				'position' => (isset($this->cat) ? 5 : 3),
				'location' => true,
			]);
		}
		
		// Category
		$catBreadcrumb = $this->getCatBreadcrumb($this->cat, 3);
		$bcTab = array_merge($bcTab, $catBreadcrumb);
		
		// Sort by Position
		$bcTab = array_values(Arr::sort($bcTab, function ($value) {
			return $value->get('position');
		}));
		
		view()->share('bcTab', $bcTab);
		
		return $bcTab;
	}
}
