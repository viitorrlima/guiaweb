<?php
/**
 * Retailsy Theme Customizer.
 *
 * @package Retailsy
 */

 if ( ! class_exists( 'Retailsy_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Retailsy_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			 add_action( 'admin_enqueue_scripts',array( $this, 'retailsy_admin_script' ) );
			add_action( 'customize_preview_init',                  array( $this, 'retailsy_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts',array( $this, 'retailsy_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'retailsy_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'retailsy_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function retailsy_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';
			
			/**
			 * Helper files
			 */
			require RETAILSY_PARENT_INC_DIR . '/customizer/sanitization.php';
		}

		/**
		 * Admin Script
		 */
		function retailsy_admin_script() {
			wp_enqueue_style('retailsy-admin-style', RETAILSY_PARENT_INC_URI . '/customizer/assets/css/admin.css');
			wp_enqueue_script( 'retailsy-admin-script', RETAILSY_PARENT_INC_URI . '/customizer/assets/js/admin-script.js', array( 'jquery' ), '', true );
			wp_localize_script( 'retailsy-admin-script', 'retailsy_ajax_object',
				array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
			);
		}
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function retailsy_customize_preview_js() {
			wp_enqueue_script( 'retailsy-customizer', RETAILSY_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}

		function retailsy_customizer_script() {
			 wp_enqueue_script( 'retailsy-customizer-section', RETAILSY_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}
		
		// Include customizer customizer settings.
			
		function retailsy_customizer_settings() {
			require RETAILSY_PARENT_INC_DIR . '/customizer/customizer-options/retailsy-header.php';
			require RETAILSY_PARENT_INC_DIR . '/customizer/customizer-options/retailsy-blog.php';
			require RETAILSY_PARENT_INC_DIR . '/customizer/customizer-options/retailsy-footer.php';
		    require RETAILSY_PARENT_INC_DIR . '/customizer/customizer-options/retailsy-general.php';
			require RETAILSY_PARENT_INC_DIR . '/customizer/customizer-options/retailsy_recommended_plugin.php';
			require RETAILSY_PARENT_INC_DIR . '/customizer/customizer-options/retailsy-pro.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Retailsy_Customizer::get_instance();