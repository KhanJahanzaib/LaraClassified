<div class="item-slider posts-image">
	<?php $titleSlug = \Illuminate\Support\Str::slug($post->title); ?>
	@if (!in_array($post->category->type, ['not-salable']))
		<div class="pricetag">
			@if (is_numeric($post->price) && $post->price > 0)
				{!! \App\Helpers\Number::money($post->price) !!}
			@elseif (is_numeric($post->price) && $post->price == 0)
				{!! t('free_as_price') !!}
			@else
				{!! t('Contact us') !!}
			@endif
		</div>
	@endif
	@if ($post->pictures->count() > 0)
		<ul class="bxslider">
			@foreach($post->pictures as $key => $image)
				<li>
					{!! imgTag($image->filename, 'big', ['alt' => $titleSlug . '-big-' . $key]) !!}
				</li>
			@endforeach
		</ul>
		<div id="bx-pager">
			@foreach($post->pictures as $key => $image)
				<li>
					<a class="thumb-item-link" data-slide-index="{{ $key }}" href="">
						{!! imgTag($image->filename, 'small', ['alt' => $titleSlug . '-small-' . $key]) !!}
					</a>
				</li>
			@endforeach
		</div>
	@else
		<ul class="bxslider">
			<li><img src="{{ imgUrl(config('larapen.core.picture.default'), 'big') }}" alt="img"></li>
		</ul>
		<div id="bx-pager">
			<li>
				<a class="thumb-item-link" data-slide-index="0" href="">
					<img src="{{ imgUrl(config('larapen.core.picture.default'), 'small') }}" alt="img">
				</a>
			</li>
		</div>
	@endif
</div>

@section('after_scripts')
	@parent
	<script>
		$(document).ready(function () {
			
			/* bxSlider - Main Images */
			$('.bxslider').bxSlider({
				touchEnabled: {{ ($post->pictures->count() > 1) ? 'true' : 'false' }},
				speed: 1000,
				pagerCustom: '#bx-pager',
				adaptiveHeight: true,
				nextText: '{{ t('bxslider.nextText') }}',
				prevText: '{{ t('bxslider.prevText') }}',
				startText: '{{ t('bxslider.startText') }}',
				stopText: '{{ t('bxslider.stopText') }}',
				onSlideAfter: function ($slideElement, oldIndex, newIndex) {
					@if (!userBrowser('Chrome'))
						/* $('#bx-pager li:not(.bx-clone)').eq(newIndex).find('a.thumb-item-link').addClass('active'); */
					@endif
				}
			});
			
			/* bxSlider - Thumbnails */
			@if (userBrowser('Chrome'))
				$('#bx-pager').addClass('m-3');
				$('#bx-pager .thumb-item-link').unwrap();
			@else
				$('#bx-pager').addClass('m-3');
				$('#bx-pager .thumb-item-link').unwrap();
				/*
				var thumbSlider = $('.product-view-thumb').bxSlider(bxSliderSettings());
				$(window).on('resize', function() {
					thumbSlider.reloadSlider(bxSliderSettings());
				});
				*/
			@endif
		});
		
		/* bxSlider - Initiates Responsive Carousel */
		function bxSliderSettings()
		{
			var smSettings = {
				slideWidth: 65,
				minSlides: 1,
				maxSlides: 4,
				slideMargin: 5,
				adaptiveHeight: true,
				pager: false
			};
			var mdSettings = {
				slideWidth: 100,
				minSlides: 1,
				maxSlides: 4,
				slideMargin: 5,
				adaptiveHeight: true,
				pager: false
			};
			var lgSettings = {
				slideWidth: 100,
				minSlides: 3,
				maxSlides: 6,
				pager: false,
				slideMargin: 10,
				adaptiveHeight: true
			};
			
			if ($(window).width() <= 640) {
				return smSettings;
			} else if ($(window).width() > 640 && $(window).width() < 768) {
				return mdSettings;
			} else {
				return lgSettings;
			}
		}
	</script>
@endsection