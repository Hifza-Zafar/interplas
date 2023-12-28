<?php
// Registers the new post type 

function trobica_portfolio_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio', 'trobica_plg' ),
				'singular_name' => __( 'Portfolio' , 'trobica_plg'),
				'add_new' => __( 'Add New Portfolio', 'trobica_plg' ),
				'add_new_item' => __( 'Add New Portfolio', 'trobica_plg' ),
				'edit_item' => __( 'Edit Portfolio', 'trobica_plg' ),
				'new_item' => __( 'Add New Portfolio', 'trobica_plg' ),
				'view_item' => __( 'View Portfolio', 'trobica_plg' ),
				'search_items' => __( 'Search Portfolio', 'trobica_plg' ),
				'not_found' => __( 'No Portfolio found', 'trobica_plg' ),
				'not_found_in_trash' => __( 'No Portfolio found in trash', 'trobica_plg' )
			),
			'public' => true,
			'supports' => array( 'title','editor', 'thumbnail', 'comments' , 'excerpt'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "portfolio"), // Permalinks format
			'menu_position' => 5,
			'menu_icon'           => 'dashicons-index-card',
			'exclude_from_search' => true 
		)
	);

}

add_action( 'init', 'trobica_portfolio_post_type' );

//add taxonomies(portfolio category)
function trobica_taxonomies_portfolio() {
	$labels = array(
		'name'              => _x( 'Portfolio Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Portfolio Categories' ),
		'all_items'         => __( 'All Portfolio Categories' ),
		'parent_item'       => __( 'Parent Portfolio Category' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:' ),
		'edit_item'         => __( 'Edit Portfolio Category' ), 
		'update_item'       => __( 'Update Portfolio Category' ),
		'add_new_item'      => __( 'Add New Portfolio Category' ),
		'new_item_name'     => __( 'New Portfolio Category' ),
		'menu_name'         => __( 'Portfolio Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'portfolio_category', 'portfolio', $args );
}
add_action( 'init', 'trobica_taxonomies_portfolio', 0 );

