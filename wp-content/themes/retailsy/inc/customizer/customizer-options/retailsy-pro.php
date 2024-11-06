<?php
function retailsy_upsale_setting( $wp_customize ) {
	
	$wp_customize->add_section(
        'retailsy_upsale',
        array(
            'title' 		=> __('Get More Features in Retailsy Pro','retailsy'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	 Buttons
	=========================================*/
	
	class Retailsy_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'retailsy_upsale';

	   function render_content() {
		?>
			<div class="upsale_info">
				<ul>
					<li><a href="https://preview.sellerthemes.com/pro/retailsy/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-desktop"></i><?php _e( 'Pro Demo','retailsy' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.com/retailsy-premium/" class="btn-primary" target="_blank"><i class="dashicons dashicons-cart"></i><?php _e( 'Purchase Now','retailsy' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.ticksy.com/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-sos"></i><?php _e( 'Ask for Support','retailsy' ); ?> </a></li>
					
					<li><a href="https://wordpress.org/support/theme/retailsy/reviews/#new-post" class="btn-green" target="_blank"><i class="dashicons dashicons-heart"></i><?php _e( 'Give us Rating','retailsy' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting(
		'retailsy_upsale_btns',
		array(
		   'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
		)	
	);
	
	$wp_customize->add_control( new Retailsy_Button_Customize_Control( $wp_customize, 'retailsy_upsale_btns', array(
		'section' => 'retailsy_upsale',
    ))
);
}
add_action( 'customize_register', 'retailsy_upsale_setting',999 );