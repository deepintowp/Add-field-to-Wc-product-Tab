<?php 
/**
 * @package WooCommerce Product Video
 */
/*
Plugin Name:WooCommerce Product Video
Plugin URI: http://wordpress.org/WooCommerce-Product-Video
Description: Add Video To product
Version: 1.0.0
Author: Subhasish Manna
Author URI: http://http://b.subho.host22.com/
License: GPLv2 or later
Text Domain: wcpd
*/


// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

if (version_compare(get_bloginfo('version'), '4.2', '<=')) {
    echo 'need wp 4.2 at least';
	exit;
}



/**
 * Check if WooCommerce is active
 **/
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
     echo 'need to activate WC';
	exit;
}
//constants
define('WCPD', plugin_dir_path(__FILE__) );





//include classes by autoload

spl_autoload_register(function($classname){
	$path = WCPD.'classes/'.$classname.'.php';
	
	if(file_exists($path)){
		require_once($path);
	}
	
	
});


//hooks

if(is_admin()){
	add_action( 'woocommerce_product_options_general_product_data',  array( ADD_fields_product_general_tab::getInstance(), 'wcpd_add_field_to_product_field' ) );
	add_action( 'woocommerce_process_product_meta',  array( ADD_fields_product_general_tab::getInstance(), 'wcpd_save_field_to_product_field' ) );
	
	
}else{
	add_action( 'woocommerce_after_main_content',  array( WCPD_fornt_end::getInstance(), 'wcpd_show_video_below_product_image' ) );
}





