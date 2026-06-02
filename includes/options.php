<?php
/**
 * Option defaults and keys.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main option key.
 */
const ZRQCB_OPTION_KEY = 'zrqcb_settings';

/**
 * Get default plugin settings.
 *
 * @return array<string, mixed>
 */
function zrqcb_get_default_settings() {
	return array(
		'enabled'               => '0',
		'position'              => 'bottom',
		'message_text'          => __( 'Need help? Contact us today.', 'zubairray-quick-cta-bar' ),
		'button_text'           => __( 'Contact Us', 'zubairray-quick-cta-bar' ),
		'cta_type'              => 'custom_url',
		'cta_destination'       => '',
		'background_color'      => '#111827',
		'text_color'            => '#ffffff',
		'button_color'          => '#16a34a',
		'button_text_color'     => '#ffffff',
		'bar_height'            => 56,
		'bar_padding'           => 12,
		'button_radius'         => 6,
		'show_desktop'          => '1',
		'show_mobile'           => '1',
		'show_logged_in'        => '1',
		'show_logged_out'       => '1',
		'mobile_only'           => '0',
		'desktop_only'          => '0',
		'open_new_tab'          => '0',
		'show_close'            => '1',
		'remember_closed'       => '1',
		'powered_by'            => '0',
	);
}

/**
 * Get saved settings merged with defaults.
 *
 * @return array<string, mixed>
 */
function zrqcb_get_settings() {
	$saved = get_option( ZRQCB_OPTION_KEY, array() );

	if ( ! is_array( $saved ) ) {
		$saved = array();
	}

	return wp_parse_args( $saved, zrqcb_get_default_settings() );
}

/**
 * Available CTA types.
 *
 * @return array<string, string>
 */
function zrqcb_get_cta_types() {
	return array(
		'phone'      => __( 'Phone', 'zubairray-quick-cta-bar' ),
		'whatsapp'   => __( 'WhatsApp', 'zubairray-quick-cta-bar' ),
		'email'      => __( 'Email', 'zubairray-quick-cta-bar' ),
		'custom_url' => __( 'Custom URL', 'zubairray-quick-cta-bar' ),
	);
}
