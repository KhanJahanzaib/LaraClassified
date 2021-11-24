<?php
// Clear Filter Button
$clearFilterBtn = \App\Helpers\UrlGen::getPriceFilterClearLink($cat ?? null, $city ?? null);
?>
@if (isset($cat) and !empty($cat))
	@if (!in_array($cat->type, ['not-salable']))
		{{-- Price --}}
		<div class="block-title has-arrow sidebar-header">
			<h5>
				<span class="fw-bold">
					{{ (!in_array($cat->type, ['job-offer', 'job-search'])) ? t('price_range') : t('salary_range') }}
				</span> {!! $clearFilterBtn !!}
			</h5>
		</div>
		<div class="block-content list-filter">
			<form role="form" class="form-inline" action="{{ request()->url() }}" method="GET">
				@foreach(request()->except(['page', 'minPrice', 'maxPrice', '_token']) as $key => $value)
					@if (is_array($value))
						@foreach($value as $k => $v)
							@if (is_array($v))
								@foreach($v as $ik => $iv)
									@continue(is_array($iv))
									<input type="hidden" name="{{ $key.'['.$k.']['.$ik.']' }}" value="{{ $iv }}">
								@endforeach
							@else
								<input type="hidden" name="{{ $key.'['.$k.']' }}" value="{{ $v }}">
							@endif
						@endforeach
					@else
						<input type="hidden" name="{{ $key }}" value="{{ $value }}">
					@endif
				@endforeach
				<div class="row px-1 gx-1 gy-1">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<input type="number" min="0" id="minPrice" name="minPrice" class="form-control" placeholder="{{ t('Min') }}" value="{{ request()->get('minPrice') }}">
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<input type="number" min="0" id="maxPrice" name="maxPrice" class="form-control" placeholder="{{ t('Max') }}" value="{{ request()->get('maxPrice') }}">
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<button class="btn btn-default btn-block" type="submit">{{ t('go') }}</button>
					</div>
				</div>
			</form>
		</div>
		<div style="clear:both"></div>
	@endif
@endif