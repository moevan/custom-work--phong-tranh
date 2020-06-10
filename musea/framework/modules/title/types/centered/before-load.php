<?php

if ( ! function_exists( 'musea_elated_set_hide_dep_options_title_centered' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this title type is selected
	 */
	function musea_elated_set_hide_dep_options_title_centered( $hide_dep_options ) {
		$hide_dep_options[] = 'centered';
		
		return $hide_dep_options;
	}
	
	// hide breadcrumbs meta
	add_filter( 'musea_elated_filter_breadcrumbs_title_hide_meta_boxes', 'musea_elated_set_hide_dep_options_title_centered' );
}