<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package conceptly
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( 'convo_widgets_init' ) ) :
function convo_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Woocommerce Widget Area', 'convo' ),
		'id' => 'convo-sidebar-woocommerce',
		'description' => __( 'The Woocommerce Widget Area', 'convo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
endif;
add_action( 'widgets_init', 'convo_widgets_init' );