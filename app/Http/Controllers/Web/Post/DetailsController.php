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

namespace App\Http\Controllers\Web\Post;

use App\Events\PostWasVisited;
use App\Helpers\ArrayHelper;
use App\Helpers\Date;
use App\Helpers\UrlGen;
use App\Http\Controllers\Web\Post\Traits\CatBreadcrumbTrait;
use App\Http\Controllers\Web\Post\Traits\CustomFieldTrait;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Package;
use App\Http\Controllers\Web\FrontController;
use App\Models\User;
use App\Models\Scopes\VerifiedScope;
use App\Models\Scopes\ReviewedScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Event;
use Torann\LaravelMetaTags\Facades\MetaTag;

class DetailsController extends FrontController
{
	use CatBreadcrumbTrait, CustomFieldTrait;
	
	/**
	 * Listing expire time (in months)
	 *
	 * @var int
	 */
	public $expireTime = 24;
	
	/**
	 * DetailsController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->middleware(function ($request, $next) {
			$this->commonQueries();
			
			return $next($request);
		});
	}
	
	/**
	 * Common Queries
	 */
	public function commonQueries()
	{
		// Count Packages
		$countPackages = Package::applyCurrency()->count();
		view()->share('countPackages', $countPackages);
		
		// Count Payment Methods
		view()->share('countPaymentMethods', $this->countPaymentMethods);
	}
	
