<?php
/**
	* Define Theme Version
 */
define( 'CONVO_THEME_VERSION', '1.4' );	
	function convo_css() {
	$parent_style = 'conceptly-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'convo-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('convo-color-default',get_stylesheet_directory_uri() .'/assets/css/colors/default.css');
	wp_dequeue_style('conceptly-color');

	wp_enqueue_style('convo-woo',get_stylesheet_directory_uri() .'/assets/css/woo.css');
	
	wp_enqueue_style('convo-responsive',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('conceptly-responsive');
	wp_dequeue_style('conceptly-fonts');
}
add_action( 'wp_enqueue_scripts', 'convo_css',999);
   	

function convo_setup()	{	

	add_theme_support( 'custom-header', apply_filters( 'convo_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'conceptly_header_style',
	) ) );
	
	add_editor_style( array( 'assets/css/editor-style.css', convo_google_font() ) );
}
add_action( 'after_setup_theme', 'convo_setup' );
	
/**
 * Register Google fonts for Convo.
 */
function convo_google_font() {
	
   $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Open Sans:300,400,600,700,800', 'Raleway:400,700');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function convo_scripts_styles() {
    wp_enqueue_style( 'convo-fonts', convo_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'convo_scripts_styles' );

function convo_remove_parent_setting( $wp_customize ) {
	$wp_customize->remove_control('hide_show_breadcrumb');
	$wp_customize->remove_section('header_get_button');
}
add_action( 'customize_register', 'convo_remove_parent_setting',99 );


/**
 * Sidebar.
 */
require_once get_stylesheet_directory() . '/inc/sidebar/sidebar.php';

/**
 * Called all the Customize file.
 */

require( get_stylesheet_directory() . '/inc/customize/convo-header-section.php');
require( get_stylesheet_directory() . '/inc/customize/convo-premium.php');


/**
 * Import Options From Parent Theme
 *
 */
function convo_parent_theme_options() {
	$conceptly_mods = get_option( 'theme_mods_conceptly' );
	if ( ! empty( $conceptly_mods ) ) {
		foreach ( $conceptly_mods as $conceptly_mod_k => $conceptly_mod_v ) {
			set_theme_mod( $conceptly_mod_k, $conceptly_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'convo_parent_theme_options' );

function woocommerce_product_loop_start() { 
	echo '<div class="woo-container"><div class="row">'; 
}
	
function woocommerce_product_loop_end() { 
echo '</div></div>'; 
}
	
/****
 * Let WordPress manage 
*/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo' );
add_theme_support( 'align-wide' );
add_theme_support( 'add_editor_style()' );
add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption'));

