<?php
/**
 * About tab content for the settings page.
 *
 * @package ZubairRay_Quick_CTA_Bar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$zrqcb_about_links = array(
	'website'       => 'https://zubairray.com/',
	'github'        => 'https://github.com/thezubairray',
	'documentation' => 'https://zubairray.com/plugins/zubairray-quick-cta-bar/',
	'support'       => 'https://wordpress.org/support/plugin/zubairray-quick-cta-bar/',
	'contact'       => 'https://zubairray.com/contact/',
);
?>
<div id="zrqcb-tab-about" class="zrqcb-tab-panel" role="tabpanel" aria-labelledby="zrqcb-tab-link-about" hidden>
	<div class="zrqcb-about">
		<header class="zrqcb-about-header">
			<h2 class="zrqcb-about-title"><?php esc_html_e( 'About Zubair Ray', 'zubairray-quick-cta-bar' ); ?></h2>
			<p class="zrqcb-about-tagline"><?php esc_html_e( 'Building Reliable Digital Solutions', 'zubairray-quick-cta-bar' ); ?></p>
		</header>

		<div class="zrqcb-about-intro">
			<p>
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: website link */
						__( 'Hi, I’m Zubair Ray, founder of %s.', 'zubairray-quick-cta-bar' ),
						sprintf(
							'<a href="%1$s" target="_blank" rel="noopener noreferrer">zubairray.com</a>',
							esc_url( $zrqcb_about_links['website'] )
						)
					),
					array(
						'a' => array(
							'href'   => true,
							'target' => true,
							'rel'    => true,
						),
					)
				);
				?>
			</p>
			<p><?php esc_html_e( 'I specialize in developing high-quality WordPress plugins, business websites, custom web applications, and automation solutions that help businesses grow and operate more efficiently.', 'zubairray-quick-cta-bar' ); ?></p>
			<p><?php esc_html_e( 'My focus is on creating lightweight, secure, privacy-friendly, and maintainable solutions that deliver real value to businesses and website owners.', 'zubairray-quick-cta-bar' ); ?></p>
			<p><?php esc_html_e( 'Whether you need a custom WordPress plugin, a complete website, or a scalable web application, I can help turn your ideas into reality.', 'zubairray-quick-cta-bar' ); ?></p>
		</div>

		<hr class="zrqcb-about-divider" aria-hidden="true">

		<section class="zrqcb-about-section">
			<h3 class="zrqcb-about-section-title"><?php esc_html_e( 'Work With Zubair Ray', 'zubairray-quick-cta-bar' ); ?></h3>
			<p class="zrqcb-about-lead"><?php esc_html_e( 'Looking for a custom solution?', 'zubairray-quick-cta-bar' ); ?></p>

			<h4 class="zrqcb-about-subtitle"><?php esc_html_e( 'Services', 'zubairray-quick-cta-bar' ); ?></h4>
			<ul class="zrqcb-about-list zrqcb-about-list-checks">
				<li><?php esc_html_e( 'Custom WordPress Plugin Development', 'zubairray-quick-cta-bar' ); ?></li>
				<li><?php esc_html_e( 'WordPress Website Development', 'zubairray-quick-cta-bar' ); ?></li>
				<li><?php esc_html_e( 'Custom Web Applications', 'zubairray-quick-cta-bar' ); ?></li>
				<li><?php esc_html_e( 'SaaS Product Development', 'zubairray-quick-cta-bar' ); ?></li>
				<li><?php esc_html_e( 'Business Automation Solutions', 'zubairray-quick-cta-bar' ); ?></li>
				<li><?php esc_html_e( 'API Integrations & Custom Features', 'zubairray-quick-cta-bar' ); ?></li>
			</ul>

			<div class="zrqcb-about-cta">
				<h4 class="zrqcb-about-subtitle"><?php esc_html_e( 'Let’s Build Something Great', 'zubairray-quick-cta-bar' ); ?></h4>
				<p><?php esc_html_e( 'Need help with a current project or planning a new one?', 'zubairray-quick-cta-bar' ); ?></p>
				<p>
					<a href="<?php echo esc_url( $zrqcb_about_links['contact'] ); ?>" class="button button-primary button-hero zrqcb-about-cta-button" target="_blank" rel="noopener noreferrer">
						<?php esc_html_e( 'Need Custom Development?', 'zubairray-quick-cta-bar' ); ?>
					</a>
				</p>
			</div>
		</section>

		<hr class="zrqcb-about-divider" aria-hidden="true">

		<section class="zrqcb-about-section">
			<h3 class="zrqcb-about-section-title"><?php esc_html_e( 'Useful Links', 'zubairray-quick-cta-bar' ); ?></h3>
			<ul class="zrqcb-about-links">
				<li>
					<span class="zrqcb-about-link-icon" aria-hidden="true">🌐</span>
					<a href="<?php echo esc_url( $zrqcb_about_links['website'] ); ?>" target="_blank" rel="noopener noreferrer">zubairray.com</a>
				</li>
				<li>
					<span class="zrqcb-about-link-icon" aria-hidden="true">📦</span>
					<a href="<?php echo esc_url( $zrqcb_about_links['github'] ); ?>" target="_blank" rel="noopener noreferrer">github.com/thezubairray</a>
				</li>
				<li>
					<span class="zrqcb-about-link-icon" aria-hidden="true">📖</span>
					<a href="<?php echo esc_url( $zrqcb_about_links['documentation'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Documentation', 'zubairray-quick-cta-bar' ); ?></a>
				</li>
				<li>
					<span class="zrqcb-about-link-icon" aria-hidden="true">💬</span>
					<a href="<?php echo esc_url( $zrqcb_about_links['support'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Support', 'zubairray-quick-cta-bar' ); ?></a>
				</li>
			</ul>
		</section>

		<hr class="zrqcb-about-divider" aria-hidden="true">

		<footer class="zrqcb-about-footer">
			<p class="zrqcb-about-footer-made">
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: linked author name */
						__( 'Made with ❤️ by %s', 'zubairray-quick-cta-bar' ),
						sprintf(
							'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>',
							esc_url( $zrqcb_about_links['website'] ),
							esc_html__( 'Zubair Ray', 'zubairray-quick-cta-bar' )
						)
					),
					array(
						'a' => array(
							'href'   => true,
							'target' => true,
							'rel'    => true,
						),
					)
				);
				?>
			</p>
			<p class="zrqcb-about-footer-tagline"><?php esc_html_e( 'Building WordPress Plugins, Business Websites & Web Applications', 'zubairray-quick-cta-bar' ); ?></p>
		</footer>
	</div>
</div>
