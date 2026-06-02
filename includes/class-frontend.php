<?php
/**
 * Front-end assets and markup.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Outputs the sticky CTA bar on the public site.
 */
class ZRQCB_Frontend {

	/**
	 * Hook front-end functionality.
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
		add_action( 'wp_footer', array( __CLASS__, 'render_bar' ) );
	}

	/**
	 * Enqueue frontend assets.
	 */
	public static function enqueue_assets() {
		$settings = zrqcb_get_settings();

		if ( ! zrqcb_should_render_bar( $settings ) ) {
			return;
		}

		$frontend_css = ZRQCB_PLUGIN_DIR . 'assets/css/zrqcb.css';
		$frontend_js  = ZRQCB_PLUGIN_DIR . 'assets/js/zrqcb.js';

		wp_enqueue_style(
			'zubairray-quick-cta-bar',
			ZRQCB_PLUGIN_URL . 'assets/css/zrqcb.css',
			array(),
			file_exists( $frontend_css ) ? (string) filemtime( $frontend_css ) : ZRQCB_VERSION
		);

		wp_add_inline_style( 'zubairray-quick-cta-bar', self::build_inline_css( $settings ) );

		if ( '1' === $settings['show_close'] ) {
			wp_enqueue_script(
				'zubairray-quick-cta-bar',
				ZRQCB_PLUGIN_URL . 'assets/js/zrqcb.js',
				array(),
				file_exists( $frontend_js ) ? (string) filemtime( $frontend_js ) : ZRQCB_VERSION,
				true
			);

			wp_localize_script(
				'zubairray-quick-cta-bar',
				'ZRQCB',
				array(
					'cookieName' => 'zrqcb_bar_closed',
					'duration'   => 30 * DAY_IN_SECONDS,
				)
			);
		}
	}

	/**
	 * Build safe inline CSS variables.
	 *
	 * @param array<string, mixed> $settings Settings.
	 * @return string
	 */
	private static function build_inline_css( $settings ) {
		$defaults = zrqcb_get_default_settings();

		return sprintf(
			'.zrqcb-bar{--zrqcb-bg:%1$s;--zrqcb-text:%2$s;--zrqcb-btn-bg:%3$s;--zrqcb-btn-text:%4$s;--zrqcb-height:%5$dpx;--zrqcb-padding:%6$dpx;--zrqcb-radius:%7$dpx;}',
			zrqcb_sanitize_hex_color( $settings['background_color'], $defaults['background_color'] ),
			zrqcb_sanitize_hex_color( $settings['text_color'], $defaults['text_color'] ),
			zrqcb_sanitize_hex_color( $settings['button_color'], $defaults['button_color'] ),
			zrqcb_sanitize_hex_color( $settings['button_text_color'], $defaults['button_text_color'] ),
			zrqcb_clamp_int( $settings['bar_height'], 32, 160, $defaults['bar_height'] ),
			zrqcb_clamp_int( $settings['bar_padding'], 0, 48, $defaults['bar_padding'] ),
			zrqcb_clamp_int( $settings['button_radius'], 0, 40, $defaults['button_radius'] )
		);
	}

	/**
	 * Output CTA bar markup.
	 */
	public static function render_bar() {
		$settings = zrqcb_get_settings();

		if ( ! zrqcb_should_render_bar( $settings ) ) {
			return;
		}

		$url             = zrqcb_build_cta_url( $settings['cta_type'], $settings['cta_destination'] );
		$position_class  = 'top' === $settings['position'] ? 'zrqcb-position-top' : 'zrqcb-position-bottom';
		$classes         = array_merge( array( 'zrqcb-bar', $position_class ), zrqcb_get_visibility_classes( $settings ) );
		$target          = '1' === $settings['open_new_tab'] ? '_blank' : '_self';
		$rel             = '_blank' === $target ? 'noopener noreferrer' : '';
		$remember_closed = '1' === $settings['remember_closed'] ? '1' : '0';
		?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-zrqcb-bar data-zrqcb-remember="<?php echo esc_attr( $remember_closed ); ?>" role="region" aria-label="<?php esc_attr_e( 'Call to action', 'zubairray-quick-cta-bar' ); ?>">
			<div class="zrqcb-inner">
				<div class="zrqcb-message"><?php echo esc_html( $settings['message_text'] ); ?></div>

				<?php if ( $url && '' !== $settings['button_text'] ) : ?>
					<a class="zrqcb-button" href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $target ); ?>"<?php if ( $rel ) : ?> rel="<?php echo esc_attr( $rel ); ?>"<?php endif; ?>>
						<?php echo esc_html( $settings['button_text'] ); ?>
					</a>
				<?php endif; ?>

				<?php if ( '1' === $settings['powered_by'] ) : ?>
					<a class="zrqcb-credit" href="<?php echo esc_url( 'https://zubairray.com/' ); ?>" target="_blank" rel="noopener noreferrer">
						<?php esc_html_e( 'Powered by ZubairRay', 'zubairray-quick-cta-bar' ); ?>
					</a>
				<?php endif; ?>

				<?php if ( '1' === $settings['show_close'] ) : ?>
					<button type="button" class="zrqcb-close" data-zrqcb-close aria-label="<?php esc_attr_e( 'Close CTA bar', 'zubairray-quick-cta-bar' ); ?>">
						<span aria-hidden="true">&times;</span>
					</button>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
