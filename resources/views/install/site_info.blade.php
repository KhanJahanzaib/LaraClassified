@extends('install.layouts.master')

@section('title', trans('messages.configuration'))

@section('content')
<?php
function random($length, $chars = '')
{
	if (!$chars) {
		$chars = implode(range('a','f'));
		$chars .= implode(range('0','9'));
	}
	$shuffled = str_shuffle($chars);
	return substr($shuffled, 0, $length);
}
function serialkey()
{
	return random(8).'-'.random(4).'-'.random(4).'-'.random(4).'-'.random(12);

}
$key = serialkey();
?>
	
	<form action="{{ $installUrl . '/site_info' }}" method="POST">
		{!! csrf_field() !!}
		
		<h3 class="title-3"><i class="fas fa-globe"></i> {{ trans('messages.general') }}</h3>
		<div class="row">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'site_name',
					'value' => (isset($site_info["site_name"]) ? $site_info["site_name"] : ""),
					'rules' => ["site_name" => "required"]
				])
			</div>
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'site_slogan',
					'value' => (isset($site_info["site_slogan"]) ? $site_info["site_slogan"] : ""),
					'rules' => ["site_slogan" => "required"]
				])
			</div>
		</div>
		
		<hr class="border-0 bg-secondary">
		
		<h3 class="title-3"><i class="fas fa-user"></i> {{ trans('messages.admin_info') }}</h3>
		<div class="row">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'name',
					'value' => (isset($site_info["name"]) ? $site_info["name"] : ""),
					'rules' => $rules
				])
			</div>
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'purchase_code',
					'value' => "$key",
					'hint' => trans('admin.find_my_purchase_code'),
					'rules' => $rules
				])
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'email',
					'value' => (isset($site_info["email"]) ? $site_info["email"] : ""),
					'rules' => $rules
				])
			</div>
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'password',
					'value' => (isset($site_info["password"]) ? $site_info["password"] : ""),
					'rules' => $rules
				])
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
				'type' => 'select',
				'name' => 'default_country',
				'value' => (isset($site_info["default_country"]) ? $site_info["default_country"] : ((isset($_COOKIE['ip_country_code'])) ? $_COOKIE['ip_country_code'] : "")),
				'options' => getCountriesFromArray(),
				'include_blank' => trans('messages.choose'),
				'rules' => $rules
				])
			</div>
		</div>
		
		<hr class="border-0 bg-secondary">
		
		<h3 class="title-3"><i class="fas fa-envelope"></i> {{ trans('messages.system_email_configuration') }}</h3>
		<div class="row">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'select',
					'name' => 'mail_driver',
					'label' => trans('messages.mail_driver'),
					'value' => (isset($site_info["mail_driver"]) ? $site_info["mail_driver"] : ""),
					'options' => [
						["value" => "sendmail", "text" => trans('messages.sendmail')],
						["value" => "smtp", "text" => trans('messages.smtp')],
						["value" => "mailgun", "text" => trans('messages.mailgun')],
						["value" => "postmark", "text" => trans('messages.postmark')],
						["value" => "ses", "text" => trans('messages.ses')],
						["value" => "mandrill", "text" => trans('messages.mandrill')],
						["value" => "sparkpost", "text" => trans('messages.sparkpost')],
					],
					'rules' => $rules
				])
			</div>
		</div>
		<div class="row sendmail-box">
			<div class="col-md-6">
				@php($sendmailPath = '/usr/sbin/sendmail -bs')
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'sendmail_path',
					'label' => trans('messages.sendmail_path'),
					'value' => (isset($site_info["sendmail_path"]) ? $site_info["sendmail_path"] : $sendmailPath),
					'hint' => trans('admin.sendmail_path_hint'),
					'rules' => $sendmail_rules
				])
			</div>
		</div>
		<div class="row smtp-box">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'smtp_hostname',
					'label' => trans('messages.hostname'),
					'value' => (isset($site_info["smtp_hostname"]) ? $site_info["smtp_hostname"] : ""),
					'rules' => $smtp_rules
				])
				
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'smtp_username',
					'label' => trans('messages.username'),
					'value' => (isset($site_info["smtp_username"]) ? $site_info["smtp_username"] : ""),
					'rules' => $smtp_rules
				])
				
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'smtp_encryption',
					'label' => trans('messages.encryption'),
					'value' => (isset($site_info["smtp_encryption"]) ? $site_info["smtp_encryption"] : ""),
					'rules' => $smtp_rules
				])
			
			</div>
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'smtp_port',
					'label' => trans('messages.port'),
					'value' => (isset($site_info["smtp_port"]) ? $site_info["smtp_port"] : ""),
					'rules' => $smtp_rules
				])
				
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'smtp_password',
					'label' => trans('messages.password'),
					'value' => (isset($site_info["smtp_password"]) ? $site_info["smtp_password"] : ""),
					'rules' => $smtp_rules
				])
			</div>
		</div>
		<div class="row mailgun-box">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'mailgun_domain',
					'label' => trans('messages.mailgun_domain'),
					'value' => (isset($site_info["mailgun_domain"]) ? $site_info["mailgun_domain"] : ""),
					'rules' => $mailgun_rules
				])
			
			</div>
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'mailgun_secret',
					'label' => trans('messages.mailgun_secret'),
					'value' => (isset($site_info["mailgun_secret"]) ? $site_info["mailgun_secret"] : ""),
					'rules' => $mailgun_rules
				])
			</div>
		</div>
		<div class="row postmark-box">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'postmark_token',
					'label' => trans('messages.postmark_token'),
					'value' => (isset($site_info["postmark_token"]) ? $site_info["postmark_token"] : ""),
					'rules' => $postmark_rules
				])
			</div>
		</div>
		<div class="row ses-box">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'ses_key',
					'label' => trans('messages.ses_key'),
					'value' => (isset($site_info["ses_key"]) ? $site_info["ses_key"] : ""),
					'rules' => $ses_rules
				])
				
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'ses_secret',
					'label' => trans('messages.ses_secret'),
					'value' => (isset($site_info["ses_secret"]) ? $site_info["ses_secret"] : ""),
					'rules' => $ses_rules
				])
			</div>
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'ses_region',
					'label' => trans('messages.ses_region'),
					'value' => (isset($site_info["ses_region"]) ? $site_info["ses_region"] : ""),
					'rules' => $ses_rules
				])
			</div>
		</div>
		<div class="row mandrill-box">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'mandrill_secret',
					'label' => trans('messages.mandrill_secret'),
					'value' => (isset($site_info["mandrill_secret"]) ? $site_info["mandrill_secret"] : ""),
					'rules' => $mandrill_rules
				])
			</div>
		</div>
		<div class="row sparkpost-box">
			<div class="col-md-6">
				@include('install.helpers.form_control', [
					'type' => 'text',
					'name' => 'sparkpost_secret',
					'label' => trans('messages.sparkpost_secret'),
					'value' => (isset($site_info["sparkpost_secret"]) ? $site_info["sparkpost_secret"] : ""),
					'rules' => $sparkpost_rules
				])
			</div>
		</div>
		
		<hr class="border-0 bg-secondary">
		
		<div class="text-end">
			<button type="submit" class="btn btn-primary" data-wait="{{ trans('messages.button_processing') }}">
				{!! trans('messages.next') !!} <i class="fas fa-chevron-right position-right"></i>
			</button>
		</div>
	
	</form>

@endsection

@section('after_scripts')
	<script type="text/javascript" src="{{ url()->asset('assets/plugins/forms/styling/uniform.min.js') }}"></script>
	<script>
		function toogleMailer() {
			var value = $("select[name='mail_driver']").val();
			var smtpEl = $('.smtp-box');
			
			$('.smtp-box, .sendmail-box, .mailgun-box, .postmark-box, .ses-box, .mandrill-box, .sparkpost-box').hide();
			
			if (value === 'sendmail') {
				/* $('.sendmail-box').show(); */
			}
			if (value === 'smtp') {
				smtpEl.show();
			}
			if (value === 'mailgun') {
				smtpEl.show();
				$('.mailgun-box').show();
			}
			if (value === 'postmark') {
				smtpEl.show();
				$('.postmark-box').show();
			}
			if (value === 'ses') {
				smtpEl.show();
				$('.ses-box').show();
			}
			if (value === 'mandrill') {
				smtpEl.show();
				$('.mandrill-box').show();
			}
			if (value === 'sparkpost') {
				smtpEl.show();
				$('.sparkpost-box').show();
			}
		}
		
		$(document).ready(function () {
			toogleMailer();
			$("select[name='mail_driver']").change(function () {
				toogleMailer();
			});
		});
	</script>
@endsection
