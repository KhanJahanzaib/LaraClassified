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

namespace App\Models\Setting;

use App\Helpers\DBTool;

class ListSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['display_mode'] = 'make-grid';
			$value['items_per_page'] = '12';
			$value['left_sidebar'] = '1';
			$value['show_category_icon'] = '7';
			$value['cities_extended_searches'] = '1';
			if (DBTool::isMySqlMinVersion('5.7.6') && !DBTool::isMariaDB()) {
				$value['distance_calculation_formula'] = 'ST_Distance_Sphere';
			} else {
				$value['distance_calculation_formula'] = 'haversine';
			}
			$value['search_distance_max'] = '500';
			$value['search_distance_default'] = '50';
			$value['search_distance_interval'] = '100';
			
		} else {
			
			if (!isset($value['display_mode'])) {
				$value['display_mode'] = 'make-grid';
			}
			if (!isset($value['items_per_page'])) {
				$value['items_per_page'] = '12';
			}
			if (!isset($value['left_sidebar'])) {
				$value['left_sidebar'] = '1';
			}
			if (!isset($value['show_category_icon'])) {
				$value['show_category_icon'] = '7';
			}
			if (!isset($value['cities_extended_searches'])) {
				$value['cities_extended_searches'] = '1';
			}
			if (!isset($value['distance_calculation_formula'])) {
				if (DBTool::isMySqlMinVersion('5.7.6') && !DBTool::isMariaDB()) {
					$value['distance_calculation_formula'] = 'ST_Distance_Sphere';
				} else {
					$value['distance_calculation_formula'] = 'haversine';
				}
			}
			if (!isset($value['search_distance_max'])) {
				$value['search_distance_max'] = '500';
			}
			if (!isset($value['search_distance_default'])) {
				$value['search_distance_default'] = '50';
			}
			if (!isset($value['search_distance_interval'])) {
				$value['search_distance_interval'] = '100';
			}
			
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
	
	public static function getFields($diskName)
	{
		$fields = [
			[
				'name'  => 'separator_1',
				'type'  => 'custom_html',
				'value' => trans('admin.list_html_displaying'),
			],
			[
				'name'              => 'display_mode',
				'label'             => trans('admin.Listing Page Display Mode'),
				'type'              => 'select2_from_array',
				'options'           => [
					'make-grid'    => 'Grid',
					'make-list'    => 'List',
					'make-compact' => 'Compact',
				],
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'grid_view_cols',
				'label'             => trans('admin.Grid View Columns'),
				'type'              => 'select2_from_array',
				'options'           => [
					4 => '4',
					3 => '3',
					2 => '2',
				],
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'items_per_page',
				'label'             => trans('admin.Items per page'),
				'type'              => 'number',
				'hint'              => trans('admin.Number of items per page'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'fake_locations_results',
				'label'             => trans('admin.fake_locations_results_label'),
				'type'              => 'select2_from_array',
				'options'           => [
					0 => trans('admin.fake_locations_results_op_1'),
					1 => trans('admin.fake_locations_results_op_2'),
					2 => trans('admin.fake_locations_results_op_3'),
				],
				'hint'              => trans('admin.fake_locations_results_hint'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'left_sidebar',
				'label'             => trans('admin.Listing Page Left Sidebar'),
				'type'              => 'checkbox_switch',
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'show_cats_in_top',
				'label'             => trans('admin.show_cats_in_top_label'),
				'type'              => 'checkbox_switch',
				'hint'              => trans('admin.show_cats_in_top_hint'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'show_category_icon',
				'label'             => trans('admin.show_category_icon_label'),
				'type'              => 'select2_from_array',
				'options'           => [
					1 => trans('admin.show_category_icon_op_1'),
					2 => trans('admin.show_category_icon_op_2'),
					3 => trans('admin.show_category_icon_op_3'),
					4 => trans('admin.show_category_icon_op_4'),
					5 => trans('admin.show_category_icon_op_5'),
					6 => trans('admin.show_category_icon_op_6'),
					7 => trans('admin.show_category_icon_op_7'),
					8 => trans('admin.show_category_icon_op_8'),
				],
				'hint'              => trans('admin.show_category_icon_hint'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'show_listings_tags',
				'label'             => trans('admin.show_listings_tags_label'),
				'type'              => 'checkbox_switch',
				'hint'              => trans('admin.show_listings_tags_hint'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			
			[
				'name'  => 'count_listings_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.count_listings_title'),
			],
			[
				'name'              => 'count_categories_listings',
				'label'             => trans('admin.count_categories_listings_label'),
				'type'              => 'checkbox_switch',
				'hint'              => trans('admin.count_categories_listings_hint', ['extendedSearches' => trans('admin.cities_extended_searches_label')]),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'count_cities_listings',
				'label'             => trans('admin.count_cities_listings_label'),
				'type'              => 'checkbox_switch',
				'hint'              => trans('admin.count_cities_listings_hint', ['extendedSearches' => trans('admin.cities_extended_searches_label')]),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			
			[
				'name'  => 'dates_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.dates_title'),
			],
			[
				'name'  => 'php_specific_date_format',
				'type'  => 'custom_html',
				'value' => trans('admin.php_specific_date_format_info'),
			],
			[
				'name'              => 'elapsed_time_from_now',
				'label'             => trans('admin.elapsed_time_from_now_label'),
				'type'              => 'checkbox_switch',
				'hint'              => trans('admin.listing_elapsed_time_from_now_hint'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'hide_dates',
				'label'             => trans('admin.hide_dates_label'),
				'type'              => 'checkbox_switch',
				'hint'              => trans('admin.listing_hide_dates_hint'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			
			[
				'name'  => 'separator_2',
				'type'  => 'custom_html',
				'value' => trans('admin.list_html_distance'),
			],
			[
				'name'              => 'cities_extended_searches',
				'label'             => trans('admin.cities_extended_searches_label'),
				'type'              => 'checkbox_switch',
				'hint'              => trans('admin.cities_extended_searches_hint'),
				'wrapperAttributes' => [
					'class' => 'col-md-12',
				],
			],
			[
				'name'              => 'distance_calculation_formula',
				'label'             => trans('admin.distance_calculation_formula_label'),
				'type'              => 'select2_from_array',
				'options'           => self::distanceCalculationFormula(),
				'hint'              => trans('admin.distance_calculation_formula_hint'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'search_distance_default',
				'label'             => trans('admin.Default Search Distance'),
				'type'              => 'select2_from_array',
				'options'           => [
					200 => '200',
					100 => '100',
					50  => '50',
					25  => '25',
					20  => '20',
					10  => '10',
					0   => '0',
				],
				'hint'              => trans('admin.Default search radius distance'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'  => 'separator_3',
				'type'  => 'custom_html',
				'value' => '<div style="clear: both;"></div>',
			],
			[
				'name'              => 'search_distance_max',
				'label'             => trans('admin.Max Search Distance'),
				'type'              => 'select2_from_array',
				'options'           => [
					1000 => '1000',
					900  => '900',
					800  => '800',
					700  => '700',
					600  => '600',
					500  => '500',
					400  => '400',
					300  => '300',
					200  => '200',
					100  => '100',
					50   => '50',
					0    => '0',
				],
				'hint'              => trans('admin.Max search radius distance'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
			[
				'name'              => 'search_distance_interval',
				'label'             => trans('admin.Distance Interval'),
				'type'              => 'select2_from_array',
				'options'           => [
					250 => '250',
					200 => '200',
					100 => '100',
					50  => '50',
					25  => '25',
					20  => '20',
					10  => '10',
					5   => '5',
				],
				'hint'              => trans('admin.The interval between filter distances'),
				'wrapperAttributes' => [
					'class' => 'col-md-6',
				],
			],
		];
		
		return $fields;
	}
	
	/**
	 * @return array
	 */
	private static function distanceCalculationFormula()
	{
		$array = [
			'haversine'  => trans('admin.haversine_formula'),
			'orthodromy' => trans('admin.orthodromy_formula'),
		];
		if (DBTool::isMySqlMinVersion('5.7.6') && !DBTool::isMariaDB()) {
			$array['ST_Distance_Sphere'] = trans('admin.mysql_spherical_calculation');
		}
		
		return $array;
	}
}
