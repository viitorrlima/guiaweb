<?php
if ( ! function_exists( 'retailsy_setup' ) ) :
function retailsy_setup() {

// Root path/URI.
define( 'RETAILSY_PARENT_DIR', get_template_directory() );
define( 'RETAILSY_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'RETAILSY_PARENT_INC_DIR', RETAILSY_PARENT_DIR . '/inc');
define( 'RETAILSY_PARENT_INC_URI', RETAILSY_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'retailsy' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'retailsy' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	
	add_theme_support('custom-logo');
	
	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
		add_theme_support( 'align-wide' );
	
	// remove_theme_support( 'widgets-block-editor' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', retailsy_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'retailsy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'retailsy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function retailsy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'retailsy_content_width', 1170 );
}
add_action( 'after_setup_theme', 'retailsy_content_width', 0 );


/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Dynamic Style
 */
require_once get_template_directory() . '/inc/dynamic_style.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';
require_once get_template_directory() . '/inc/getting-start.php';

/**
 * Customizer additions.
 */
 require_once get_template_directory() . '/inc/retailsy-customizer.php';

/**
 * Customizer additions.
 */
 require get_template_directory() . '/inc/customizer/customizer-repeater/functions.php';
 
 /* Get Product parent category Start */
function retailsy_has_Children($cat_id)
{
    $children = get_terms(
        'product_cat',
        array( 'parent' => $cat_id, 'hide_empty' => false )
    );
    if ($children){
        return true;
    }
    return false;
}
/* Get Product parent category END */