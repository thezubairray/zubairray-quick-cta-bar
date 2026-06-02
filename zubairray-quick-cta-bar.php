<?php
/**
 * Plugin Name: ZubairRay Quick CTA Bar
 * Plugin URI: https://zubairray.com/plugins/zubairray-quick-cta-bar/
 * Description: Add a sticky call to action bar to your WordPress website with phone, WhatsApp, email, or custom CTA buttons.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Zubair Ray
 * Author URI: https://zubairray.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: zubairray-quick-cta-bar
 * Domain Path: /languages
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ZRQCB_VERSION', '1.0.0' );
define( 'ZRQCB_PLUGIN_FILE', __FILE__ );
define( 'ZRQCB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ZRQCB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once ZRQCB_PLUGIN_DIR . 'includes/class-plugin.php';

ZRQCB_Plugin::instance();
