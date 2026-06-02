<?php
/**
 * Admin area integration.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers admin menu, assets, and settings UI.
 */
class ZRQCB_Admin {

	/**
	 * Settings page slug.
	 */
	const PAGE_SLUG = 'zubairray-quick-cta-bar';

	/**
	 * Hook admin functionality.
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'register_menu' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( ZRQCB_PLUGIN_FILE ), array( __CLASS__, 'plugin_action_links' ) );
	}

	/**
	 * Add settings link on the plugins page.
	 *
	 * @param array<int, string> $links Plugin action links.
	 * @return array<int, string>
	 */
	public static function plugin_action_links( $links ) {
		$settings_link = sprintf(
			'<a href="%1$s">%2$s</a>',
			esc_url( admin_url( 'admin.php?page=' . self::PAGE_SLUG ) ),
			esc_html__( 'Settings', 'zubairray-quick-cta-bar' )
		);

		array_unshift( $links, $settings_link );

		return $links;
	}

	/**
	 * Add top-level admin menu.
	 */
	public static function register_menu() {
		add_menu_page(
			__( 'ZubairRay Quick CTA Bar', 'zubairray-quick-cta-bar' ),
			__( 'Quick CTA Bar', 'zubairray-quick-cta-bar' ),
			'manage_options',
			self::PAGE_SLUG,
			array( __CLASS__, 'render_settings_page' ),
			'dashicons-megaphone',
			58
		);
	}

	/**
	 * Enqueue admin scripts only on this plugin's settings screen.
	 *
	 * @param string $hook_suffix Admin page hook suffix.
	 */
	public static function enqueue_assets( $hook_suffix ) {
		if ( 'toplevel_page_' . self::PAGE_SLUG !== $hook_suffix ) {
			return;
		}

		$admin_css = ZRQCB_PLUGIN_DIR . 'assets/css/zrqcb-admin.css';
		$admin_js  = ZRQCB_PLUGIN_DIR . 'assets/js/zrqcb-admin.js';

		wp_enqueue_style(
			'zubairray-quick-cta-bar-admin',
			ZRQCB_PLUGIN_URL . 'assets/css/zrqcb-admin.css',
			array(),
			file_exists( $admin_css ) ? (string) filemtime( $admin_css ) : ZRQCB_VERSION
		);

		wp_enqueue_script(
			'zubairray-quick-cta-bar-admin',
			ZRQCB_PLUGIN_URL . 'assets/js/zrqcb-admin.js',
			array(),
			file_exists( $admin_js ) ? (string) filemtime( $admin_js ) : ZRQCB_VERSION,
			true
		);
	}

	/**
	 * Render settings page.
	 */
	public static function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$settings  = zrqcb_get_settings();
		$cta_types = zrqcb_get_cta_types();

		require ZRQCB_PLUGIN_DIR . 'admin/views/settings-page.php';
	}
}
