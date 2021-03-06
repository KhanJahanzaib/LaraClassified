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
@extends('errors.layouts.master')

@section('title', t('Whoops'))

@section('search')
	@parent
	@include('errors.layouts.inc.search')
@endsection

@section('content')
	@if (!(isset($paddingTopExists) and $paddingTopExists))
		<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
	@endif
	<div class="main-container inner-page">
		<div class="container">
			<div class="section-content">
				<div class="row">

					<div class="col-md-12 page-content">
						
						<div class="error-page mt-5 mb-5 ms-0 me-0 pt-5">
							<h1 class="headline text-center" style="font-size: 180px;">{{ t('Whoops') }}</h1>
							<div class="text-center mt-5">
								<h3 class="m-t-0 color-danger">
									<i class="fas fa-exclamation-triangle"></i> {{ t('Bad request') }}
								</h3>
								<p>{!! t('we_can_not_process_your_request_text.') !!}</p>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
