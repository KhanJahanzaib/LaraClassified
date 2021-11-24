<?php
$searchSegmentIndex = config('settings.seo.multi_countries_urls') ? 2 : 1;
$isNotTheFirstPage = (request()->segment($searchSegmentIndex) == config('routes.search', 'search') && !empty(request()->except(['page'])));
?>
@if (
		(config('settings.seo.no_index_all') == true)
		|| (str_contains(\Route::currentRouteAction(), 'Search\CategoryController') && config('settings.seo.no_index_categories') == true)
		|| (str_contains(\Route::currentRouteAction(), 'Search\TagController') && config('settings.seo.no_index_tags') == true)
		|| (str_contains(\Route::currentRouteAction(), 'Search\CityController') && config('settings.seo.no_index_cities') == true)
		|| (str_contains(\Route::currentRouteAction(), 'Search\UserController') && config('settings.seo.no_index_users') == true)
		|| (str_contains(\Route::currentRouteAction(), 'Post\ReportController') && config('settings.seo.no_index_listing_report') == true)
	)
	<meta name="robots" content="noindex,nofollow">
	<meta name="googlebot" content="noindex">
@endif