<?php
/**
 * Plugin Name: Trobica Theme Addons
 * Plugin URI: http://themeforest.net/user/themescamp
 * Description: This is plugin bundle for Trobica WordPress Theme.
 * Author: ThemesCamp
 * Author URI: http://themeforest.net/user/themescamp
 * Version: 1.1.0
 */




if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'TROBICA__FILE__', __FILE__ );
define( 'TROBICA_URL', plugins_url( '/', TROBICA__FILE__ ) );
define( 'TROBICA_PLUGIN_BASE', plugin_basename( TROBICA__FILE__ ) );

/**
 * Load Hello World
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function trobica_plg_load() {
	// Load localization file
	load_plugin_textdomain( 'trobica_plg' );

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded','trobica_plg_load' );


function trobica_plg_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Trobica Plugin is not working because you are using an old version of Elementor.', 'trobica_plg' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'trobica_plg' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}


//adding reduxoptions into themes
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );
	/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );



//include elementor addon
include('inc/elementor-addon.php');

//include portfolio custom post type,metaboxes & single portfolio script
include('inc/portfolio.php');
include('inc/portfolio-metaboxes.php');

//include page metabox
include('inc/page-metaboxes.php');

//include post metabox
include('inc/post-metaboxes.php');
include('meta-box/meta-box.php');

//include custom footer
include('inc/footer.php');

//include custom header
include('inc/header.php');

//include admin custom script 
include('inc/admin-script.php');

//include single portfolio function
include('inc/single-portfolio.php');



//included custom widget
include('inc/about-us.php');

//included sharing
include('inc/sharebox.php');

//included one click importer
include('inc/one-click.php');

//included shortcode importer
include('inc/shortcode.php');

//reduxoptions included function
//included theme options export/import
include('inc/theme-import.php');
//included theme options
include('inc/theme-options.php');

function admin_style() {
  wp_enqueue_style('admin-styles', TROBICA_URL.'inc/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


//plugin translation
function dsc_textdomain_translation() {
    load_plugin_textdomain('trobica_plg', false, dirname(plugin_basename(__FILE__)) . '/lang/');
} // end custom_theme_setup
add_action('after_setup_theme', 'dsc_textdomain_translation');

