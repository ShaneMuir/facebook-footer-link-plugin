<?php
/**
 * Plugin Name: Social Media Footer Link
 * Description: Adds a social media profile link to the end of posts
 * Version: 1.0
 * Author: Shane Muirhead
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package social-media-footer-link
 **/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Accessed Directly.
}

// Global Options Variable.
$ffl_options = get_option( 'ffl_settings' );

// Load Scripts.
//require_once plugin_dir_path( __FILE__ ) . '/includes/social-media-footer-link-scripts.php';

// Load Content.
require_once plugin_dir_path( __FILE__ ) . '/includes/social-media-footer-link-content.php';

if ( is_admin() ) {
	// Load Settings.
	require_once plugin_dir_path( __FILE__ ) . '/includes/social-media-footer-link-settings.php';
}
