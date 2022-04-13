<?php
/**
 * Plugin Name:       Youtube Sticky Video
 * Description:       Gutenberg block to adjust sticky video on frontend side.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:                        <a href="https://profiles.wordpress.org/patelmohip/">Mohip Patel</a> | <a href="https://profiles.wordpress.org/haritpanchal/">Harit Panchal</a>
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       youtube-sticky-video
 *
 * @package           create-block
 */

if ( ! version_compare( PHP_VERSION, '5.0', '>=' ) ) {
	add_action( 'admin_notices', 'ysv_fail_php_version' );
} elseif ( ! version_compare( get_bloginfo( 'version' ), '5.0', '>=' ) ) {
	add_action( 'admin_notices', 'ysv_fail_wp_version' );
} else {
	require_once 'inc/class-ysv-loader.php';
}

/**
 * Youtube sticky video admin notice for minimum PHP version.
 *
 * Warning when the site doesn't have the minimum required PHP version.
 *
 * @since 1.0.0
 *
 * @return void
 */
function ysv_fail_php_version() {
	/* translators: %s: PHP version */
	$message      = sprintf( esc_html__( 'Youtube sticky video requires PHP version %s+, plugin is currently NOT RUNNING.', 'youtube-sticky-video' ), '5.0' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}


/**
 * Youtube sticky video admin notice for minimum WordPress version.
 *
 * Warning when the site doesn't have the minimum required WordPress version.
 *
 * @since 1.0.0
 *
 * @return void
 */
function ysv_fail_wp_version() {
	/* translators: %s: WordPress version */
	$message      = sprintf( esc_html__( 'Youtube sticky video requires WordPress version %s+. Because you are using an earlier version, the plugin is currently NOT RUNNING.', 'youtube-sticky-video' ), '5.0' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}
