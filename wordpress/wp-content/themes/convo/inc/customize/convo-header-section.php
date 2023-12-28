<?php
function convo_header_setting( $wp_customize ){
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
		
	
	/*=========================================
	Header search & cart Settings Section
	=========================================*/
	// Header search & cart Setting Section // 
	$wp_customize->add_section(
        'header_search_cart',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Search','convo'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	// hide/show  search settings
	$wp_customize->add_setting( 
		'hide_show_cart' , 
			array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_checkbox',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_cart', 
		array(
			'label'	      => esc_html__( 'Hide / Show Cart', 'convo' ),
			'section'     => 'header_search_cart',
			'settings'    => 'hide_show_cart',
			'type'        => 'ios', // light, ios, flat
		) 
	));	
};
add_action( 'customize_register', 'convo_header_setting' );

// header selective refresh
function convo_home_header_section_partials( $wp_customize ){
	// hide_show_cart
	$wp_customize->selective_refresh->add_partial(
		'hide_show_cart', array(
			'selector' => '.header-wrap-right .cart-icon',
			'container_inclusive' => true,
			'render_callback' => 'header_search_cart',
			'fallback_refresh' => true,
		)
	);
}
add_action( 'customize_register', 'convo_home_header_section_partials' );
