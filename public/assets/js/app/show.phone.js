/*
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
 */

if (typeof showSecurityTips === 'undefined') {
	var showSecurityTips = '0';
}

$(document).ready(function () {
	
	$('.phoneBlock').click(function (e) {
		e.preventDefault(); /* prevents the submit or reload */
		
		showPhone(showSecurityTips);
		
		return false;
	});
	
});

/**
 * Show the Seller's Phone
 * @returns {boolean}
 */
function showPhone(showSecurityTips)
{
	let postId = $('#postId').val();
	
	if (postId === 0 || postId === '0' || postId === '') {
		if (showSecurityTips === 1 || showSecurityTips === '1') {
			let securityTipsEl = $('#securityTips');
			
			securityTipsEl.modal({show: false})
			securityTipsEl.modal('show');
		}
		
		return false;
	}
	
	let resultCanBeCached = true;
	let url = siteUrl + '/ajax/post/phone';
	
	$.ajax({
		method: 'POST',
		url: url,
		data: {
			'postId': postId,
			'_token': $('input[name=_token]').val()
		},
		cache: resultCanBeCached,
		beforeSend: function() {
			let loadingImg = '<img src="' + siteUrl + '/images/loading.gif">';
			$('#phoneModal').html(loadingImg);
		}
	}).done(function (data) {
		if (typeof data.phoneModal === 'undefined' || typeof data.phone === 'undefined') {
			return false;
		}
		
		if (showSecurityTips === 1 || showSecurityTips === '1') {
			$('#phoneModal').html(data.phoneModal);
			$('#phoneModalLink').attr('href', data.link);
			$('#securityTips').modal('show');
		} else {
			let phoneBlockEl = $('.phoneBlock');
			
			phoneBlockEl.html('<i class="fas fa-mobile-alt"></i> ' + data.phone);
			phoneBlockEl.attr('href', data.link);
			phoneBlockEl.tooltip('dispose'); /* Disable Tooltip */
		}
		
		if (resultCanBeCached) {
			$('#postId').val(0);
		}
	});
}
