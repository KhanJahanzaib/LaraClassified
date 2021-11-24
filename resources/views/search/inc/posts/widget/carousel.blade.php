<?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}
$hideOnMobile = '';
if (isset($widget->options, $widget->options['hide_on_mobile']) && $widget->options['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
$carouselEl = '_' . createRandomString(6);
?>
@if (isset($widget) && !empty($widget) && $widget->posts->count() > 0)
	<?php
	$isFromHome = (
	Illuminate\Support\Str::contains(
		Illuminate\Support\Facades\Route::currentRouteAction(),
		'Web\HomeController'
	)
	);
	?>
	@if ($isFromHome)
		@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
	@endif
	<div class="container{{ $isFromHome ? '' : ' my-3' }}{{ $hideOnMobile }}">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title">
					<div class="inner">
						<h2>
							<span class="title-3">{!! $widget->title !!}</span>
							<a href="{{ $widget->link }}" class="sell-your-item">
								{{ t('View more') }} <i class="fas fa-bars"></i>
							</a>
						</h2>
					</div>
				</div>
		
				<div style="clear: both"></div>
		
				<div class="relative content featured-list-row clearfix">
					
					<div class="large-12 columns">
						<div class="no-margin featured-list-slider {{ $carouselEl }} owl-carousel owl-theme">
							@foreach($widget->posts as $key => $post)
								<?php
								// Main Picture
								if (isset($post->pictures) && $post->pictures->count() > 0) {
									$postImg = $post->pictures->get(0)->filename;
								} else {
									$postImg = config('larapen.core.picture.default');
								}
								?>
								<div class="item">
									<a href="{{ \App\Helpers\UrlGen::post($post) }}">
										<span class="item-carousel-thumb">
											<span class="photo-count">
												<i class="fa fa-camera"></i> {{ $post->pictures->count() }}
											</span>
											{!! imgTag($postImg, 'medium', ['style' => 'border: 1px solid #e7e7e7; margin-top: 2px;', 'alt' => $post->title]) !!}
										</span>
										<span class="item-name">{{ \Illuminate\Support\Str::limit($post->title, 70) }}</span>
										
										@if (config('plugins.reviews.installed'))
											@if (view()->exists('reviews::ratings-list'))
												@include('reviews::ratings-list')
											@endif
										@endif
										
										<span class="price">
											@if (isset($post->category, $post->category->type))
												@if (!in_array($post->category->type, ['not-salable']))
													@if (is_numeric($post->price) && $post->price > 0)
														{!! \App\Helpers\Number::money($post->price) !!}
													@elseif(is_numeric($post->price) && $post->price == 0)
														{!! t('free_as_price') !!}
													@else
														{!! t('Contact us') !!}
													@endif
												@endif
											@else
												{!! t('Contact us') !!}
											@endif
										</span>
									</a>
								</div>
							@endforeach
						</div>
					</div>
		
				</div>
			</div>
		</div>
	</div>
@endif

@section('after_style')
	@parent
@endsection

@section('after_scripts')
	@parent
	<script>
		{{-- Check if RTL or LTR --}}
		var rtlIsEnabled = false;
		if ($('html').attr('dir') === 'rtl') {
			rtlIsEnabled = true;
		}
		
		{{-- Carousel Parameters --}}
		var carouselItems = {{ (isset($widget) && isset($widget->posts)) ? $widget->posts->count() : 0 }};
		var carouselAutoplay = {{ (isset($widget->options) && isset($widget->options['autoplay'])) ? $widget->options['autoplay'] : 'false' }};
		var carouselAutoplayTimeout = {{ (isset($widget->options) && isset($widget->options['autoplay_timeout'])) ? $widget->options['autoplay_timeout'] : 1500 }};
		var carouselLang = {
			'navText': {
				'prev': "{{ t('prev') }}",
				'next': "{{ t('next') }}"
			}
		};
		
		{{-- Featured Listings Carousel --}}
		var carouselObject = $('.featured-list-slider.{{ $carouselEl }}');
		var responsiveObject = {
			0: {
				items: 1,
				nav: true
			},
			576: {
				items: 2,
				nav: false
			},
			768: {
				items: 3,
				nav: false
			},
			992: {
				items: 5,
				nav: false,
				loop: (carouselItems > 5)
			}
		};
		carouselObject.owlCarousel({
			rtl: rtlIsEnabled,
			nav: false,
			navText: [carouselLang.navText.prev, carouselLang.navText.next],
			loop: true,
			responsiveClass: true,
			responsive: responsiveObject,
			autoWidth: true,
			autoplay: carouselAutoplay,
			autoplayTimeout: carouselAutoplayTimeout,
			autoplayHoverPause: true
		});
	</script>
@endsection