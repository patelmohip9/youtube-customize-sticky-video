<?php
/**
 * Plugin Name:       Youtube Customize Sticky Video
 * Description:       Example static block scaffolded with Create Block tool.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:                        <a href="https://profiles.wordpress.org/patelmohip/">Mohip Patel</a> | <a href="https://profiles.wordpress.org/haritpanchal/">Harit Panchal</a>
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       youtube-customize-sticky-video
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_youtube_customize_sticky_video_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_youtube_customize_sticky_video_block_init' );
