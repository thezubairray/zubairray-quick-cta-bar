<?php
/**
 * Settings registration and sanitization.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers plugin settings with the Options API.
 */
class ZRQCB_Settings {

	/**
	 * Hook settings registration.
	 */
	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'register' ) );
	}

	/**
	 * Register the main settings option.
	 */
	public static function register() {
		register_setting(
			'zrqcb_settings',
			ZRQCB_OPTION_KEY,
			array(
				'type'              => 'array',
				'sanitize_callback' => array( __CLASS__, 'sanitize_settings' ),
				'default'           => zrqcb_get_default_settings(),
			)
		);
	}

	/**
	 * Sanitize settings.
	 *
	 * @param mixed $input Raw settings.
	 * @return array<string, mixed>
	 */
	public static function sanitize_settings( $input ) {
		$input    = is_array( $input ) ? $input : array();
		$defaults = zrqcb_get_default_settings();
		$output   = array();

		$output['enabled']           = zrqcb_bool_to_string( $input['enabled'] ?? '' );
		$position                    = isset( $input['position'] ) ? sanitize_key( $input['position'] ) : '';
		$output['position']          = in_array( $position, array( 'top', 'bottom' ), true ) ? $position : $defaults['position'];
		$output['message_text']      = sanitize_text_field( $input['message_text'] ?? $defaults['message_text'] );
		$output['button_text']       = sanitize_text_field( $input['button_text'] ?? $defaults['button_text'] );
		$output['cta_type']          = array_key_exists( $input['cta_type'] ?? '', zrqcb_get_cta_types() ) ? $input['cta_type'] : $defaults['cta_type'];
		$output['cta_destination']   = self::sanitize_destination( $output['cta_type'], $input['cta_destination'] ?? '' );
		$output['background_color']  = zrqcb_sanitize_hex_color( $input['background_color'] ?? '', $defaults['background_color'] );
		$output['text_color']        = zrqcb_sanitize_hex_color( $input['text_color'] ?? '', $defaults['text_color'] );
		$output['button_color']      = zrqcb_sanitize_hex_color( $input['button_color'] ?? '', $defaults['button_color'] );
		$output['button_text_color'] = zrqcb_sanitize_hex_color( $input['button_text_color'] ?? '', $defaults['button_text_color'] );
		$output['bar_height']        = zrqcb_clamp_int( $input['bar_height'] ?? '', 32, 160, $defaults['bar_height'] );
		$output['bar_padding']       = zrqcb_clamp_int( $input['bar_padding'] ?? '', 0, 48, $defaults['bar_padding'] );
		$output['button_radius']     = zrqcb_clamp_int( $input['button_radius'] ?? '', 0, 40, $defaults['button_radius'] );
		$output['show_desktop']      = zrqcb_bool_to_string( $input['show_desktop'] ?? '' );
		$output['show_mobile']       = zrqcb_bool_to_string( $input['show_mobile'] ?? '' );
		$output['show_logged_in']    = zrqcb_bool_to_string( $input['show_logged_in'] ?? '' );
		$output['show_logged_out']   = zrqcb_bool_to_string( $input['show_logged_out'] ?? '' );
		$output['mobile_only']       = zrqcb_bool_to_string( $input['mobile_only'] ?? '' );
		$output['desktop_only']      = zrqcb_bool_to_string( $input['desktop_only'] ?? '' );
		$output['open_new_tab']      = zrqcb_bool_to_string( $input['open_new_tab'] ?? '' );
		$output['show_close']        = zrqcb_bool_to_string( $input['show_close'] ?? '' );
		$output['remember_closed']   = zrqcb_bool_to_string( $input['remember_closed'] ?? '' );
		$output['powered_by']        = zrqcb_bool_to_string( $input['powered_by'] ?? '' );

		if ( '1' === $output['mobile_only'] && '1' === $output['desktop_only'] ) {
			$output['mobile_only']  = '0';
			$output['desktop_only'] = '0';
		}

		return $output;
	}

	/**
	 * Sanitize the CTA destination for a selected type.
	 *
	 * @param string $type CTA type.
	 * @param mixed  $destination Raw destination.
	 * @return string
	 */
	private static function sanitize_destination( $type, $destination ) {
		$destination = trim( sanitize_text_field( (string) $destination ) );

		switch ( $type ) {
			case 'phone':
				return preg_replace( '/[^0-9+() .-]/', '', $destination );

			case 'whatsapp':
				return preg_replace( '/[^0-9+() .-]/', '', $destination );

			case 'email':
				return sanitize_email( $destination );

			case 'custom_url':
				return esc_url_raw( $destination );
		}

		return '';
	}
}
