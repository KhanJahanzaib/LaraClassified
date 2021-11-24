@if (isset($customFields) && $customFields->count() > 0)
	<div class="row gx-1 gy-1 mt-3">
		<div class="col-12">
			<div class="row mb-3">
				<div class="col-12">
					<h4 class="p-0"><i class="fas fa-bars"></i> {{ t('Additional Details') }}</h4>
				</div>
			</div>
		</div>
		
		<div class="col-12">
			<div class="row gx-1 gy-1">
				@foreach($customFields as $field)
					<?php
					if (in_array($field->type, ['radio', 'select'])) {
						if (is_numeric($field->default_value)) {
							$option = \App\Models\FieldOption::find($field->default_value);
							if (!empty($option)) {
								$field->default_value = $option->value;
							}
						}
					}
					if (in_array($field->type, ['checkbox'])) {
						$field->default_value = ($field->default_value == 1) ? t('Yes') : t('No');
					}
					if ($field->type == 'video') {
						$field->default_value = \App\Helpers\VideoEmbedding::embedVideo($field->default_value);
					}
					?>
					@if ($field->type == 'file')
						<div class="col-12">
							<div class="row bg-light rounded py-2 mx-0">
								<div class="col-6 fw-bolder">{{ $field->name }}</div>
								<div class="col-6 text-sm-end text-start">
									<a class="btn btn-default" href="{{ privateFileUrl($field->default_value, null) }}" target="_blank">
										<i class="fas fa-paperclip"></i> {{ t('Download') }}
									</a>
								</div>
							</div>
						</div>
					@else
						@if (!is_array($field->default_value) && $field->type != 'video')
							@if ($field->type == 'url')
								<div class="col-sm-6 col-12">
									<div class="row bg-light rounded py-2 mx-0">
										<div class="col-6 fw-bolder">{{ $field->name }}</div>
										<div class="col-6 text-sm-end text-start">
											<a href="{{ addHttp($field->default_value) }}" target="_blank" rel="nofollow">{{ addHttp($field->default_value) }}</a>
										</div>
									</div>
								</div>
							@else
								<div class="col-sm-6 col-12">
									<div class="row bg-light rounded py-2 mx-0">
										<div class="col-6 fw-bolder">{{ $field->name }}</div>
										<div class="col-6 text-sm-end text-start">{{ $field->default_value }}</div>
									</div>
								</div>
							@endif
						@elseif (!is_array($field->default_value) && $field->type == 'video')
							<div class="col-12">
								<div class="row bg-light rounded py-2 mx-0">
									<div class="col-12 fw-bolder">{{ $field->name }}:</div>
									<div class="col-12 text-center embed-responsive embed-responsive-16by9">
										{!! $field->default_value !!}
									</div>
								</div>
							</div>
						@else
							@if (is_array($field->default_value) && count($field->default_value) > 0)
							<div class="col-12">
								<div class="row bg-light rounded py-2 mx-0">
									<div class="col-12 mb-2 fw-bolder">{{ $field->name }}:</div>
									<div class="row">
										@foreach($field->default_value as $valueItem)
											@continue(!isset($valueItem->value))
											<div class="col-sm-4 col-6 py-2">
												<i class="fa fa-check"></i> {{ $valueItem->value }}
											</div>
										@endforeach
									</div>
								</div>
							</div>
							@endif
						@endif
					@endif
				@endforeach
			</div>
		</div>
	</div>
@endif
