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
	

	add_filter('use_block_editor_for_post','__return_false');


	/**
     * FIXED: Dropdown popup in TinyMCE - Classic editor
     */
	function fixed_dp_paragraph_tinymce() {
		echo "<script type='text/javascript'>
	
		setTimeout(function(){
            jQuery(window).scroll(function() {
				styleAttr = jQuery('.mce-top-part .mce-toolbar-grp').attr('style');
				listAttr = styleAttr.trim().split(' ');
				if(listAttr[1] == 'fixed;') {
					jQuery('.mce-floatpanel').css('position','fixed');
				} else {
					jQuery('.mce-floatpanel').css('position','absolute');
				}
			});
        },5000)
	
		</script>";
	}
	add_action('admin_footer', 'fixed_dp_paragraph_tinymce');
	