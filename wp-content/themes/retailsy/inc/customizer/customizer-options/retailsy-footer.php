<?php
function retailsy_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'retailsy'),
		) 
	);
	
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','retailsy'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );

	$retailsy_copyright = esc_html__('Copyright &copy; [current_year] | Powered by [theme_author]', 'retailsy' );
	
	//  Title // 
	$wp_customize->add_setting(
    	'footer_first_custom',
    	array(
	        'default'			=> $retailsy_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'footer_first_custom',
		array(
		    'label'   => __('Copyright','retailsy'),
		    'section' => 'footer_copy_Section',
			'type'           => 'textarea',
		)  
	);
	
	
}
add_action( 'customize_register', 'retailsy_footer' );