<?php $supportedLanguages = getSupportedLanguages(); ?>
@if (is_array($supportedLanguages) && count($supportedLanguages) > 1)
	{{-- Language Selector --}}
	<li class="dropdown lang-menu nav-item">
		<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="langDropdown">
			<span class="lang-title">{{ strtoupper(config('app.locale')) }}</span>
		</button>
		<ul id="langDropdownItems" class="dropdown-menu dropdown-menu-end user-menu shadow-sm mt-2" role="menu" aria-labelledby="langDropdown">
			@foreach($supportedLanguages as $langCode => $lang)
				@continue(strtolower($langCode) == strtolower(config('app.locale')))
				<li class="dropdown-item col">
					<a href="{{ url('lang/' . $langCode) }}" tabindex="-1" rel="alternate" hreflang="{{ $langCode }}">
						<span class="lang-name">{!! $lang['native'] !!}</span>
					</a>
				</li>
			@endforeach
		</ul>
	</li>
@endif