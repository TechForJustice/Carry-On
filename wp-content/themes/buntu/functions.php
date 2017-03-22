<?php
/**
 * Theme functions and definitions.
 *
 * @package Buntu
 */

/**
 * Load styles.
 *
 * @since 1.0.0
 */
function buntu_enqueue_styles() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'buntu-custom', get_stylesheet_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery' ), '1.4.0', true );

}

add_action( 'wp_enqueue_scripts', 'buntu_enqueue_styles' );

/**
 * Setup stuffs.
 *
 * @since 1.0.0
 */
function buntu_theme_setup() {

	unregister_default_headers( array(
		'horizon',
		'orange-burn',
		'planets-blue',
		'planet-burst',
		'space-splatters',
	) );

}

add_action( 'after_setup_theme', 'buntu_theme_setup', 20 );

/**
 * Primary color.
 *
 * @since 1.0.0
 *
 * @param string $color Primary color value.
 * @return string Modified color.
 */
function buntu_color_primary_default( $color ) {
	return $color ? $color : '230d5b';
}

add_filter( 'theme_mod_color_primary', 'buntu_color_primary_default' );

/**
 * Custom header.
 *
 * @since 1.0.0
 */
function buntu_custom_header() {

	add_theme_support(
		'custom-header',
		array(
			'default-image'      => '%2$s/images/headers/beautiful-model.jpg',
			'random-default'     => false,
			'width'              => 1175,
			'height'             => 400,
			'flex-width'         => true,
			'flex-height'        => true,
			'default-text-color' => '230d5b',
			'header-text'        => true,
			'uploads'            => true,
			'wp-head-callback'   => 'stargazer_custom_header_wp_head',
		)
	);

	register_default_headers( array(
		'beautiful-model' => array(
			'url'           => '%2$s/images/headers/beautiful-model.jpg',
			'thumbnail_url' => '%2$s/images/headers/beautiful-model-thumb.jpg',
			// Translators: Header image description.
			'description'   => __( 'Beautiful Model', 'buntu' ),
		),
	) );

}

add_action( 'after_setup_theme', 'buntu_custom_header' );

/**
 * Register nav menus.
 *
 * @since 1.0.0
 */
function buntu_register_menus() {

	register_nav_menu( 'footer', _x( 'Footer', 'nav menu location', 'buntu' ) );

}

add_action( 'init', 'buntu_register_menus', 11 );

/**
 * Go to top.
 *
 * @since 1.0.0
 */
function buntu_add_goto_top() {

	echo '<a href="#container" class="scrollup" id="btn-scrollup"><span class="screen-reader-text">' . esc_html__( 'Go to top', 'buntu' ) . '</span></a>';

}

add_action( 'wp_footer', 'buntu_add_goto_top' );

/**
 * Load widgets.
 */
require get_stylesheet_directory() . '/inc/widgets.php';

/**
 * Load Jetpack.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';

/**
 * Adds support for the WordPress 'custom-background' theme feature.
 *
 * @since 1.0.0
 */
function buntu_custom_background_setup() {

	add_theme_support(
		'custom-background',
		array(
			'default-color'    => '6b269d',
			'default-image'    => get_stylesheet_directory_uri() . '/images/bg.jpg',
			'wp-head-callback' => 'stargazer_custom_background_callback',
		)
	);
}

add_action( 'after_setup_theme', 'buntu_custom_background_setup', 10 );
