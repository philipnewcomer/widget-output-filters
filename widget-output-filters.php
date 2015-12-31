<?php
/*
Plugin Name: Widget Output Filters
Plugin URI:  http://philipnewcomer.net/wordpress-plugins/widget-output-filters/
Description: Enables developers to filter the output of WordPress widgets.
Author:      Philip Newcomer
Author URI:  http://philipnewcomer.net
Version:     1.0
License:     GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright (C) 2014  Philip Newcomer
Based on code contained in the Widget Logic plugin by Alan Trewartha

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


/**
 * Replaces the widget's display callback with the Dynamic Sidebar Params display callback, storing the original callback for use later.
 *
 * The $sidebar_params array is not modified; it is only used to get the current widget ID.
 *
 * @param  array $sidebar_params The sidebar parameters
 * @return array                 The sidebar parameters
 */
function widget_output_filters_dynamic_sidebar_params( $sidebar_params ) {

	if ( is_admin() ) {
		return $sidebar_params;
	}

	global $wp_registered_widgets;
	$widget_id = $sidebar_params[0]['widget_id'];

	$wp_registered_widgets[ $widget_id ]['original_callback'] = $wp_registered_widgets[ $widget_id ]['callback'];
	$wp_registered_widgets[ $widget_id ]['callback'] = 'widget_output_filters_display_widget';

	return $sidebar_params;

}
add_filter( 'dynamic_sidebar_params', 'widget_output_filters_dynamic_sidebar_params', 9 ); // Priority of 9 to run before the Widget Logic plugin


/**
 * Callback function to display the widget's original callback function output, with filtering.
 */
function widget_output_filters_display_widget() {

	global $wp_registered_widgets;
	$original_callback_params = func_get_args();
	$widget_id = $original_callback_params[0]['widget_id'];

	$original_callback = $wp_registered_widgets[ $widget_id ]['original_callback'];
	$wp_registered_widgets[ $widget_id ]['callback'] = $original_callback;

	$widget_id_base = $wp_registered_widgets[ $widget_id ]['callback'][0]->id_base;

	if ( is_callable( $original_callback ) ) {

		ob_start();
		call_user_func_array( $original_callback, $original_callback_params );
		$widget_output = ob_get_clean();

		echo apply_filters( 'widget_output', $widget_output, $widget_id_base, $widget_id );

	}

}
