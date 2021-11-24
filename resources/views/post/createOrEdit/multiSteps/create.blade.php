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

@section('wizard')
	@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.multiSteps.inc.wizard', 'post.createOrEdit.multiSteps.inc.wizard'])
@endsection

@section('content')
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-container">
		<div class="container">
			<div class="row">
				
				@includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.notification', 'post.inc.notification'])
				
				<?php $postInput = $postInput ?? []; ?>
				<div class="col-md-9 page-content">
					<div class="inner-box category-content">
						<h2 class="title-2">
							<strong><i class="far fa-edit"></i> {{ t('create_new_listing') }}</strong>
						</h2>
						
						<div class="row">
							<div class="col-xl-12">
								
								<form class="form-horizontal" id="postForm" method="POST" action="{{ request()->fullUrl() }}" enctype="multipart/form-data">
									{!! csrf_field() !!}
									<fieldset>

										{{-- category_id --}}
										<?php $categoryIdError = (isset($errors) && $errors->has('category_id')) ? ' is-invalid' : ''; ?>
										<div class="row mb-3 required">
											<label class="col-md-3 col-form-label{{ $categoryIdError }}">{{ t('category') }} <sup>*</sup></label>
											<div class="col-md-8">
												<div id="catsContainer" class="rounded{{ $categoryIdError }}">
													<a href="#browseCategories" data-bs-toggle="modal" class="cat-link" data-id="0">
														{{ t('select_a_category') }}
													</a>
												</div>
											</div>
											<input type="hidden" name="category_id" id="categoryId" value="{{ old('category_id', data_get($postInput, 'category_id', 0)) }}">
											<input type="hidden" name="category_type" id="categoryType" value="{{ old('category_type', data_get($postInput, 'category_type')) }}">
										</div>
										
										@if (config('settings.single.show_listing_types'))
											{{-- post_type_id --}}
											@if (isset($postTypes))
												<?php $postTypeIdError = (isset($errors) && $errors->has('post_type_id')) ? ' is-invalid' : ''; ?>
												<div id="postTypeBloc" class="row mb-3 required">
													<label class="col-md-3 col-form-label">{{ t('type') }} <sup>*</sup></label>
													<div class="col-md-8">
														@foreach ($postTypes as $postType)
														<div class="form-check form-check-inline pt-2">
															<input name="post_type_id"
																id="postTypeId-{{ $postType->id }}"
																value="{{ $postType->id }}"
																type="radio"
																class="form-check-input{{ $postTypeIdError }}"
																{{ (old('post_type_id', data_get($postInput, 'post_type_id'))==$postType->id) ? ' checked="checked"' : '' }}
															>
															<label class="form-check-label mb-0" for="postTypeId-{{ $postType->id }}">
																{{ $postType->name }}
															</label>
														</div>
														@endforeach
														<div class="form-text text-muted">{{ t('post_type_hint') }}</div>
													</div>
												</div>
											@endif
										@endif

										{{-- title --}}
										<?php $titleError = (isset($errors) && $errors->has('title')) ? ' is-invalid' : ''; ?>
										<div class="row mb-3 required">
											<label class="col-md-3 col-form-label{{ $titleError }}" for="title">{{ t('title') }} <sup>*</sup></label>
											<div class="col-md-8">
												<input id="title" name="title" placeholder="{{ t('listing_title') }}" class="form-control input-md{{ $titleError }}"
													   type="text" value="{{ old('title', data_get($postInput, 'title')) }}">
												<div class="form-text text-muted">{{ t('a_great_title_needs_at_least_60_characters') }}</div>
											</div>
										</div>

										{{-- description --}}
										<?php $descriptionError = (isset($errors) && $errors->has('description')) ? ' is-invalid' : ''; ?>
										<div class="row mb-3 required">
											<?php
												$descriptionErrorLabel = '';
												$descriptionColClass = 'col-md-8';
												if (config('settings.single.wysiwyg_editor') != 'none') {
													$descriptionColClass = 'col-md-12';
													$descriptionErrorLabel = $descriptionError;
												}
											?>
											<label class="col-md-3 col-form-label{{ $descriptionErrorLabel }}" for="description">
												{{ t('Description') }} <sup>*</sup>
											</label>
											<div class="{{ $descriptionColClass }}">
												<textarea class="form-control{{ $descriptionError }}"
														  id="description"
														  name="description"
														  rows="15"
														  style="height: 300px"
												>{{ old('description', data_get($postInput, 'description')) }}</textarea>
												<div class="form-text text-muted">{{ t('describe_what_makes_your_listing_unique') }}...</div>
											</div>
										</div>
										
										{{-- cfContainer --}}
										<div id="cfContainer"></div>

										{{-- price --}}
										<?php $priceError = (isset($errors) && $errors->has('price')) ? ' is-invalid' : ''; ?>
										<div id="priceBloc" class="row mb-3">
											<label class="col-md-3 col-form-label{{ $priceError }}" for="price">{{ t('price') }}</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-text">{!! config('currency')['symbol'] !!}</span>
													<?php
													$price = \App\Helpers\Number::format(old('price', data_get($postInput, 'price')), 2, '.', '');
													?>
													<input id="price"
														   name="price"
														   class="form-control{{ $priceError }}"
														   placeholder="{{ t('ei_price') }}"
														   type="number"
														   min="0"
														   step="{{ getInputNumberStep((int)config('currency.decimal_places', 2)) }}"
														   value="{!! $price !!}"
													>
													<span class="input-group-text">
														<input id="negotiable" name="negotiable" type="checkbox"
															   value="1" {{ (old('negotiable', data_get($postInput, 'negotiable'))=='1') ? 'checked="checked"' : '' }}>&nbsp;
														<small>{{ t('negotiable') }}</small>
													</span>
												</div>
												<div class="form-text text-muted">{{ t('price_hint') }}</div>
											</div>
										</div>
										
										{{-- country_code --}}
										<?php $countryCodeError = (isset($errors) && $errors->has('country_code')) ? ' is-invalid' : ''; ?>
										@if (empty(config('country.code')))
											<div class="row mb-3 required">
												<label class="col-md-3 col-form-label{{ $countryCodeError }}" for="country_code">
													{{ t('your_country') }} <sup>*</sup>
												</label>
												<div class="col-md-8">
													<select id="countryCode" name="country_code" class="form-control large-data-selecter{{ $countryCodeError }}">
														<option value="0" {{ (!old('country_code') || old('country_code')==0) ? 'selected="selected"' : '' }}>
															{{ t('select_a_country') }}
														</option>
														@foreach ($countries as $item)
															<option value="{{ $item->get('code') }}" {{
																	(
																		old(
																			'country_code',
																			(!empty(config('ipCountry.code'))) ? config('ipCountry.code') : 0
																		) == $item->get('code')
																	)
																	? 'selected="selected"' : ''
																}}
															>
																{{ $item->get('name') }}
															</option>
														@endforeach
													</select>
												</div>
											</div>
										@else
											<input id="countryCode" name="country_code" type="hidden" value="{{ config('country.code') }}">
										@endif
										
										<?php
										/*
										@if (\Illuminate\Support\Facades\Schema::hasColumn('posts', 'address'))
										{{-- address --}}
										<div class="row mb-3 required <?php echo ($errors->has('address')) ? ' is-invalid' : ''; ?>">
											<label class="col-md-3 col-form-label" for="title">{{ t('Address') }} </label>
											<div class="col-md-8">
												<input id="address" name="address" placeholder="{{ t('Address') }}" class="form-control input-md"
													   type="text" value="{{ old('address') }}">
												<span class="help-block">{{ t('Fill an address to display on Google Maps') }} </span>
											</div>
										</div>
										@endif
										*/
										?>
										
										@if (config('country.admin_field_active') == 1 && in_array(config('country.admin_type'), ['1', '2']))
											{{-- admin_code --}}
											<?php $adminCodeError = (isset($errors) && $errors->has('admin_code')) ? ' is-invalid' : ''; ?>
											<div id="locationBox" class="row mb-3 required">
												<label class="col-md-3 col-form-label{{ $adminCodeError }}" for="admin_code">{{ t('location') }} <sup>*</sup></label>
												<div class="col-md-8">
													<select id="adminCode" name="admin_code" class="form-control large-data-selecter{{ $adminCodeError }}">
														<option value="0" {{ (!old('admin_code') || old('admin_code')==0) ? 'selected="selected"' : '' }}>
															{{ t('select_your_location') }}
														</option>
													</select>
												</div>
											</div>
										@endif
									
										{{-- city_id --}}
										<?php $cityIdError = (isset($errors) && $errors->has('city_id')) ? ' is-invalid' : ''; ?>
										<div id="cityBox" class="row mb-3 required">
											<label class="col-md-3 col-form-label{{ $cityIdError }}" for="city_id">{{ t('city') }} <sup>*</sup></label>
											<div class="col-md-8">
												<select id="cityId" name="city_id" class="form-control large-data-selecter{{ $cityIdError }}">
													<option value="0" {{ (!old('city_id') || old('city_id')==0) ? 'selected="selected"' : '' }}>
														{{ t('select_a_city') }}
													</option>
												</select>
											</div>
										</div>
										
										{{-- tags --}}
										<?php $tagsError = (isset($errors) && $errors->has('tags.*')) ? ' is-invalid' : ''; ?>
										<div class="row mb-3">
											<label class="col-md-3 col-form-label{{ $tagsError }}" for="tags">{{ t('Tags') }}</label>
											<div class="col-md-8">
												<select id="tags" name="tags[]" class="form-control tags-selecter" multiple="multiple">
													<?php $tags = old('tags', data_get($postInput, 'tags')); ?>
													@if (!empty($tags))
														@foreach($tags as $iTag)
															<option selected="selected">{{ $iTag }}</option>
														@endforeach
													@endif
												</select>
												<div class="form-text text-muted">
													{!! t('tags_hint', [
															'limit' => (int)config('settings.single.tags_limit', 15),
															'min'   => (int)config('settings.single.tags_min_length', 2),
															'max'   => (int)config('settings.single.tags_max_length', 30)
														]) !!}
												</div>
											</div>
										</div>
										
										{{-- is_permanent --}}
										@if (config('settings.single.permanent_listings_enabled') == '3')
											<input type="hidden" name="is_permanent" id="isPermanent" value="0">
										@else
											<?php $isPermanentError = (isset($errors) && $errors->has('is_permanent')) ? ' is-invalid' : ''; ?>
											<div id="isPermanentBox" class="row mb-3 required hide">
												<label class="col-md-3 col-form-label"></label>
												<div class="col-md-8">
													<div class="form-check">
														<input name="is_permanent" id="isPermanent"
															   class="form-check-input mt-1{{ $isPermanentError }}"
															   value="1"
															   type="checkbox" {{ (old('is_permanent', data_get($postInput, 'is_permanent'))=='1') ? 'checked="checked"' : '' }}
														>
														<label class="form-check-label mt-0" for="is_permanent">
															{!! t('is_permanent_label') !!}
														</label>
													</div>
													<div class="form-text text-muted">{{ t('is_permanent_hint') }}</div>
													<div style="clear:both"></div>
												</div>
											</div>
										@endif
										
										
										<div class="content-subheading">
											<i class="fas fa-user"></i>
											<strong>{{ t('seller_information') }}</strong>
										</div>
										
										
										{{-- contact_name --}}
										<?php $contactNameError = (isset($errors) && $errors->has('contact_name')) ? ' is-invalid' : ''; ?>
										@if (auth()->check())
											<input id="contact_name" name="contact_name" type="hidden" value="{{ auth()->user()->name }}">
										@else
											<div class="row mb-3 required">
												<label class="col-md-3 col-form-label{{ $contactNameError }}" for="contact_name">
													{{ t('your_name') }} <sup>*</sup>
												</label>
												<div class="col-md-8">
													<div class="input-group">
														<span class="input-group-text"><i class="far fa-user"></i></span>
														<input id="contact_name"
															   name="contact_name"
															   placeholder="{{ t('your_name') }}"
															   class="form-control input-md{{ $contactNameError }}"
															   type="text"
															   value="{{ old('contact_name', data_get($postInput, 'contact_name')) }}"
														>
													</div>
												</div>
											</div>
										@endif
										
										{{-- email --}}
										<?php $emailError = (isset($errors) && $errors->has('email')) ? ' is-invalid' : ''; ?>
										<div class="row mb-3 required">
											<label class="col-md-3 col-form-label{{ $emailError }}" for="email">{{ t('email') }}
												@if (!isEnabledField('phone') || !auth()->check())
													<sup>*</sup>
												@endif
											</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-text"><i class="far fa-envelope"></i></span>
													<input id="email" name="email"
														   class="form-control{{ $emailError }}"
														   placeholder="{{ t('email') }}"
														   type="text"
														   value="{{ old(
																		'email',
																		(
																			(auth()->check() && isset(auth()->user()->email))
																			? auth()->user()->email
																			: data_get($postInput, 'email')
																		)
																	) }}"
													>
												</div>
											</div>
										</div>
										
										<?php
											if (auth()->check()) {
												$formPhone = (auth()->user()->country_code == config('country.code')) ? auth()->user()->phone : '';
											} else {
												$formPhone = data_get($postInput, 'phone');
											}
										?>
										{{-- phone --}}
										<?php $phoneError = (isset($errors) and $errors->has('phone')) ? ' is-invalid' : ''; ?>
										<div class="row mb-3 required">
											<label class="col-md-3 col-form-label{{ $phoneError }}" for="phone">{{ t('phone_number') }}
												@if (!isEnabledField('email'))
													<sup>*</sup>
												@endif
											</label>
											<div class="col-md-8">
												<div class="input-group">
													<span id="phoneCountry" class="input-group-text">{!! getPhoneIcon(config('country.code')) !!}</span>
													<input id="phone" name="phone"
														   placeholder="{{ t('phone_number') }}"
														   class="form-control input-md{{ $phoneError }}" type="text"
														   value="{{ phoneFormat(old('phone', $formPhone), old('country', config('country.code'))) }}"
													>
													<span class="input-group-text">
														<input name="phone_hidden" id="phoneHidden" type="checkbox"
															   value="1" {{ (old('phone_hidden', data_get($postInput, 'phone_hidden'))=='1') ? 'checked="checked"' : '' }}>&nbsp;
														<small>{{ t('Hide') }}</small>
													</span>
												</div>
											</div>
										</div>
										
										@if (!auth()->check())
											@if (in_array(config('settings.single.auto_registration'), [1, 2]))
												{{-- auto_registration --}}
												@if (config('settings.single.auto_registration') == 1)
													<?php $autoRegistrationError = (isset($errors) && $errors->has('auto_registration')) ? ' is-invalid' : ''; ?>
													<div class="row mb-3 required">
														<label class="col-md-3 col-form-label"></label>
														<div class="col-md-8">
															<div class="form-check">
																<input name="auto_registration" id="auto_registration"
																	   class="form-check-input{{ $autoRegistrationError }}"
																	   value="1"
																	   type="checkbox"
																	   checked="checked"
																>
																
																<label class="form-check-label" for="auto_registration">
																	{!! t('I want to register by submitting this listing') !!}
																</label>
															</div>
															<div class="form-text text-muted">{{ t('You will receive your authentication information by email') }}</div>
															<div style="clear:both"></div>
														</div>
													</div>
												@else
													<input type="hidden" name="auto_registration" id="auto_registration" value="1">
												@endif
											@endif
										@endif
										
										@include('layouts.inc.tools.captcha', ['colLeft' => 'col-md-3', 'colRight' => 'col-md-8'])
										
										@if (!auth()->check())
											{{-- accept_terms --}}
											<?php $acceptTermsError = (isset($errors) and $errors->has('accept_terms')) ? ' is-invalid' : ''; ?>
											<div class="row mb-3 required">
												<label class="col-md-3 col-form-label"></label>
												<div class="col-md-8">
													<div class="form-check">
														<input name="accept_terms" id="acceptTerms"
															   class="form-check-input{{ $acceptTermsError }}"
															   value="1"
															   type="checkbox" {{ (old('accept_terms', data_get($postInput, 'accept_terms'))=='1') ? 'checked="checked"' : '' }}
														>
														
														<label class="form-check-label" for="acceptTerms" style="font-weight: normal;">
															{!! t('accept_terms_label', ['attributes' => getUrlPageByType('terms')]) !!}
														</label>
													</div>
													<div style="clear:both"></div>
												</div>
											</div>
											
											{{-- accept_marketing_offers --}}
											<?php $acceptMarketingOffersError = (isset($errors) && $errors->has('accept_marketing_offers')) ? ' is-invalid' : ''; ?>
											<div class="row mb-3 required">
												<label class="col-md-3 col-form-label"></label>
												<div class="col-md-8">
													<div class="form-check">
														<input name="accept_marketing_offers" id="acceptMarketingOffers"
															   class="form-check-input{{ $acceptMarketingOffersError }}"
															   value="1"
															   type="checkbox"
																{{ (
																	old(
																		'accept_marketing_offers',
																		data_get($postInput, 'accept_marketing_offers')
																	) == '1'
																) ? 'checked="checked"' : '' }}
														>
														
														<label class="form-check-label" for="acceptMarketingOffers" style="font-weight: normal;">
															{!! t('accept_marketing_offers_label') !!}
														</label>
													</div>
													<div style="clear:both"></div>
												</div>
											</div>
										@endif

										{{-- Button --}}
										<div class="row mb-3 pt-3">
											<div class="col-md-12 text-center">
												<button id="nextStepBtn" class="btn btn-primary btn-lg">{{ t('Next') }}</button>
											</div>
										</div>
										
									</fieldset>
								</form>

							</div>
						</div>
					</div>
				</div>
				<!-- /.page-content -->

				<div class="col-md-3 reg-sidebar">
					@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.right-sidebar', 'post.createOrEdit.inc.right-sidebar'])
				</div>
				
			</div>
		</div>
	</div>
	@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.category-modal', 'post.createOrEdit.inc.category-modal'])
@endsection

@section('after_styles')
@endsection

@section('after_scripts')
@endsection

@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.form-assets', 'post.createOrEdit.inc.form-assets'])
