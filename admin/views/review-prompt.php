<?php
/**
 * Review prompt below settings save button.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$zrqcb_review_url = 'https://wordpress.org/support/plugin/zubairray-quick-cta-bar/reviews/#new-post';
?>
<aside class="zrqcb-review-prompt" aria-label="<?php esc_attr_e( 'Plugin review', 'zubairray-quick-cta-bar' ); ?>">
	<div class="zrqcb-review-prompt-inner">
		<span class="zrqcb-review-prompt-icon" aria-hidden="true">⭐</span>
		<div class="zrqcb-review-prompt-content">
			<p class="zrqcb-review-prompt-title"><?php esc_html_e( 'Enjoying ZubairRay Quick CTA Bar?', 'zubairray-quick-cta-bar' ); ?></p>
			<p class="zrqcb-review-prompt-text"><?php esc_html_e( 'Your review helps us improve the plugin and support future development.', 'zubairray-quick-cta-bar' ); ?></p>
		</div>
		<a href="<?php echo esc_url( $zrqcb_review_url ); ?>" class="button zrqcb-review-prompt-button" target="_blank" rel="noopener noreferrer">
			<?php esc_html_e( 'Leave a Review', 'zubairray-quick-cta-bar' ); ?>
			<span class="zrqcb-review-prompt-stars" aria-hidden="true">★★★★★</span>
		</a>
	</div>
</aside>
