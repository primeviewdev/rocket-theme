<?php

/**
 * Rocket CSS : PUT CSS HERE
 */
function rocketStyle(){

		//Font awesome
		if(get_option('font_awesome') == "true") { 
			wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' );
		}	

		//Owl
		if(get_option('owl') == "true") { 		
			wp_enqueue_style( 'owl-css', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css');
			wp_enqueue_style( 'owl-transition-min', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css');	
			wp_enqueue_style( 'owl-theme-min', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css');	
		}	
		
		//Pace https://cdnjs.com/libraries/pace
		// wp_enqueue_style( 'pace-css', 'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-flash.min.css');
		
		//Rocket CSS
		wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');	
		wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css');
		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css');
		wp_enqueue_style( 'moby-css', get_template_directory_uri() . '/assets/css/moby/moby.min.css');
		wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/assets/css/hamburger/hamburgers.min.css');
		
		wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,700'); //font-family: 'Open Sans', sans-serif;
}

function importAdminAssets(){
	wp_enqueue_style('backend-css-styles', get_template_directory_uri().'/assets/css/backend.css');
	// wp_enqueue_script( 'backend-js-script',  get_template_directory_uri().'/assets/js/backend.js',array('jquery'));
	
	/**
	 * Theme Options
	 */
	add_action( 'admin_menu', 'rocketThemeOptions' );
	add_action( 'admin_init', 'rocketThemeSettings');
	
	/** 
	 * Admin Favicon
	 */
	 add_action('admin_head', 'adminFavicon');
	 
	/**
	 * Theme Features
	 */
	 add_theme_support( 'post-thumbnails' ); 
}


/**
 * Rocket JS : PUT JS HERE
 */
function rocketScript(){
	//JS
	if(get_option('scroll_reveal') == "true") { 
		wp_enqueue_script( 'scroll-reveal',  '//cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/3.1.4/scrollreveal.min.js',array('jquery'));
	}
	if(get_option('owl') == "true") { 
		wp_enqueue_script( 'owl-js', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js',array('jquery'));
	}	
	if(get_option('parallax') == "true") { 
		wp_enqueue_script( 'parallax', '//cdnjs.cloudflare.com/ajax/libs/jquery-parallax/1.1.3/jquery-parallax.js',array('jquery'));
	}

	if(get_option('dark_mode') == "true") {
		wp_enqueue_script( 'rocket-dark-mode', '//cdn.jsdelivr.net/npm/darkmode-js@1.5.0/lib/darkmode-js.min.js',array('jquery'));
		wp_enqueue_script( 'rocket-dark-mode-custom', get_template_directory_uri() . '/assets/js/dark-mode-custom.js',array('jquery'));
	}
	
	//Pace
	// wp_enqueue_script( 'pace-js', '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',array('jquery'));
	
	//Load core file
	wp_enqueue_script( 'rocket-tether-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'));	
	wp_enqueue_script( 'rocket-bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'));	
	wp_enqueue_script( 'rocket-script', get_template_directory_uri() . '/assets/js/script.js',array('jquery'));
	wp_enqueue_script( 'moby-js', get_template_directory_uri() . '/assets/js/moby/moby.min.js',array('jquery'));

	//Wordpress AJAX
	wp_localize_script( 'wp_ajax', 'wp_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	wp_enqueue_script( 'wp_ajax' );
	
	//Transfer Scripts to footer
	// remove_action('wp_head', 'wp_print_scripts'); 
    // remove_action('wp_head', 'wp_print_head_scripts', 9); 
    // remove_action('wp_head', 'wp_enqueue_scripts', 1);

    // add_action('wp_footer', 'wp_print_scripts', 5);
    // add_action('wp_footer', 'wp_enqueue_scripts', 5);
    // add_action('wp_footer', 'wp_print_head_scripts', 5); 
}


function wsds_detect_enqueued_scripts() {
	global $wp_scripts;
	foreach( $wp_scripts->queue as $handle ) :
		echo $handle . ' | ';
	endforeach;
}

function wsds_defer_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'main-script'
	);
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script type="text/javascript" src="' . $src . '" defer="defer"></script>' . "\n";
    }
    return $tag;
}

/**
 * Remove script version
 */
function removeScriptVersion( $src ){
	$parts = explode( '?ver', $src ); 
	return $parts[0];
}

/**
 * Async All JS
 */
function asyncJS ( $url ) {
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return "$url'  async='async"; 
}

function wsds_async_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to async
	$async_scripts = array( 
		'contact-form-7',
		'bootstrap-js',
		'main-tether-js',
		'main-bootstrap-js',
		'parallax',
		'owl-js',
	);
    if ( in_array( $handle, $async_scripts ) ) {
        return '<script type="text/javascript" src="' . $src . '" async="async"></script>' . "\n";
    }
    return $tag;
}

