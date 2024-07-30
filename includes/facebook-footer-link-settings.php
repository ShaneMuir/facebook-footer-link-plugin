<?php
/**
 * Register settings page for the plugin
 *
 * @package facebook-footer-link
 */

/**
 * Add options menu links
 *
 * @return void
 */
function ffl_options_menu_link(): void {
	add_options_page(
		'Facebook Footer Link Options',
		'Facebook Footer Link',
		'manage_options',
		'ffl-options',
		'ffl_options_content'
	);
}

/**
 * Generate options HTML content
 *
 * @return void
 */
function ffl_options_content(): void {

	// Init Options Global.
	global $ffl_options;

	ob_start(); ?>
		<div class="wrap">
			<h2><?php esc_attr_e( 'Facebook Footer Link Settings', 'ffl_domain' ); ?></h2>
			<p><?php esc_attr_e( 'Settings for the Facebook Footer Link plugin', 'ffl_domain' ); ?></p>
			<form method="post" action="options.php">
				<?php settings_fields( 'ffl_settings_group' ); ?>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="ffl_settings[enable]"><?php esc_attr_e( 'Enable', 'ffl_domain' ); ?></label></th>
							<td><input name="ffl_settings[enable]" type="checkbox" id="ffl_settings[enable]" value="1" <?php checked( '1', $ffl_options['enable'] ?? '' ); ?></td>
						</tr>
						<tr>
							<th scope="row"><label for="ffl_settings[facebook_url]"><?php esc_attr_e( 'Facebook Profile URL', 'ffl_domain' ); ?></label></th>
							<td><input name="ffl_settings[facebook_url]" type="text" id="ffl_settings[facebook_url]" value="<?php echo esc_attr( $ffl_options['facebook_url'] ?? '' ); ?>" class="regular-text">
								<p class="description"><?php esc_attr_e( 'Enter your Facebook profile URL', 'ffl_domain' ); ?></p></td>
						</tr>

						<tr>
							<th scope="row"><label for="ffl_settings[link_color]"><?php esc_attr_e( 'Link Color', 'ffl_domain' ); ?></label></th>
							<td><input name="ffl_settings[link_color]" type="text" id="ffl_settings[link_color]" value="<?php echo esc_attr( $ffl_options['link_color'] ?? '' ); ?>" class="regular-text">
								<p class="description"><?php esc_attr_e( 'Enter a color or HEX value with a #', 'ffl_domain' ); ?></p></td>
						</tr>

						<tr>
							<th scope="row"><label for="ffl_settings[show_in_feed]"><?php esc_attr_e( 'Show In Posts Feed', 'ffl_domain' ); ?></label></th>
							<td><input name="ffl_settings[show_in_feed]" type="checkbox" id="ffl_settings[show_in_feed]" value="1" <?php checked( '1', $ffl_options['show_in_feed'] ?? '' ); ?></td>
						</tr>
					</tbody>
				</table>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_attr_e( 'Save Changes', 'ffl_domain' ); ?>"</p>
			</form>
		</div>
	<?php
	echo esc_html( ob_get_clean() );
}

add_action( 'admin_menu', 'ffl_options_menu_link' );

/**
 * Register the settings
 *
 * @return void
 */
function ffl_register_settings(): void {
	register_setting( 'ffl_settings_group', 'ffl_settings' );
}

add_action( 'admin_init', 'ffl_register_settings' );