	/**
	 * Show Dost's Details.
	 *
	 * @param $postId
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($postId)
	{
		$data = [];
		
		// Get and Check the Controller's Method Parameters
		$parameters = request()->route()->parameters();
		
		// Show 404 error if the Post's ID is not numeric
		if (!isset($parameters['id']) || empty($parameters['id']) || !is_numeric($parameters['id'])) {
			abort(404);
		}
		
		// Set the Parameters
		$postId = $parameters['id'];
		if (isset($parameters['slug'])) {
			$slug = $parameters['slug'];
		}
		
		// GET POST'S DETAILS
		if (auth()->check()) {
			// Get post's details even if it's not activated, not reviewed or archived
			$cacheId = 'post.withoutGlobalScopes.with.city.pictures.' . $postId . '.' . config('app.locale');
			$post = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
				return Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])
					->withCountryFix()
					->where('id', $postId)
					->with([
						'category'      => function ($builder) { $builder->with(['parent']); },
						'postType',
						'city',
						'pictures',
						'latestPayment' => function ($builder) { $builder->with(['package']); },
						'savedByLoggedUser',
					])
					->first();
			});
			
			// If the logged user is not an admin user...
			if (!auth()->user()->can(Permission::getStaffPermissions())) {
				// Then don't get post that are not from the user
				if (!empty($post) && $post->user_id != auth()->user()->id) {
					$cacheId = 'post.with.city.pictures.' . $postId . '.' . config('app.locale');
					$post = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
						return Post::withCountryFix()
							->unarchived()
							->where('id', $postId)
							->with([
								'category'      => function ($builder) { $builder->with(['parent']); },
								'postType',
								'city',
								'pictures',
								'latestPayment' => function ($builder) { $builder->with(['package']); },
								'savedByLoggedUser',
							])
							->first();
					});
				}
			}
		} else {
			$cacheId = 'post.with.city.pictures.' . $postId . '.' . config('app.locale');
			$post = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
				return Post::withCountryFix()
					->unarchived()
					->where('id', $postId)
					->with([
						'category'      => function ($builder) { $builder->with(['parent']); },
						'postType',
						'city',
						'pictures',
						'latestPayment' => function ($builder) { $builder->with(['package']); },
						'savedByLoggedUser',
					])
					->first();
			});
		}
		// Preview Listing after activation
		if (request()->filled('preview') && request()->get('preview') == 1) {
			// Get post's details even if it's not activated and reviewed
			$post = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])
				->withCountryFix()
				->where('id', $postId)
				->with([
					'category'      => function ($builder) { $builder->with(['parent']); },
					'postType',
					'city',
					'pictures',
					'latestPayment' => function ($builder) { $builder->with(['package']); },
					'savedByLoggedUser',
				])
				->first();
		}
		
		// Listing not found
		if (empty($post) || empty($post->category) || empty($post->city)) {
			abort(404, t('Listing not found'));
		}
		
		// Share post's details
		view()->share('post', $post);
		
		// Archived listings message
		if (isset($post->archived) && $post->archived == 1) {
			flash(t('This listing has been archived'))->warning();
		}
		
		// Get possible post's registered Author (User)
		$user = null;
		if (isset($post->user_id) && !empty($post->user_id)) {
			$user = User::find($post->user_id);
		}
		view()->share('user', $user);
		
		// Get Post's user decision about comments activation
		$commentsAreDisabledByUser = false;
		if (isset($user) && !empty($user)) {
			if ($user->disable_comments == 1) {
				$commentsAreDisabledByUser = true;
			}
		}
		view()->share('commentsAreDisabledByUser', $commentsAreDisabledByUser);
		
		// Category Breadcrumb
		$catBreadcrumb = $this->getCatBreadcrumb($post->category, 1);
		view()->share('catBreadcrumb', $catBreadcrumb);
		
		// Get Custom Fields
		$customFields = $this->getPostFieldsValues($post->category->id, $post->id);
		view()->share('customFields', $customFields);
		
		// Increment Listing visits counter
		Event::dispatch(new PostWasVisited($post));
		
		// GET SIMILAR POSTS
		$similarPostsLimit = (int)config('settings.single.similar_listings_limit', 10);
		if (config('settings.single.similar_listings') == '1') {
			$cacheId = 'posts.similar.category.' . $post->category->id . '.post.' . $post->id . '.limit.' . $similarPostsLimit;
			$posts = Cache::remember($cacheId, $this->cacheExpiration, function () use ($post, $similarPostsLimit) {
				return $post->getSimilarByCategory($similarPostsLimit);
			});
			
			// Featured Area Data
			$widgetSimilarPosts = [
				'title' => t('Similar Listings'),
				'link'  => UrlGen::category($post->category),
				'posts' => $posts,
			];
			$data['widgetSimilarPosts'] = ($posts->count() > 0) ? ArrayHelper::toObject($widgetSimilarPosts) : null;
		} else if (config('settings.single.similar_listings') == '2') {
			$distance = 50; // km OR miles
			
			$cacheId = 'posts.similar.city.' . $post->city->id . '.post.' . $post->id . '.limit.' . $similarPostsLimit;
			$posts = Cache::remember($cacheId, $this->cacheExpiration, function () use ($post, $distance, $similarPostsLimit) {
				return $post->getSimilarByLocation($distance, $similarPostsLimit);
			});
			
			// Featured Area Data
			$widgetSimilarPosts = [
				'title' => t('more_listings_at_x_distance_around_city', [
					'distance' => $distance,
					'unit'     => getDistanceUnit(config('country.code')),
					'city'     => $post->city->name,
				]),
				'link'  => UrlGen::city($post->city),
				'posts' => $posts,
			];
			$data['widgetSimilarPosts'] = ($posts->count() > 0) ? ArrayHelper::toObject($widgetSimilarPosts) : null;
		}
		
		// Meta Tags
		[$title, $description, $keywords] = getMetaTag('listingDetails');
		$title = str_replace('{ad.title}', $post->title, $title);
		$title = str_replace('{location.name}', $post->city->name, $title);
		$description = str_replace('{ad.description}', Str::limit(str_strip(strip_tags($post->description)), 200), $description);
		$keywords = str_replace('{ad.tags}', str_replace(',', ', ', @implode(',', $post->tags)), $keywords);
		
		$title = removeUnmatchedPatterns($title);
		$description = removeUnmatchedPatterns($description);
		$keywords = removeUnmatchedPatterns($keywords);
		
		// Fallback
		if (empty($title)) {
			$title = $post->title . ', ' . $post->city->name;
		}
		if (empty($description)) {
			$description = Str::limit(str_strip(strip_tags($post->description)), 200);
		}
		
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		MetaTag::set('keywords', $keywords);
		
		// Open Graph
		$this->og->title($title)
			->description($description)
			->type('article');
		if (!$post->pictures->isEmpty()) {
			if ($this->og->has('image')) {
				$this->og->forget('image')->forget('image:width')->forget('image:height');
			}
			foreach ($post->pictures as $picture) {
				$this->og->image(imgUrl($picture->filename, 'big'), [
					'width'  => 600,
					'height' => 600,
				]);
			}
		}
		view()->share('og', $this->og);
		
		/*
		// Expiration Info
		$today = Carbon::now(Date::getAppTimeZone());
		if ($today->gt($post->created_at->addMonths($this->expireTime))) {
			flash(t("this_listing_is_expired"))->error();
		}
		*/
		
		// Reviews Plugin Data
		if (config('plugins.reviews.installed')) {
			try {
				$rvPost = \extras\plugins\reviews\app\Models\Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])->find($post->id);
				view()->share('rvPost', $rvPost);
			} catch (\Throwable $e) {
			}
		}
		
		// View
		return appView('post.details', $data);
	}
}
