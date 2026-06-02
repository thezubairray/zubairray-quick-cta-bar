<?php
/**
 * Admin settings page template.
 *
 * @package ZubairRay_Quick_CTA_Bar
 *
 * @var array<string, mixed>  $settings
 * @var array<string, string> $cta_types
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$zrqcb_settings_updated = filter_has_var( INPUT_GET, 'settings-updated' )
	&& filter_input( INPUT_GET, 'settings-updated', FILTER_VALIDATE_BOOLEAN );

if ( $zrqcb_settings_updated ) {
	add_settings_error(
		'zrqcb_messages',
		'zrqcb_message',
		__( 'Settings saved.', 'zubairray-quick-cta-bar' ),
		'updated'
	);
}
?>
<div class="wrap zrqcb-settings-wrap">
	<?php settings_errors( 'zrqcb_messages' ); ?>
	<h1><?php esc_html_e( 'ZubairRay Quick CTA Bar', 'zubairray-quick-cta-bar' ); ?></h1>
	<p class="zrqcb-intro"><?php esc_html_e( 'Add a lightweight sticky call to action bar with phone, WhatsApp, email, or custom URL buttons.', 'zubairray-quick-cta-bar' ); ?></p>

	<div class="zrqcb-privacy-notice">
		<h2><?php esc_html_e( 'Privacy', 'zubairray-quick-cta-bar' ); ?></h2>
		<ul>
			<li><?php esc_html_e( 'No external scripts, APIs, or tracking pixels.', 'zubairray-quick-cta-bar' ); ?></li>
			<li><?php esc_html_e( 'No visitor data collection.', 'zubairray-quick-cta-bar' ); ?></li>
			<li><?php esc_html_e( 'If “Remember closed state” is enabled, a small cookie is stored in the visitor’s browser.', 'zubairray-quick-cta-bar' ); ?></li>
		</ul>
	</div>

	<form method="post" action="options.php" class="zrqcb-settings-form">
		<?php settings_fields( 'zrqcb_settings' ); ?>

		<nav class="nav-tab-wrapper zrqcb-nav-tabs" aria-label="<?php esc_attr_e( 'Settings sections', 'zubairray-quick-cta-bar' ); ?>">
			<a href="#zrqcb-tab-general" id="zrqcb-tab-link-general" class="nav-tab nav-tab-active" data-zrqcb-tab="general" role="tab" aria-selected="true" aria-controls="zrqcb-tab-general"><?php esc_html_e( 'General', 'zubairray-quick-cta-bar' ); ?></a>
			<a href="#zrqcb-tab-content" id="zrqcb-tab-link-content" class="nav-tab" data-zrqcb-tab="content" role="tab" aria-selected="false" aria-controls="zrqcb-tab-content"><?php esc_html_e( 'Content', 'zubairray-quick-cta-bar' ); ?></a>
			<a href="#zrqcb-tab-design" id="zrqcb-tab-link-design" class="nav-tab" data-zrqcb-tab="design" role="tab" aria-selected="false" aria-controls="zrqcb-tab-design"><?php esc_html_e( 'Design', 'zubairray-quick-cta-bar' ); ?></a>
			<a href="#zrqcb-tab-visibility" id="zrqcb-tab-link-visibility" class="nav-tab" data-zrqcb-tab="visibility" role="tab" aria-selected="false" aria-controls="zrqcb-tab-visibility"><?php esc_html_e( 'Visibility', 'zubairray-quick-cta-bar' ); ?></a>
			<a href="#zrqcb-tab-advanced" id="zrqcb-tab-link-advanced" class="nav-tab" data-zrqcb-tab="advanced" role="tab" aria-selected="false" aria-controls="zrqcb-tab-advanced"><?php esc_html_e( 'Advanced', 'zubairray-quick-cta-bar' ); ?></a>
			<a href="#zrqcb-tab-about" id="zrqcb-tab-link-about" class="nav-tab" data-zrqcb-tab="about" role="tab" aria-selected="false" aria-controls="zrqcb-tab-about"><?php esc_html_e( 'About Zubair Ray', 'zubairray-quick-cta-bar' ); ?></a>
		</nav>

		<div id="zrqcb-tab-general" class="zrqcb-tab-panel is-active" role="tabpanel" aria-labelledby="zrqcb-tab-link-general">
			<h2 class="zrqcb-section-title"><?php esc_html_e( 'General Settings', 'zubairray-quick-cta-bar' ); ?></h2>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><?php esc_html_e( 'Enable Plugin', 'zubairray-quick-cta-bar' ); ?></th>
					<td>
						<label>
							<input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[enabled]" value="1" <?php checked( $settings['enabled'], '1' ); ?>>
							<?php esc_html_e( 'Display the CTA bar on the frontend', 'zubairray-quick-cta-bar' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="zrqcb_position"><?php esc_html_e( 'Bar Position', 'zubairray-quick-cta-bar' ); ?></label></th>
					<td>
						<select id="zrqcb_position" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[position]">
							<option value="top" <?php selected( $settings['position'], 'top' ); ?>><?php esc_html_e( 'Sticky Top Bar', 'zubairray-quick-cta-bar' ); ?></option>
							<option value="bottom" <?php selected( $settings['position'], 'bottom' ); ?>><?php esc_html_e( 'Sticky Bottom Bar', 'zubairray-quick-cta-bar' ); ?></option>
						</select>
					</td>
				</tr>
			</table>
		</div>

		<div id="zrqcb-tab-content" class="zrqcb-tab-panel" role="tabpanel" aria-labelledby="zrqcb-tab-link-content" hidden>
			<h2 class="zrqcb-section-title"><?php esc_html_e( 'Content Settings', 'zubairray-quick-cta-bar' ); ?></h2>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="zrqcb_message_text"><?php esc_html_e( 'Message Text', 'zubairray-quick-cta-bar' ); ?></label></th>
					<td><input type="text" id="zrqcb_message_text" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[message_text]" value="<?php echo esc_attr( $settings['message_text'] ); ?>" class="regular-text"></td>
				</tr>
				<tr>
					<th scope="row"><label for="zrqcb_button_text"><?php esc_html_e( 'CTA Button Text', 'zubairray-quick-cta-bar' ); ?></label></th>
					<td><input type="text" id="zrqcb_button_text" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[button_text]" value="<?php echo esc_attr( $settings['button_text'] ); ?>" class="regular-text"></td>
				</tr>
				<tr>
					<th scope="row"><label for="zrqcb_cta_type"><?php esc_html_e( 'CTA Type', 'zubairray-quick-cta-bar' ); ?></label></th>
					<td>
						<select id="zrqcb_cta_type" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[cta_type]">
							<?php foreach ( $cta_types as $zrqcb_type_key => $zrqcb_type_label ) : ?>
								<option value="<?php echo esc_attr( $zrqcb_type_key ); ?>" <?php selected( $settings['cta_type'], $zrqcb_type_key ); ?>><?php echo esc_html( $zrqcb_type_label ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="zrqcb_cta_destination"><?php esc_html_e( 'CTA Destination', 'zubairray-quick-cta-bar' ); ?></label></th>
					<td>
						<input type="text" id="zrqcb_cta_destination" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[cta_destination]" value="<?php echo esc_attr( $settings['cta_destination'] ); ?>" class="regular-text" placeholder="<?php esc_attr_e( 'Phone, WhatsApp number, email, or URL', 'zubairray-quick-cta-bar' ); ?>">
						<p class="description"><?php esc_html_e( 'Examples: +15551234567, hello@example.com, or https://example.com/offer', 'zubairray-quick-cta-bar' ); ?></p>
					</td>
				</tr>
			</table>
		</div>

		<div id="zrqcb-tab-design" class="zrqcb-tab-panel" role="tabpanel" aria-labelledby="zrqcb-tab-link-design" hidden>
			<h2 class="zrqcb-section-title"><?php esc_html_e( 'Design Settings', 'zubairray-quick-cta-bar' ); ?></h2>
			<table class="form-table" role="presentation">
				<?php
				$zrqcb_color_fields = array(
					'background_color'  => __( 'Background Color', 'zubairray-quick-cta-bar' ),
					'text_color'        => __( 'Text Color', 'zubairray-quick-cta-bar' ),
					'button_color'      => __( 'Button Color', 'zubairray-quick-cta-bar' ),
					'button_text_color' => __( 'Button Text Color', 'zubairray-quick-cta-bar' ),
				);
				?>
				<?php foreach ( $zrqcb_color_fields as $zrqcb_field_key => $zrqcb_field_label ) : ?>
					<tr>
						<th scope="row"><label for="zrqcb_<?php echo esc_attr( $zrqcb_field_key ); ?>"><?php echo esc_html( $zrqcb_field_label ); ?></label></th>
						<td>
							<span class="zrqcb-color-inputs">
								<input type="color" id="zrqcb_<?php echo esc_attr( $zrqcb_field_key ); ?>" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[<?php echo esc_attr( $zrqcb_field_key ); ?>]" value="<?php echo esc_attr( $settings[ $zrqcb_field_key ] ); ?>" class="zrqcb-color-picker" data-hex-target="zrqcb_<?php echo esc_attr( $zrqcb_field_key ); ?>_hex">
								<input type="text" id="zrqcb_<?php echo esc_attr( $zrqcb_field_key ); ?>_hex" value="<?php echo esc_attr( $settings[ $zrqcb_field_key ] ); ?>" class="zrqcb-color-hex" maxlength="7" aria-label="<?php echo esc_attr( $zrqcb_field_label ); ?>">
							</span>
						</td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<th scope="row"><label for="zrqcb_bar_height"><?php esc_html_e( 'Bar Height', 'zubairray-quick-cta-bar' ); ?></label></th>
					<td><input type="number" min="32" max="160" id="zrqcb_bar_height" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[bar_height]" value="<?php echo esc_attr( $settings['bar_height'] ); ?>" class="small-text"> <?php esc_html_e( 'px', 'zubairray-quick-cta-bar' ); ?></td>
				</tr>
				<tr>
					<th scope="row"><label for="zrqcb_bar_padding"><?php esc_html_e( 'Bar Padding', 'zubairray-quick-cta-bar' ); ?></label></th>
					<td><input type="number" min="0" max="48" id="zrqcb_bar_padding" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[bar_padding]" value="<?php echo esc_attr( $settings['bar_padding'] ); ?>" class="small-text"> <?php esc_html_e( 'px', 'zubairray-quick-cta-bar' ); ?></td>
				</tr>
				<tr>
					<th scope="row"><label for="zrqcb_button_radius"><?php esc_html_e( 'CTA Button Radius', 'zubairray-quick-cta-bar' ); ?></label></th>
					<td><input type="number" min="0" max="40" id="zrqcb_button_radius" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[button_radius]" value="<?php echo esc_attr( $settings['button_radius'] ); ?>" class="small-text"> <?php esc_html_e( 'px', 'zubairray-quick-cta-bar' ); ?></td>
				</tr>
			</table>
		</div>

		<div id="zrqcb-tab-visibility" class="zrqcb-tab-panel" role="tabpanel" aria-labelledby="zrqcb-tab-link-visibility" hidden>
			<h2 class="zrqcb-section-title"><?php esc_html_e( 'Visibility Settings', 'zubairray-quick-cta-bar' ); ?></h2>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><?php esc_html_e( 'Devices', 'zubairray-quick-cta-bar' ); ?></th>
					<td>
						<label><input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[show_desktop]" value="1" <?php checked( $settings['show_desktop'], '1' ); ?>> <?php esc_html_e( 'Show on Desktop', 'zubairray-quick-cta-bar' ); ?></label><br>
						<label><input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[show_mobile]" value="1" <?php checked( $settings['show_mobile'], '1' ); ?>> <?php esc_html_e( 'Show on Mobile', 'zubairray-quick-cta-bar' ); ?></label>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Audience', 'zubairray-quick-cta-bar' ); ?></th>
					<td>
						<label><input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[show_logged_in]" value="1" <?php checked( $settings['show_logged_in'], '1' ); ?>> <?php esc_html_e( 'Logged-in Users', 'zubairray-quick-cta-bar' ); ?></label><br>
						<label><input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[show_logged_out]" value="1" <?php checked( $settings['show_logged_out'], '1' ); ?>> <?php esc_html_e( 'Logged-out Users', 'zubairray-quick-cta-bar' ); ?></label>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Mode', 'zubairray-quick-cta-bar' ); ?></th>
					<td>
						<label><input type="checkbox" data-zrqcb-exclusive="desktop_only" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[mobile_only]" value="1" <?php checked( $settings['mobile_only'], '1' ); ?>> <?php esc_html_e( 'Mobile Only Mode', 'zubairray-quick-cta-bar' ); ?></label><br>
						<label><input type="checkbox" data-zrqcb-exclusive="mobile_only" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[desktop_only]" value="1" <?php checked( $settings['desktop_only'], '1' ); ?>> <?php esc_html_e( 'Desktop Only Mode', 'zubairray-quick-cta-bar' ); ?></label>
					</td>
				</tr>
			</table>
		</div>

		<div id="zrqcb-tab-advanced" class="zrqcb-tab-panel" role="tabpanel" aria-labelledby="zrqcb-tab-link-advanced" hidden>
			<h2 class="zrqcb-section-title"><?php esc_html_e( 'Advanced Settings', 'zubairray-quick-cta-bar' ); ?></h2>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><?php esc_html_e( 'Behavior', 'zubairray-quick-cta-bar' ); ?></th>
					<td>
						<label><input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[open_new_tab]" value="1" <?php checked( $settings['open_new_tab'], '1' ); ?>> <?php esc_html_e( 'Open Link in New Tab', 'zubairray-quick-cta-bar' ); ?></label><br>
						<label><input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[show_close]" value="1" <?php checked( $settings['show_close'], '1' ); ?>> <?php esc_html_e( 'Show Close Button', 'zubairray-quick-cta-bar' ); ?></label><br>
						<label><input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[remember_closed]" value="1" <?php checked( $settings['remember_closed'], '1' ); ?>> <?php esc_html_e( 'Remember Closed State', 'zubairray-quick-cta-bar' ); ?></label>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Branding', 'zubairray-quick-cta-bar' ); ?></th>
					<td>
						<label><input type="checkbox" name="<?php echo esc_attr( ZRQCB_OPTION_KEY ); ?>[powered_by]" value="1" <?php checked( $settings['powered_by'], '1' ); ?>> <?php esc_html_e( 'Show optional "Powered by ZubairRay" credit link', 'zubairray-quick-cta-bar' ); ?></label>
					</td>
				</tr>
			</table>
		</div>

		<div class="zrqcb-form-footer">
			<div class="zrqcb-form-submit">
				<?php submit_button(); ?>
			</div>
			<?php require ZRQCB_PLUGIN_DIR . 'admin/views/review-prompt.php'; ?>
		</div>
	</form>

	<?php require ZRQCB_PLUGIN_DIR . 'admin/views/about-tab.php'; ?>
</div>
