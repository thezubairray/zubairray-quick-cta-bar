<?php
/**
 * Uninstall ZubairRay Quick CTA Bar.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

require_once dirname( __FILE__ ) . '/includes/options.php';

delete_option( ZRQCB_OPTION_KEY );
