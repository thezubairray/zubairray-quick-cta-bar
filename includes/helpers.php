<?php
/**
 * Shared helper functions.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Normalize a hex color.
 *
 * @param string $value Raw color.
 * @param string $fallback Fallback color.
 * @return string
 */
function zrqcb_sanitize_hex_color( $value, $fallback = '#111827' ) {
	$color = sanitize_hex_color( $value );

	return $color ? $color : $fallback;
}

/**
 * Clamp an integer value.
 *
 * @param mixed $value Raw value.
 * @param int   $min Minimum.
 * @param int   $max Maximum.
 * @param int   $fallback Fallback.
 * @return int
 */
function zrqcb_clamp_int( $value, $min, $max, $fallback ) {
	$value = is_numeric( $value ) ? absint( $value ) : $fallback;

	return max( $min, min( $max, $value ) );
}

/**
 * Convert a checkbox value to a stored string boolean.
 *
 * @param mixed $value Raw value.
 * @return string
 */
function zrqcb_bool_to_string( $value ) {
	return empty( $value ) ? '0' : '1';
}

/**
 * Build URL for the selected CTA type.
 *
 * @param string $type CTA type.
 * @param string $destination CTA destination.
 * @return string
 */
function zrqcb_build_cta_url( $type, $destination ) {
	$destination = trim( (string) $destination );

	if ( '' === $destination ) {
		return '';
	}

	switch ( $type ) {
		case 'phone':
			$phone = preg_replace( '/[^0-9+]/', '', $destination );
			return $phone ? 'tel:' . $phone : '';

		case 'whatsapp':
			$number = preg_replace( '/[^0-9]/', '', $destination );
			return $number ? 'https://wa.me/' . $number : '';

		case 'email':
			$email = sanitize_email( $destination );
			return is_email( $email ) ? 'mailto:' . $email : '';

		case 'custom_url':
			$url = esc_url_raw( $destination );

			if ( $url && ! wp_parse_url( $url, PHP_URL_SCHEME ) ) {
				$url = esc_url_raw( 'https://' . ltrim( $url, '/' ) );
			}

			return $url;
	}

	return '';
}

/**
 * Should the bar be output for this request?
 *
 * @param array<string, mixed>|null $settings Settings.
 * @return bool
 */
function zrqcb_should_render_bar( $settings = null ) {
	$settings = is_array( $settings ) ? $settings : zrqcb_get_settings();

	if ( '1' !== $settings['enabled'] ) {
		return false;
	}

	if ( is_user_logged_in() && '1' !== $settings['show_logged_in'] ) {
		return false;
	}

	if ( ! is_user_logged_in() && '1' !== $settings['show_logged_out'] ) {
		return false;
	}

	$closed_cookie = filter_input( INPUT_COOKIE, 'zrqcb_bar_closed', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

	if ( '1' === $settings['remember_closed'] && '1' === $closed_cookie ) {
		return false;
	}

	return true;
}

/**
 * Get device visibility classes.
 *
 * @param array<string, mixed> $settings Settings.
 * @return string[]
 */
function zrqcb_get_visibility_classes( $settings ) {
	$classes = array();

	if ( '1' === $settings['mobile_only'] ) {
		$classes[] = 'zrqcb-mobile-only';
	} elseif ( '1' === $settings['desktop_only'] ) {
		$classes[] = 'zrqcb-desktop-only';
	} else {
		if ( '1' !== $settings['show_desktop'] ) {
			$classes[] = 'zrqcb-hide-desktop';
		}

		if ( '1' !== $settings['show_mobile'] ) {
			$classes[] = 'zrqcb-hide-mobile';
		}
	}

	return $classes;
}
