<?php

class Elementor_Addon_Widgets {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'elementor-addon-widgets' );
	}

	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	private function __construct() {
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		// load library
		$this->load_composer_library();
	}

	/**
	 * Load the Composer library with the base feature
	 */
	public function load_composer_library() {
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( '\ThemeIsle\ElementorExtraWidgets' ) ) {
			\ThemeIsle\ElementorExtraWidgets::instance();
		}
	}

	/**
	 * Returns an instance of this class.
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new Elementor_Addon_Widgets();
		}

		return self::$instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'elementor-addon-widgets' ), '1.0.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'elementor-addon-widgets' ), '1.0.0' );
	}
}

add_action( 'plugins_loaded', array( 'Elementor_Addon_Widgets', 'get_instance' ) );
