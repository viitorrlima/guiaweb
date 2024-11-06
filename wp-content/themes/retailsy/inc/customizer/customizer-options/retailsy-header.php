<?php
function retailsy_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'retailsy'),
		) 
	);
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','retailsy'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	// My Account
	$wp_customize->add_setting(
		'hdr_nav_account'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_account',
		array(
			'type' => 'hidden',
			'label' => __('My Account','retailsy'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_account' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_account', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'retailsy' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Cart
	$wp_customize->add_setting(
		'hdr_nav_cart'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_cart',
		array(
			'type' => 'hidden',
			'label' => __('Cart','retailsy'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_cart' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_checkbox',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cart', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'retailsy' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Cart Title
	$wp_customize->add_setting( 
		'hdr_cart_ttl' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_html',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control(
	'hdr_cart_ttl', 
		array(
			'label'	      => esc_html__( 'Cart Title', 'retailsy' ),
			'section'     => 'header_navigation',
			'type'        => 'text'
		) 
	);	
	
	
	// Contact
	$wp_customize->add_setting(
		'hdr_nav_contact'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_contact',
		array(
			'type' => 'hidden',
			'label' => __('Contact','retailsy'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_hdr_contact' , 
			array(
			'default' => '1',	
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_checkbox',
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_hdr_contact', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'retailsy' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Icon
	$wp_customize->add_setting( 
		'hdr_contact_icon' , 
			array(
			'default' => 'fa-headphones',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_html',
			'priority' => 11,
		) 
	);
	
	$wp_customize->add_control(
	'hdr_contact_icon', 
		array(
			'label'	      => esc_html__( 'Icon', 'retailsy' ),
			'section'     => 'header_navigation',
			'type'        => 'text'
		) 
	);	
	
	// Title
	$wp_customize->add_setting( 
		'hdr_contact_ttl' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_html',
			'priority' => 11,
		) 
	);
	
	$wp_customize->add_control(
	'hdr_contact_ttl', 
		array(
			'label'	      => esc_html__( 'Title', 'retailsy' ),
			'section'     => 'header_navigation',
			'type'        => 'text'
		) 
	);	
	
	//  Link
	$wp_customize->add_setting( 
		'hdr_contact_url' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_url',
			'priority' => 11,
		) 
	);
	
	$wp_customize->add_control(
	'hdr_contact_url', 
		array(
			'label'	      => esc_html__( 'Link', 'retailsy' ),
			'section'     => 'header_navigation',
			'type'        => 'text'
		) 
	);	

	/*=========================================
	Browse Section
	=========================================*/	
	$wp_customize->add_section(
        'header_browse',
        array(
        	'priority'      => 4,
            'title' 		=> __('Browse Section','retailsy'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Browse Category
	$wp_customize->add_setting(
		'browse_cat_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'browse_cat_head',
		array(
			'type' => 'hidden',
			'label' => __('Browse Category','retailsy'),
			'section' => 'header_browse',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting( 
		'hs_browse_cat' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_browse_cat', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'retailsy' ),
			'section'     => 'header_browse',
			'type'        => 'checkbox'
		) 
	);
	
	// Title
	$wp_customize->add_setting( 
		'browse_cat_ttl' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_html',
			'priority' => 3,
		) 
	);
	
	$wp_customize->add_control(
	'browse_cat_ttl', 
		array(
			'label'	      => esc_html__( 'Title', 'retailsy' ),
			'section'     => 'header_browse',
			'type'        => 'text'
		) 
	);	
	
	
	// Search
	$wp_customize->add_setting(
		'product_search_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'product_search_head',
		array(
			'type' => 'hidden',
			'label' => __('Product Search','retailsy'),
			'section' => 'header_browse',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting( 
		'hs_product_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_checkbox',
			'priority' => 5,
		) 
	);
	
	$wp_customize->add_control(
	'hs_product_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'retailsy' ),
			'section'     => 'header_browse',
			'type'        => 'checkbox'
		) 
	);
	
	
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','retailsy'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','retailsy'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'retailsy' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'retailsy_header_settings' );