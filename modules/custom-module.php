<?php
    /**
     * FIXED: Morphing search
     */
	function overrideMorphing_Search_Plugin() {
		wp_dequeue_script( 'morphing-search' );
		wp_dequeue_style( 'morphing-search' );
		wp_enqueue_style( 'morphing-search', get_template_directory_uri() . '/assets/css/morphing-search/full-screen-morphing-search.css', array(), false);
		wp_enqueue_script( 'morphing-search', get_template_directory_uri() . '/assets/js/morphing-search/full-screen-morphing-search.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-autocomplete' ), '1.0', true );
	}
    add_action( 'wp_print_scripts', 'overrideMorphing_Search_Plugin' );