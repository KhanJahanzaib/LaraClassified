{{-- PNotify --}}
<script src="{{ asset('assets/plugins/pnotify/5.2.0/dist/PNotify.js') }}"></script>
<script src="{{ asset('assets/plugins/pnotify/5.2.0/modules/bootstrap4/PNotifyBootstrap4.js') }}"></script>
<script src="{{ asset('assets/plugins/pnotify/5.2.0/modules/font-awesome5/PNotifyFontAwesome5.js') }}"></script>
<script src="{{ asset('assets/plugins/pnotify/5.2.0/modules/font-awesome5-fix/PNotifyFontAwesome5Fix.js') }}"></script>

{{-- Bootstrap Notifications using Prologue Alerts --}}
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		
		PNotify.defaultModules.set(PNotifyBootstrap4, {});
		PNotify.defaultModules.set(PNotifyFontAwesome5Fix, {});
		PNotify.defaultModules.set(PNotifyFontAwesome5, {});
		
		@foreach (Alert::getMessages() as $type => $messages)
			@foreach ($messages as $message)
				
				@php
					$message = cleanAddSlashes($message);
				@endphp
				
				$(function () {
					@if ($message == t('demo_mode_message'))
						new PNotify.alert({
							title: 'Information',
							text: "{{ $message }}",
							textTrusted: true,
							type: "{{ $type }}"
						});
					@else
						new PNotify.alert({
							text: "{{ $message }}",
							textTrusted: true,
							type: "{{ $type }}",
							icon: false
						});
					@endif
				});
				
			@endforeach
		@endforeach
		
	});
</script>