<?php
function retailsy_blog2_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
$wp_customize->add_panel(
		'retailsy_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'retailsy' ),
		)
	);
	/*=========================================
	Blog Section
	=========================================*/
	$wp_customize->add_section(
		'blog2_setting', array(
			'title' => esc_html__( 'Blog Section', 'retailsy' ),
			'priority' => 8,
			'panel' => 'retailsy_frontpage_sections',
		)
	);
	
	/*=========================================
	Header
	=========================================*/
	$wp_customize->add_setting(
		'blog2_header'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'blog2_header',
		array(
			'type' => 'hidden',
			'label' => __('Header','retailsy'),
			'section' => 'blog2_setting',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'blog2_ttl',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'blog2_ttl',
		array(
		    'label'   => __('Title','retailsy'),
		    'section' => 'blog2_setting',
			'type'           => 'text',
		)  
	);
	
	/*=========================================
	Content
	=========================================*/
	$wp_customize->add_setting(
		'blog2_content'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'blog2_content',
		array(
			'type' => 'hidden',
			'label' => __('Content','retailsy'),
			'section' => 'blog2_setting',
		)
	);
	
	// No. of Products Display
	if ( class_exists( 'Ecommerce_Comp_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'blog2_num',
			array(
				'default' => '6',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'ecommerce_comp_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Ecommerce_Comp_Customizer_Range_Control( $wp_customize, 'blog2_num', 
			array(
				'label'      => __( 'No of Blog Display', 'retailsy' ),
				'section'  => 'blog2_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'    => 1,
							'max'    => 500,
							'step'   => 1,
							'default_value' => 6,
						),
					),
			) ) 
		);
	}

}

add_action( 'customize_register', 'retailsy_blog2_setting' );

// selective refresh
function retailsy_blog2_section_partials( $wp_customize ){
	
	// blog2_ttl
	$wp_customize->selective_refresh->add_partial( 'blog2_ttl', array(
		'selector'            => '.blog-home2 .section-title-name',
		'settings'            => 'blog2_ttl',
		'render_callback'  => 'retailsy_blog2_ttl_render_callback',
	) );
	
	}

add_action( 'customize_register', 'retailsy_blog2_section_partials' );

// blog2_ttl
function retailsy_blog2_ttl_render_callback() {
	return get_theme_mod( 'blog2_ttl' );
}