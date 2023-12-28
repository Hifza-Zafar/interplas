<?php

//oneclick importer
function ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'All Demo Content',
			'import_file_url'            => plugins_url( '/demo-data/trobica.xml' , __FILE__ ),
			'import_widget_file_url'     => plugins_url( '/demo-data/trobica.wie' , __FILE__ ),
			'import_preview_image_url'   => plugins_url( '/demo-data/trobica.jpg' , __FILE__ ),
			'import_notice'                => __( '<p>To prevent any error, please use the clean wordpress site to import the demo data. </p><p>Or you can use this plugin 
			<a href="https://wordpress.org/plugins/wordpress-database-reset/" target="_blank">WordPress Database Reset</a> to reset/clear the database first.</p><p>After you import this demo, you will have to setup the elementor page builder & flickr settings separately.</p>', 'trobica_plg' ),
			'preview_url'                => 'http://theme.destudio.com/trobica/',
		),
		array(
			'import_file_name'           => 'Library/Page Template Only',
			'import_file_url'            => plugins_url( '/demo-data/trobica-library.xml' , __FILE__ ),
			'import_preview_image_url'   => plugins_url( '/demo-data/library.jpg' , __FILE__ ),
			'import_notice'                => __( 'For better import experience, try to import the media first.', 'trobica_plg' ),
			'preview_url'                => 'http://theme.destudio.com/trobica/',
		),
		array(
			'import_file_name'           => 'Media Only',
			'import_file_url'            => plugins_url( '/demo-data/trobica-media.xml' , __FILE__ ),
			'import_preview_image_url'   => plugins_url( '/demo-data/media.jpg' , __FILE__ ),
			'import_notice'                => __( 'Import the media first before you import the library/page template.', 'trobica_plg' ),
			'preview_url'                => 'http://theme.destudio.com/trobica/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );


/*-----------automatically assign "Front page", "Posts page" and menu locations ---------------------------*/



function ocdi_after_import( $selected_import ) {

	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary_menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
		)
	);

	if ( 'All Demo Content' === $selected_import['import_file_name'] ) {
		// Assign front page.
		$front_page_id = get_page_by_title( 'Home-Demo');
	}
	
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'elementor_disable_color_schemes', 'yes' ); 
	update_option( 'elementor_disable_typography_schemes', 'yes' ); 
	update_option( 'elementor_load_fa4_shim', 'yes' ); 
	update_option( 'elementor_container_width', 1200 );
	$cpt_support = [ 'page', 'post','product','portfolio','footer','header','sidepanel' ];
	update_option( 'elementor_cpt_support', $cpt_support ); //update 'Costom post type'
}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import' ); 

/*------------------Adding notes -----------------------------------*/

function ocdi_plugin_intro_text( $default_text ) {
	$default_text .= '<div class="ocdi__intro-text"><strong>Server requirements:</strong></div>';
	$default_text .= '<div class="ocdi__intro-text"><ul>
		<li>max_execution_time 3000</li>
		<li>memory_limit 128M</li>
		<li>post_max_size 64M</li>
		<li>upload_max_filesize 64M</li>
		<li>max_input_time 180</li>
	</ul></div><hr>';

	return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );

