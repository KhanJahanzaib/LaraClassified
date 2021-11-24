<?php
/**
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

namespace App\Http\Controllers\Web;

use App\Helpers\UrlGen;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Traits\CommonTrait;
use App\Http\Controllers\Web\Traits\EnvFileTrait;
use App\Http\Controllers\Web\Traits\RobotsTxtTrait;
use App\Http\Controllers\Web\Traits\SettingsTrait;
use App\Models\Permission;

class FrontController extends Controller
{
	use SettingsTrait, EnvFileTrait, RobotsTxtTrait, CommonTrait;
	
	public $request;
	public $data = [];
	
	/**
	 * FrontController constructor.
	 */
	public function __construct()
	{
		// Set the storage disk
		$this->setStorageDisk();
		
		// Check & Change the App Key (If needed)
		$this->checkAndGenerateAppKey();
		
		// Load the Plugins
		$this->loadPlugins();
		
		// Check & Update the '/.env' file
		$this->checkDotEnvEntries();
		
		// Check & Update the '/public/robots.txt' file
		$this->checkRobotsTxtFile();
		
		// From Laravel 5.3.4+
		$this->middleware(function ($request, $next) {
			// Load Localization Data first
			// Check out the SetCountryLocale Middleware
			$this->applyFrontSettings();
			
			// Get & Share Users Menu
			$userMenu = $this->getUserMenu();
			view()->share('userMenu', $userMenu);
			
			return $next($request);
		});
		
		// Check the 'Currency Exchange' plugin
		if (config('plugins.currencyexchange.installed')) {
			$this->middleware(['currencies', 'currencyExchange']);
		}
		
		// Check the 'Domain Mapping' plugin
		if (config('plugins.domainmapping.installed')) {
			$this->middleware(['domain.verification']);
		}
	}
	
	/**
	 * @return \Illuminate\Support\Collection
	 */
	private function getUserMenu()
	{
		if (!auth()->check()) {
			return collect();
		}
		
		$menuArray = [
			[
				'name'       => t('my_listings'),
				'url'        => url('account/my-posts'),
				'icon'       => 'fas fa-th-list',
				'group'      => t('my_listings'),
				'countVar'   => 'countMyPosts',
				'inDropdown' => true,
			],
			[
				'name'       => t('favourite_listings'),
				'url'        => url('account/favourite'),
				'icon'       => 'fas fa-bookmark',
				'group'      => t('my_listings'),
				'countVar'   => 'countFavouritePosts',
				'inDropdown' => true,
			],
			[
				'name'       => t('Saved searches'),
				'url'        => url('account/saved-search'),
				'icon'       => 'fas fa-bell',
				'group'      => t('my_listings'),
				'countVar'   => 'countSavedSearch',
				'inDropdown' => true,
			],
			[
				'name'       => t('pending_approval'),
				'url'        => url('account/pending-approval'),
				'icon'       => 'fas fa-hourglass-half',
				'group'      => t('my_listings'),
				'countVar'   => 'countPendingPosts',
				'inDropdown' => true,
			],
			[
				'name'       => t('archived_listings'),
				'url'        => url('account/archived'),
				'icon'       => 'fas fa-calendar-times',
				'group'      => t('my_listings'),
				'countVar'   => 'countArchivedPosts',
				'inDropdown' => true,
			],
			[
				'name'             => t('messenger'),
				'url'              => url('account/messages'),
				'icon'             => 'far fa-envelope',
				'group'            => t('my_listings'),
				'countVar'         => 0,
				'countCustomClass' => ' count-threads-with-new-messages',
				'inDropdown'       => true,
			],
			[
				'name'       => t('Transactions'),
				'url'        => url('account/transactions'),
				'icon'       => 'fas fa-coins',
				'group'      => t('my_listings'),
				'countVar'   => 'countTransactions',
				'inDropdown' => true,
			],
			[
				'name'       => t('My Account'),
				'url'        => url('account'),
				'icon'       => 'fas fa-cog',
				'group'      => t('My Account'),
				'countVar'   => null,
				'inDropdown' => true,
			],
		];
		
		if (app('impersonate')->isImpersonating()) {
			$logOut = [
				'name'       => t('Leave'),
				'url'        => route('impersonate.leave'),
				'icon'       => 'fas fa-sign-out-alt',
				'group'      => t('My Account'),
				'countVar'   => null,
				'inDropdown' => true,
			];
		} else {
			$logOut = [
				'name'       => t('log_out'),
				'url'        => UrlGen::logout(),
				'icon'       => 'fas fa-sign-out-alt',
				'group'      => t('My Account'),
				'countVar'   => null,
				'inDropdown' => true,
			];
		}
		
		$closeAccount = [
			'name'       => t('Close account'),
			'url'        => url('account/close'),
			'icon'       => 'fas fa-times-circle',
			'group'      => t('My Account'),
			'countVar'   => null,
			'inDropdown' => false,
		];
		
		if (auth()->user()->can(Permission::getStaffPermissions())) {
			$adminPanel = [
				'name'       => t('admin_panel'),
				'url'        => admin_url('/'),
				'icon'       => 'fas fa-cogs',
				'group'      => t('admin_panel'),
				'countVar'   => null,
				'inDropdown' => true,
			];
		}
		
		if (isset($adminPanel) && !empty($adminPanel)) {
			array_push($menuArray, $logOut, $closeAccount, $adminPanel);
		} else {
			array_push($menuArray, $logOut, $closeAccount);
		}
		
		$menuArray = collect($menuArray);
		
		// Set missed information
		$menuArray = $menuArray->map(function ($item, $key) {
			// countCustomClass
			$item['countCustomClass'] = (isset($item['countCustomClass'])) ? $item['countCustomClass'] : '';
			
			// path
			$tmp = [];
			preg_match('|(account.*)|ui', $item['url'], $tmp);
			$item['path'] = (isset($tmp[1])) ? $tmp[1] : '-1';
			$item['path'] = str_replace(['account', '/'], '', $item['path']);
			
			return $item;
		});
		
		return $menuArray;
	}
}
