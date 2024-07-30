<?php
/**
 * This file is responsible for appending the Social media
 * footer link to posts.
 *
 * @package social-media-footer-link
 */

/**
 * Add Social Media footer link to posts.
 *
 * @param  string $content The content of the post.
 * @return string The modified content with the Social media footer link appended.
 */
function ffl_add_footer( string $content ): string {

	global $ffl_options;

	$footer_output  = '<hr>';
	$footer_output .= '<div class="footer_content">';
	$footer_output .= '<span class="dashicons dashicons-facebook"></span> Find me On <a style="color:' . esc_attr( $ffl_options['link_color'] ?? '' ) . '" target="_blank" href="' . esc_url( $ffl_options['facebook_url'] ?? '#' ) . '">Facebook</a>';
	$footer_output .= '</div>';

	$show_in_feed = $ffl_options['show_in_feed'] ?? false;
	$enabled      = $ffl_options['enable'] ?? false;

	if ( $show_in_feed ) {
		if ( ( is_single() || is_home() ) && $enabled ) {
			return $content . $footer_output;
		}
	} elseif ( is_single() && $enabled ) {
		return $content . $footer_output;
	}

	return $content;
}

add_filter( 'the_content', 'ffl_add_footer' );
