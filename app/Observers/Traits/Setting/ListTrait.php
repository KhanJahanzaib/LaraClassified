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

namespace App\Observers\Traits\Setting;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Larapen\LaravelDistance\Libraries\mysql\DistanceHelper;

trait ListTrait
{
	/**
	 * Saved
	 *
	 * @param $setting
	 */
	public function listSaved($setting)
	{
		$this->saveTheDisplayModeInCookie($setting);
		$this->applyDistanceCalculationFunctionOperation($setting);
	}
	
	/**
	 * @param $setting
	 */
	private function applyDistanceCalculationFunctionOperation($setting)
	{
		// If the 'distance_calculation_formula' has been changed
		if (array_key_exists('distance_calculation_formula', $setting->value)) {
			$this->removeDistanceCalculationFunctionsCache();
			$this->createDistanceCalculationFunction($setting);
		}
	}
	
	/**
	 * If the 'distance_calculation_formula' has been changed,
	 * Remove Distance Calculation Functions from Cache
	 */
	private function removeDistanceCalculationFunctionsCache()
	{
		try {
			$customFunctions = ['haversine', 'orthodromy'];
			foreach ($customFunctions as $function) {
				// Drop the function, If exists
				$sql = 'DROP FUNCTION IF EXISTS ' . $function . ';';
				DB::statement($sql);
				
				// Remove the corresponding cache (@todo: remove it)
				$cacheId = 'checkIfMySQLFunctionExists.' . $function;
				if (Cache::has($cacheId)) {
					Cache::forget($cacheId);
				}
			}
		} catch (\Throwable $e) {
		}
	}
	
	/**
	 * If the 'distance_calculation_formula' has been changed,
	 * If the selected Distance Calculation Function doesn't exist, then create it
	 *
	 * @param $setting
	 */
	private function createDistanceCalculationFunction($setting)
	{
		// Create the MySQL Distance Calculation function, If doesn't exist.
		if (!DistanceHelper::checkIfDistanceCalculationFunctionExists($setting->value['distance_calculation_formula'])) {
			$res = DistanceHelper::createDistanceCalculationFunction($setting->value['distance_calculation_formula']);
		}
	}
	
	/**
	 * Save the new Display Mode in cookie
	 *
	 * @param $setting
	 */
	public function saveTheDisplayModeInCookie($setting)
	{
		// If the Default List Mode is changed, then clear the 'list_display_mode' from the cookies
		// NOTE: The cookie has been set from JavaScript, so we have to provide the good path (may be the good expire time)
		if (isset($setting->value['display_mode'])) {
			$expire = 60 * 24 * 7; // 7 days
			if (isset($_COOKIE['list_display_mode'])) {
				unset($_COOKIE['list_display_mode']);
			}
			setcookie('list_display_mode', $setting->value['display_mode'], $expire, '/');
		}
	}
}
