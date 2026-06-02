<?php
/**
 * Main plugin bootstrap.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Loads components and registers hooks.
 */
final class ZRQCB_Plugin {

	/**
	 * Plugin instance.
	 *
	 * @var ZRQCB_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Get plugin instance.
	 *
	 * @return ZRQCB_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->load_dependencies();
		$this->init_components();
	}

	/**
	 * Require class files.
	 */
	private function load_dependencies() {
		require_once ZRQCB_PLUGIN_DIR . 'includes/options.php';
		require_once ZRQCB_PLUGIN_DIR . 'includes/helpers.php';
		require_once ZRQCB_PLUGIN_DIR . 'includes/class-settings.php';
		require_once ZRQCB_PLUGIN_DIR . 'includes/class-admin.php';
		require_once ZRQCB_PLUGIN_DIR . 'includes/class-frontend.php';
	}

	/**
	 * Initialize plugin components.
	 */
	private function init_components() {
		ZRQCB_Settings::init();
		ZRQCB_Admin::init();
		ZRQCB_Frontend::init();
	}
}
