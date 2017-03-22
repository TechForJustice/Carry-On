<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Buntu
 */

/**
 * Add theme support for Infinite Scroll.
 *
 * @since 1.0.0
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function buntu_jetpack_setup() {

	// Infinite scroll.
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'content',
		'footer'         => '#main',
		'wrapper'        => false,
		'render'         => 'buntu_infinite_scroll_render',
		'footer_widgets' => array( 'subsidiary' ),
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

}

add_action( 'after_setup_theme', 'buntu_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 *
 * @since 1.0.0
 */
function buntu_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		hybrid_get_content_template();
	}
}
