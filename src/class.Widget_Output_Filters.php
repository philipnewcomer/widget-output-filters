<?php

/**
 * Class Widget_Output_Filters
 *
 * Allows developers to filter the output of any WordPress widget.
 */
class Widget_Output_Filters {

	/**
	 * Widget_Output_Filters constructor.
	 */
	public function __construct() {
		add_filter( 'dynamic_sidebar_params', array( $this, 'widget_output_filters_dynamic_sidebar_params' ), 9 ); // Priority of 9 to run before the Widget Logic plugin
	}

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
		$wp_registered_widgets[ $widget_id ]['callback'] = array( $this, 'widget_output_filters_display_widget' );

		return $sidebar_params;

	}


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
}
