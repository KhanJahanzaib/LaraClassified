<?php
// Init.
$sForm = [
	'enableFormAreaCustomization' => '0',
	'hideTitles'                  => '0',
	'title'                       => t('homepage_title_text'),
	'subTitle'                    => t('simple_fast_and_efficient'),
	'bigTitleColor'               => '', // 'color: #FFF;',
	'subTitleColor'               => '', // 'color: #FFF;',
	'backgroundColor'             => '', // 'background-color: #444;',
	'backgroundImage'             => '', // null,
	'height'                      => '', // '450px',
	'parallax'                    => '0',
	'hideForm'                    => '0',
	'formBorderColor'             => '', // 'background-color: #333;',
	'formBorderSize'              => '', // '5px',
	'formBtnBackgroundColor'      => '', // 'background-color: #4682B4; border-color: #4682B4;',
	'formBtnTextColor'            => '', // 'color: #FFF;',
];

// Get Search Form Options
if (isset($searchFormOptions)) {
	if (isset($searchFormOptions['enable_form_area_customization']) && !empty($searchFormOptions['enable_form_area_customization'])) {
		$sForm['enableFormAreaCustomization'] = $searchFormOptions['enable_form_area_customization'];
	}
	if (isset($searchFormOptions['hide_titles']) && !empty($searchFormOptions['hide_titles'])) {
		$sForm['hideTitles'] = $searchFormOptions['hide_titles'];
	}
	if (isset($searchFormOptions['title_' . config('app.locale')]) && !empty($searchFormOptions['title_' . config('app.locale')])) {
		$sForm['title'] = $searchFormOptions['title_' . config('app.locale')];
		$sForm['title'] = replaceGlobalPatterns($sForm['title']);
	}
	if (isset($searchFormOptions['sub_title_' . config('app.locale')]) && !empty($searchFormOptions['sub_title_' . config('app.locale')])) {
		$sForm['subTitle'] = $searchFormOptions['sub_title_' . config('app.locale')];
		$sForm['subTitle'] = replaceGlobalPatterns($sForm['subTitle']);
	}
	if (isset($searchFormOptions['parallax']) && !empty($searchFormOptions['parallax'])) {
		$sForm['parallax'] = $searchFormOptions['parallax'];
	}
	if (isset($searchFormOptions['hide_form']) && !empty($searchFormOptions['hide_form'])) {
		$sForm['hideForm'] = $searchFormOptions['hide_form'];
	}
}

// Country Map status (shown/hidden)
$showMap = false;
if (file_exists(config('larapen.core.maps.path') . config('country.icode') . '.svg')) {
	if (isset($citiesOptions) && isset($citiesOptions['show_map']) && $citiesOptions['show_map'] == '1') {
		$showMap = true;
	}
}
$hideOnMobile = '';
if (isset($searchFormOptions, $searchFormOptions['hide_on_mobile']) && $searchFormOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>
@if (isset($sForm['enableFormAreaCustomization']) && $sForm['enableFormAreaCustomization'] == '1')
	
	@if (isset($firstSection) && !$firstSection)
		<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
	@endif
	
	<?php $parallax = (isset($sForm['parallax']) && $sForm['parallax'] == '1') ? ' parallax' : ''; ?>
	<div class="intro{{ $hideOnMobile }}{{ $parallax }}">
		<div class="container text-center">
			
			@if ($sForm['hideTitles'] != '1')
				<h1 class="intro-title animated fadeInDown">
					{{ $sForm['title'] }}
				</h1>
				<p class="sub animateme fittext3 animated fadeIn">
					{!! $sForm['subTitle'] !!}
				</p>
			@endif
			
			@if ($sForm['hideForm'] != '1')
					<form id="search" name="search" action="{{ \App\Helpers\UrlGen::search() }}" method="GET">
						<div class="row search-row animated fadeInUp">
							
							<div class="col-md-5 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
								<div class="search-col-inner">
									<i class="fas fa-angle-double-right icon-append"></i>
									<div class="search-col-input">
										<input class="form-control has-icon" name="q" placeholder="{{ t('what') }}" type="text" value="">
									</div>
								</div>
							</div>
							
							<input type="hidden" id="lSearch" name="l" value="">
							
							<div class="col-md-5 col-sm-12 search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
								<div class="search-col-inner">
									<i class="fas fa-map-marker-alt icon-append"></i>
									<div class="search-col-input">
										@if ($showMap)
											<input class="form-control locinput input-rel searchtag-input has-icon"
												   id="locSearch"
												   name="location"
												   placeholder="{{ t('where') }}"
												   type="text"
												   value=""
												   data-bs-placement="top"
												   data-bs-toggle="tooltipHover"
												   title="{{ t('Enter a city name OR a state name with the prefix', ['prefix' => t('area')]) . t('State Name') }}"
											>
										@else
											<input class="form-control locinput input-rel searchtag-input has-icon"
												   id="locSearch"
												   name="location"
												   placeholder="{{ t('where') }}"
												   type="text"
												   value=""
											>
										@endif
									</div>
								</div>
							</div>
							
							<div class="col-md-2 col-sm-12 search-col">
								<div class="search-btn-border bg-primary">
									<button class="btn btn-primary btn-search btn-block btn-gradient">
										<i class="fas fa-search"></i> <strong>{{ t('find') }}</strong>
									</button>
								</div>
							</div>
							
						</div>
					</form>
			@endif
			
		</div>
	</div>
	
@else
	
	@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'])
	<div class="intro only-search-bar{{ $hideOnMobile }}">
		<div class="container text-center">
			
			@if ($sForm['hideForm'] != '1')
				<form id="search" name="search" action="{{ \App\Helpers\UrlGen::search() }}" method="GET">
					<div class="row search-row animated fadeInUp">
						
						<div class="col-md-5 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
							<div class="search-col-inner">
								<i class="fas fa-angle-double-right icon-append"></i>
								<div class="search-col-input">
									<input class="form-control has-icon" name="q" placeholder="{{ t('what') }}" type="text" value="">
								</div>
							</div>
						</div>
						
						<input type="hidden" id="lSearch" name="l" value="">
						
						<div class="col-md-5 col-sm-12 search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
							<div class="search-col-inner">
								<i class="fas fa-map-marker-alt icon-append"></i>
								<div class="search-col-input">
									@if ($showMap)
										<input class="form-control locinput input-rel searchtag-input has-icon"
											   id="locSearch"
											   name="location"
											   placeholder="{{ t('where') }}"
											   type="text"
											   value=""
											   data-bs-placement="top"
											   data-bs-toggle="tooltipHover"
											   title="{{ t('Enter a city name OR a state name with the prefix', ['prefix' => t('area')]) . t('State Name') }}"
										>
									@else
										<input class="form-control locinput input-rel searchtag-input has-icon"
											   id="locSearch"
											   name="location"
											   placeholder="{{ t('where') }}"
											   type="text"
											   value=""
										>
									@endif
								</div>
							</div>
						</div>
						
						<div class="col-md-2 col-sm-12 search-col">
							<div class="search-btn-border bg-primary">
								<button class="btn btn-primary btn-search btn-block btn-gradient">
									<i class="fas fa-search"></i> <strong>{{ t('find') }}</strong>
								</button>
							</div>
						</div>
					
					</div>
				</form>
			@endif
		
		</div>
	</div>
	
@endif
