<?php
/*
 * Plugin Name: Buttons With Style
 * Plugin URL: https://www.wponlinesupport.com
 * Text Domain: buttons-with-style
 * Description: Wordpress Buttons Generator, Different Styles on which you can add to your website using easy short code. 
 * Domain Path: /languages/
 * Version: 1.0.3
 * Author: WP Online Support
 * Author URI: https://www.wponlinesupport.com
 * Contributors: WP Online Support
*/

if( !defined( 'BWSWPOS_VERSION' ) ) {
	define( 'BWSWPOS_VERSION', '1.0.3' ); // Version of plugin
}

if( !defined( 'BWSWPOS_DIR' ) ) {
    define( 'BWSWPOS_DIR', dirname( __FILE__ ) ); // Plugin dir
}

add_action('plugins_loaded', 'bwswpos_load_textdomain');
function bwswpos_load_textdomain() {
	load_plugin_textdomain( 'buttons-with-style', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

add_action( 'wp_enqueue_scripts','bwswpos_script_free' );
function bwswpos_script_free() {
    wp_enqueue_style( 'button-css',  plugin_dir_url( __FILE__ ). 'css/button-css.css', array(), BWSWPOS_VERSION );  
    wp_enqueue_style( 'button-foundation',  plugin_dir_url( __FILE__ ). 'css/foundation-icons.css', array(), BWSWPOS_VERSION );
}

/*
 * Add shortcode
 *
 */
function bwswpos_shortcode( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"link" => '',
		"class" => '',
		"name"   => '',
		"type" => '',
		"style" => '',
		"size"  =>'',
		"target" => '',
		"icon_class"=> '',
		"icon_size" => '',
		
	), $atts));
	// Define link
	
	if( $link ) { 
		$button_link = $link; 
	} else {
		$button_link = 'http://www.wponlinesupport.com';
	}
	// Define class
	if( $class ) { 
		$button_class = $class; 
	} else {
		$button_class = 'primery';
	}
	
	// Define name
	if( $name ) { 
		$button_name = $name; 
	} else {
		$button_name = 'My Button';
	}
	
	// Define type
	if( $type ) { 
		$button_type = $type; 
	} else {
		$button_type = 'default';
	}
	
	// Define style
	if( $style ) { 
		$button_style = $style; 
	} else {
		$button_style = 'plane';
	}
	
		// Define target
	if( $target ) { 
		$button_target = $target; 
	} else {
		$button_target = 'self';
	}

		// Define size
	if( $size ) { 
		$button_size = $size;
	} else {
		$button_size = '';
	}

	if($icon_class)
	{
		$foundation_icon = $icon_class;
	}
	else
	{
		$foundation_icon = " ";
	}
	if($icon_size)
	{
         $foundation_icon_size = "$icon_size ";
	}
	else
	{
     $foundation_icon_size= "";
	}
	
	$button_main_class = "bws-button bws-{$button_class} bws-{$button_type} bws-{$button_style} {$button_size}";
	
	ob_start(); ?>
	
	  <a href="<?php echo $button_link; ?>" class="<?php echo $button_main_class;  ?>" target="<?php echo $button_target; ?>" > <?php if ($icon_class !="") { ?> <i class=" <?php if($foundation_icon_size != "" ) { ?> icon-size-<?php echo $foundation_icon_size; } ?>  fi-<?php  echo $foundation_icon; ?>"></i><?php } ?> <?php echo $button_name; ?> </a>
	<?php return ob_get_clean();
}
add_shortcode("bws_button", "bwswpos_shortcode");


// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require_once( BWSWPOS_DIR . '/admin/bws-how-it-work.php' );
}