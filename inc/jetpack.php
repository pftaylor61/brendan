<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Brendan
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function brendan_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'brendan_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function brendan_jetpack_setup
add_action( 'after_setup_theme', 'brendan_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function brendan_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function brendan_infinite_scroll_render
