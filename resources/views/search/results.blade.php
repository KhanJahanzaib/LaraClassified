{{--
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
--}}
@extends('layouts.master')

@section('search')
	@parent
	@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.form', 'search.inc.form'])
@endsection

@section('content')
	<div class="main-container">
		
		@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.breadcrumbs', 'search.inc.breadcrumbs'])
		
		@if (config('settings.list.show_cats_in_top'))
			@if (isset($cats) && $cats->count() > 0)
				<div class="container mb-2 hide-xs">
					<div class="row p-0 m-0">
						<div class="col-12 p-0 m-0 border border-bottom-0 bg-light"></div>
					</div>
				</div>
			@endif
			@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.categories', 'search.inc.categories'])
		@endif
		
		<?php if (isset($topAdvertising) && !empty($topAdvertising)): ?>
			@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.top', 'layouts.inc.advertising.top'], ['paddingTopExists' => true])
		<?php
			$paddingTopExists = false;
		else:
			if (isset($paddingTopExists) && $paddingTopExists) {
				$paddingTopExists = false;
			}
		endif;
		?>
		
		<div class="container">
			<div class="row">

				{{-- Sidebar --}}
                @if (config('settings.list.left_sidebar'))
                    @includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.sidebar', 'search.inc.sidebar'])
                    <?php $contentColSm = 'col-md-9'; ?>
                @else
                    <?php $contentColSm = 'col-md-12'; ?>
                @endif

				{{-- Content --}}
				<div class="{{ $contentColSm }} page-content col-thin-left mb-4">
					<div class="category-list {{ config('settings.list.display_mode', 'make-grid') }}{{ ($contentColSm == 'col-md-12') ? ' noSideBar' : '' }}">
						<div class="tab-box">

							{{-- Nav tabs --}}
							<ul id="postType" class="nav nav-tabs add-tabs tablist" role="tablist">
                                <?php
                                $aClass = '';
                                $spanClass = 'alert-danger';
								if (config('settings.single.show_listing_types')) {
									if (!request()->filled('type') || request()->get('type') == '') {
										$aClass = ' active';
										$spanClass = 'bg-danger';
									}
                                } else {
									$aClass = ' active';
									$spanClass = 'bg-danger';
								}
                                ?>
								<li class="nav-item">
									<a href="{!! qsUrl(request()->url(), request()->except(['page', 'type']), null, false) !!}" class="nav-link{{ $aClass }}">
										{{ t('All Listings') }} <span class="badge badge-pill {!! $spanClass !!}">{{ $count->get('all') }}</span>
									</a>
								</li>
								@if (config('settings.single.show_listing_types'))
									@if (isset($postTypes) && $postTypes->count() > 0)
										@foreach ($postTypes as $postType)
											<?php
												$postTypeUrl = qsUrl(
													request()->url(),
													array_merge(request()->except(['page']), ['type' => $postType->id]),
													null,
													false
												);
												$postTypeCount = ($count->has($postType->id)) ? $count->get($postType->id) : 0;
											?>
											@if (request()->filled('type') && request()->get('type') == $postType->id)
												<li class="nav-item">
													<a href="{!! $postTypeUrl !!}" class="nav-link active">
														{{ $postType->name }}
														<span class="badge badge-pill bg-danger">
															{{ $postTypeCount }}
														</span>
													</a>
												</li>
											@else
												<li class="nav-item">
													<a href="{!! $postTypeUrl !!}" class="nav-link">
														{{ $postType->name }}
														<span class="badge badge-pill alert-danger">
															{{ $postTypeCount }}
														</span>
													</a>
												</li>
											@endif
										@endforeach
									@endif
								@endif
							</ul>
							
							<div class="tab-filter pb-2">
								<select id="orderBy" title="sort by" class="niceselecter select-sort-by small" data-style="btn-select" data-width="auto">
									<option value="{!! qsUrl(request()->url(), request()->except(['orderBy', 'distance']), null, false) !!}">{{ t('Sort by') }}</option>
									<option{{ (request()->get('orderBy')=='priceAsc') ? ' selected="selected"' : '' }}
											value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'priceAsc']), null, false) !!}">
										{{ t('price_low_to_high') }}
									</option>
									<option{{ (request()->get('orderBy')=='priceDesc') ? ' selected="selected"' : '' }}
											value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'priceDesc']), null, false) !!}">
										{{ t('price_high_to_low') }}
									</option>
									@if (request()->filled('q'))
										<option{{ (request()->get('orderBy')=='relevance') ? ' selected="selected"' : '' }}
												value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'relevance']), null, false) !!}">
											{{ t('Relevance') }}
										</option>
									@endif
									<option{{ (request()->get('orderBy')=='date') ? ' selected="selected"' : '' }}
											value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'date']), null, false) !!}">
										{{ t('Date') }}
									</option>
									@if (isset($city, $distanceRange) && !empty($city) && !empty($distanceRange))
										@foreach($distanceRange as $key => $value)
											<option{{ (request()->get('distance', config('settings.list.search_distance_default', 100))==$value) ? ' selected="selected"' : '' }}
													value="{!! qsUrl(request()->url(), array_merge(request()->except('distance'), ['distance' => $value]), null, false) !!}">
												{{ t('around_x_distance', ['distance' => $value, 'unit' => getDistanceUnit()]) }}
											</option>
										@endforeach
									@endif
									@if (config('plugins.reviews.installed'))
										<option{{ (request()->get('orderBy')=='rating') ? ' selected="selected"' : '' }}
												value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'rating']), null, false) !!}">
										{{ trans('reviews::messages.Rating') }}
										</option>
									@endif
								</select>
							</div>

						</div>

						<div class="listing-filter">
							<div class="float-start col-md-9 col-sm-8 col-12">
								<h1 class="h6 pb-0 breadcrumb-list">
									{!! (isset($htmlTitle)) ? $htmlTitle : '' !!}
								</h1>
                                <div style="clear:both;"></div>
							</div>
                            
							@if (isset($posts) && $posts->count() > 0)
								<?php $currDisplay = config('settings.list.display_mode'); ?>
								<div class="float-end col-md-3 col-sm-4 col-12 text-end listing-view-action">
									<span class="grid-view{{ ($currDisplay == 'make-grid') ? ' active' : '' }}">
										@if ($currDisplay == 'make-grid')
											<i class="fas fa-th-large"></i>
										@else
											<a href="{!! qsUrl(request()->url(), array_merge(request()->except('display'), ['display'=>'grid']), null, false) !!}">
												<i class="fas fa-th-large"></i>
											</a>
										@endif
									</span>
									<span class="list-view{{ ($currDisplay == 'make-list') ? ' active' : '' }}">
										@if ($currDisplay == 'make-list')
											<i class="fas fa-th-list"></i>
										@else
											<a href="{!! qsUrl(request()->url(), array_merge(request()->except('display'), ['display'=>'list']), null, false) !!}">
												<i class="fas fa-th-list"></i>
											</a>
										@endif
									</span>
									<span class="compact-view{{ ($currDisplay == 'make-compact') ? ' active' : '' }}">
										@if ($currDisplay == 'make-compact')
											<i class="fas fa-bars"></i>
										@else
											<a href="{!! qsUrl(request()->url(), array_merge(request()->except('display'), ['display'=>'compact']), null, false) !!}">
												<i class="fas fa-bars"></i>
											</a>
										@endif
									</span>
								</div>
							@endif

							<div style="clear:both"></div>
						</div>
						
						{{-- Mobile Filter Bar --}}
						<div class="mobile-filter-bar col-xl-12">
							<ul class="list-unstyled list-inline no-margin no-padding">
								@if (config('settings.list.left_sidebar'))
								<li class="filter-toggle">
									<a class="">
										<i class="fas fa-bars"></i> {{ t('Filters') }}
									</a>
								</li>
								@endif
								<li>
									<div class="dropdown">
										<a class="dropdown-toggle" data-bs-toggle="dropdown">{{ t('Sort by') }}</a>
										<ul class="dropdown-menu">
											<li>
												<a href="{!! qsUrl(request()->url(), request()->except(['orderBy', 'distance']), null, false) !!}" rel="nofollow">
													{{ t('Sort by') }}
												</a>
											</li>
											<li>
												<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'priceAsc']), null, false) !!}" rel="nofollow">
													{{ t('price_low_to_high') }}
												</a>
											</li>
											<li>
												<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'priceDesc']), null, false) !!}" rel="nofollow">
													{{ t('price_high_to_low') }}
												</a>
											</li>
											@if (request()->filled('q'))
												<li>
													<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'relevance']), null, false) !!}" rel="nofollow">
														{{ t('Relevance') }}
													</a>
												</li>
											@endif
											<li>
												<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'date']), null, false) !!}" rel="nofollow">
													{{ t('Date') }}
												</a>
											</li>
											@if (isset($city, $distanceRange) and !empty($city) and !empty($distanceRange))
												@foreach($distanceRange as $key => $value)
													<li>
														<a href="{!! qsUrl(request()->url(), array_merge(request()->except('distance'), ['distance' => $value]), null, false) !!}" rel="nofollow">
															{{ t('around_x_distance', ['distance' => $value, 'unit' => getDistanceUnit()]) }}
														</a>
													</li>
												@endforeach
											@endif
											@if (config('plugins.reviews.installed'))
												<li>
													<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'rating']), null, false) !!}"
													   rel="nofollow">
														{{ trans('reviews::messages.Rating') }}
													</a>
												</li>
											@endif
										</ul>
									</div>
								</li>
							</ul>
						</div>
						<div class="menu-overly-mask"></div>
						{{-- Mobile Filter bar End--}}
						
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="contentAll" role="tabpanel" aria-labelledby="tabAll">
								<div id="postsList" class="category-list-wrapper posts-wrapper row no-margin">
									@if (config('settings.list.display_mode') == 'make-list')
										@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.posts.template.list', 'search.inc.posts.template.list'])
									@elseif (config('settings.list.display_mode') == 'make-compact')
										@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.posts.template.compact', 'search.inc.posts.template.compact'])
									@else
										@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.posts.template.grid', 'search.inc.posts.template.grid'])
									@endif
								</div>
							</div>
						</div>
						
						<div class="tab-box save-search-bar text-center">
							@if (request()->filled('q') && request()->get('q') != '' && $count->get('all') > 0)
								<a name="{!! qsUrl(request()->url(), request()->except(['_token', 'location']), null, false) !!}" id="saveSearch"
								   count="{{ $count->get('all') }}">
									<i class="far fa-bell"></i> {{ t('Save Search') }}
								</a>
							@else
								<a href="#"> &nbsp; </a>
							@endif
						</div>
					</div>
					
					@if ($posts->hasPages())
						<nav class="mt-3 mb-0 pagination-sm" aria-label="">
							{!! $posts->appends(request()->query())->links() !!}
						</nav>
					@endif
					
				</div>
			</div>
		</div>
		
		{{-- Advertising --}}
		@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.bottom', 'layouts.inc.advertising.bottom'])
		
		{{-- Promo Listing Button --}}
		<div class="container mb-3">
			<div class="card border-light text-dark bg-light mb-3">
				<div class="card-body text-center">
					<h2>{{ t('do_you_have_anything') }}</h2>
					<h5>{{ t('sell_products_and_services_online_for_free') }}</h5>
					@if (!auth()->check() && config('settings.single.guests_can_post_listings') != '1')
						<a href="#quickLogin" class="btn btn-border btn-post btn-add-listing" data-bs-toggle="modal">{{ t('start_now') }}</a>
					@else
						<a href="{{ \App\Helpers\UrlGen::addPost() }}" class="btn btn-border btn-post btn-add-listing">{{ t('start_now') }}</a>
					@endif
				</div>
			</div>
		</div>
		
		{{-- Category Description --}}
		@if (isset($cat, $cat->description) && !empty($cat->description))
			@if (!(bool)$cat->hide_description)
				<div class="container mb-3">
					<div class="card border-light text-dark bg-light mb-3">
						<div class="card-body">
							{!! $cat->description !!}
						</div>
					</div>
				</div>
			@endif
		@endif
		
		{{-- Show Posts Tags --}}
		@if (config('settings.list.show_listings_tags'))
			@if (isset($tags) && !empty($tags))
				<div class="container">
					<div class="card mb-3">
						<div class="card-body">
							<h2 class="card-title"><i class="fas fa-tags"></i> {{ t('Tags') }}:</h2>
							@foreach($tags as $iTag)
								<span class="d-inline-block border border-inverse bg-light rounded-1 py-1 px-2 my-1 me-1">
									<a href="{{ \App\Helpers\UrlGen::tag($iTag) }}">
										{{ $iTag }}
									</a>
								</span>
							@endforeach
						</div>
					</div>
				</div>
			@endif
		@endif
		
	</div>
@endsection

@section('modal_location')
	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.location', 'layouts.inc.modal.location'])
@endsection

@section('after_scripts')
	<script>
		$(document).ready(function () {
			$('#postType a').click(function (e) {
				e.preventDefault();
				var goToUrl = $(this).attr('href');
				redirect(goToUrl);
			});
			$('#orderBy').change(function () {
				var goToUrl = $(this).val();
				redirect(goToUrl);
			});
		});
	</script>
@endsection
