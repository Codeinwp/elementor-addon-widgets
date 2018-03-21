<?php

class Elementor_Addon_Widgets {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	/**
	 * Returns an instance of this class.
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new Elementor_Addon_Widgets();
		}

		return self::$instance;
	}

	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'elementor-addon-widgets' );
	}

	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	private function __construct() {
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'init', array( $this, 'load_template_directory_library' ) );
		add_action( 'init', array( $this, 'load_content_forms' ) );
		add_filter( 'elementor_extra_widgets_category_args', array( $this, 'filter_category_args' ) );
		add_filter( 'content_forms_category_args', array( $this, 'filter_category_args' ) );
		add_filter( 'template_directory_templates_list', array( $this, 'filter_templates_preview' ) );

		// load library
		$this->load_composer_library();
	}

	/**
	 * Adjust the modules category name
	 *
	 * @param $args
	 *
	 * @return array
	 */
	public function filter_category_args( $args ) {
		return array(
			'slug'  => 'eaw-elementor-widgets',
			'title' => __( 'EAW Widgets', 'elementor-addon-widgets' ),
			'icon'  => 'fa fa-plug',
		);
	}

	/**
	 * Filter Template Previews
	 */
	public function filter_templates_preview( $templates ) {
		$placeholders = array(
			'mocha-elementor2' => array(
				'title'       => __( 'Mocha - Landing Page', 'textdomain' ),
				'description' => __( 'An elegant and modern template for cafes and pubs, where you can display your menu in a mouth-watering way. Call to action, blog posts, attractive images, tabbed menus, and a catchy design will help you convince more people to stop by.', 'textdomain' ),
				'demo_url'    => 'https://demo.themeisle.com/hestia-pro-demo-content/mocha-elementor/',
				'screenshot'  => esc_url( 'https://raw.githubusercontent.com/Codeinwp/obfx-templates/master/mocha-elementor/screenshot.png' ),
				'has_badge'   => __('Pro', 'textdomain'),
			),
			'mocha-elementor3' => array(
				'title'       => __( 'Mocha - Landing Page', 'textdomain' ),
				'description' => __( 'An elegant and modern template for cafes and pubs, where you can display your menu in a mouth-watering way. Call to action, blog posts, attractive images, tabbed menus, and a catchy design will help you convince more people to stop by.', 'textdomain' ),
				'demo_url'    => 'https://demo.themeisle.com/hestia-pro-demo-content/mocha-elementor/',
				'screenshot'  => esc_url( 'https://raw.githubusercontent.com/Codeinwp/obfx-templates/master/mocha-elementor/screenshot.png' ),
				'has_badge'   => __('Pro', 'textdomain'),

			),
			'mocha-elementor4' => array(
				'title'       => __( 'Mocha - Landing Page', 'textdomain' ),
				'description' => __( 'An elegant and modern template for cafes and pubs, where you can display your menu in a mouth-watering way. Call to action, blog posts, attractive images, tabbed menus, and a catchy design will help you convince more people to stop by.', 'textdomain' ),
				'demo_url'    => 'https://demo.themeisle.com/hestia-pro-demo-content/mocha-elementor/',
				'screenshot'  => esc_url( 'https://raw.githubusercontent.com/Codeinwp/obfx-templates/master/mocha-elementor/screenshot.png' ),
				'has_badge'   => __('Pro', 'textdomain'),

			),
			'mocha-elementor5' => array(
				'title'       => __( 'Mocha - Landing Page', 'textdomain' ),
				'description' => __( 'An elegant and modern template for cafes and pubs, where you can display your menu in a mouth-watering way. Call to action, blog posts, attractive images, tabbed menus, and a catchy design will help you convince more people to stop by.', 'textdomain' ),
				'demo_url'    => 'https://demo.themeisle.com/hestia-pro-demo-content/mocha-elementor/',
				'screenshot'  => esc_url( 'https://raw.githubusercontent.com/Codeinwp/obfx-templates/master/mocha-elementor/screenshot.png' ),
				'has_badge'   => __('Pro', 'textdomain'),
			),
		);
			$filtered_templates = array_merge( $templates, $placeholders );
			return $filtered_templates;
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
	 * Call the Templates Directory library
	 */
	public function load_template_directory_library() {
		if ( class_exists( '\ThemeIsle\PageTemplatesDirectory' ) ) {
			\ThemeIsle\PageTemplatesDirectory::instance();
		}
	}

	/**
	 * If the content-forms library is available we should make the forms available for elementor
	 */
	public function load_content_forms() {
		if ( class_exists( '\ThemeIsle\ContentForms\ContactForm' ) ) {
			\ThemeIsle\ContentForms\ContactForm::instance();
			\ThemeIsle\ContentForms\NewsletterForm::instance();
			\ThemeIsle\ContentForms\RegistrationForm::instance();
		}
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
