<?php
 /**
 * Enqueue scripts and styles.
 */
function retailsy_scripts() {
	// Styles	
	wp_enqueue_style('tiny-slider',get_template_directory_uri().'/assets/css/tiny-slider.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');
	
	wp_enqueue_style('owl-theme-default',get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('retailsy-animations',get_template_directory_uri().'/assets/css/animations.css');
	
	wp_enqueue_style('retailsy-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('retailsy-menu', get_template_directory_uri() . '/assets/css/menu.css');

	wp_enqueue_style('retailsy-widgets',get_template_directory_uri().'/assets/css/widget.css');

	wp_enqueue_style('retailsy-main', get_template_directory_uri() . '/assets/css/main.css');
	
	wp_enqueue_style('retailsy-theme', get_template_directory_uri() . '/assets/css/theme.css');
	
	wp_enqueue_style('retailsy-default', get_template_directory_uri() . '/assets/css/default.css');
	
	wp_enqueue_style('retailsy-media-query', get_template_directory_uri() . '/assets/css/responsive.css');
	
	wp_enqueue_style( 'retailsy-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/assets/js/tiny-slider.js', array('jquery'), true);
	
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), true);
	
	wp_enqueue_script('owlcarousel2-filter', get_template_directory_uri() . '/assets/js/owlcarousel2-filter.min.js', array('jquery'), true);
	
	wp_enqueue_script('retailsy-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
	  

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'retailsy_scripts' );