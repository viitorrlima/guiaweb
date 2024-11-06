<?php
/* Notifications in customizer */
require get_template_directory() . '/inc/customizer/customizer-notify.php';
$retailsy_config_customizer = array(
	'recommended_plugins'       => array(
		'woocommerce' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>WooCommerce</strong> plugin for taking full advantage of all the features this theme has to offer.', 'retailsy')),
		),
		'ecommerce-companion' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>eCommerce Companion</strong> plugin for taking full advantage of all the features this theme has to offer.', 'retailsy')),
		),		
		'classic-widgets' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Classic Widgets</strong> plugin for taking full advantage of all the features this theme has to offer.', 'retailsy')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'retailsy' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'retailsy' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'retailsy' ),
	'activate_button_label'     => esc_html__( 'Activate', 'retailsy' ),
	'retailsy_deactivate_button_label'   => esc_html__( 'Deactivate', 'retailsy' ),
);
Retailsy_Customizer_Notify::init( apply_filters( 'retailsy_customizer_notify_array', $retailsy_config_customizer ) );



class retailsy_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof retailsy_import_dummy_data ) ) {
			self::$instance = new retailsy_import_dummy_data;
			self::$instance->retailsy_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function retailsy_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'retailsy_import_customize_scripts' ), 0 );

	}
	
	

	public function retailsy_import_customize_scripts() {

	wp_enqueue_script( 'retailsy-import-customizer-js', get_template_directory_uri() . '/inc/customizer/assets/js/import-customizer.js', array( 'customize-controls' ) );
	}
}

$retailsy_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
retailsy_import_dummy_data::init( apply_filters( 'retailsy_import_customizer', $retailsy_import_customizers ) );