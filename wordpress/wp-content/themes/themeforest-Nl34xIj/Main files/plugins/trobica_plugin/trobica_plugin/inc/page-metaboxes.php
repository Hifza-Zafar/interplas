<?php
/**
 * Initialize the Post Post Meta Boxes. 
 */
add_action( 'admin_init', 'trobica_page_mb' ); 
function trobica_page_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the reduxoptions Meta Box API Class.
   */
  $trobica_page_mb = array(
    'id'          => 'page_meta_box',
    'title'       => esc_html__( 'Page Settings', 'trobica_plg' ),
    'desc'        => '',
    'pages'       => array( 'page','portfolio','post'),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	
	  array(
        'id'          => 'custom_footer_header_note',
        'label'       => esc_html__('Please Note', 'trobica_plg' ),
        'desc'        => esc_html__('The Custom Header & Custom Footer only appear on the actual page, not in elementor editor.', 'trobica_plg' ),
        'std'         => '',
        'type'        => 'textblock-tittrobica',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  
	   
	  
	  array(
        'label'       => esc_html__( 'Header Settings', 'trobica_plg' ),
        'id'          => 'header_setting_section',
        'type'        => 'tab',
      ),
	  
	  array(
        'label'       => esc_html__( 'Header Options', 'trobica_plg' ),
		'desc'          =>  '',
        'id'          => 'custom_header_choice',
        'type'        => 'select',
		'std'		 => 'global',
		'choices'     => array( 
			 array(
                'value'       => 'global',
                'label'       => esc_html__( 'Use Global Settings (in Theme Options)', 'trobica_plg' )
              ),
			  array(
                'value'       => 'standard',
                'label'       => esc_html__( 'Use Default Header', 'trobica_plg' )
              ),
			  array(
                'value'       => 'custom_header',
                'label'       => esc_html__( 'Use Custom Header', 'trobica_plg' )
              ),
			  array(
                'value'       => 'no_header',
                'label'       => esc_html__( 'No Header', 'trobica_plg' )
              ),
			  
		)
      ),
	  
      array(
        'id'          => 'header_list',
        'label'       => esc_html__( 'Choose Custom Header', 'trobica_plg' ),
        'desc'        => '',
        'std'         => '',
		'condition'   => 'custom_header_choice:is(custom_header)',
        'type' => 'custom-post-type-select',
        'rows'        => '',
        'post_type'   => 'header',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
	  array(
        'label'       => esc_html__( 'Header Format', 'trobica_plg' ),
		'desc'          => '',
        'id'          => 'menu_format',
        'type'        => 'select',
		'condition'   => 'custom_header_choice:is(standard)',
		'std'		 => 'head_clean',
		'choices'     => array( 
			  array(
                'value'       => 'head_clean',
                'label'       => esc_html__( 'Black Text with White Background Header in Relative Position', 'trobica_plg' )
              ),
			  array(
                'value'       => 'head_standard',
                'label'       => esc_html__( 'White Text with Transparent Background Header in Absolute Position', 'trobica_plg' )
              ),
			  
		)
      ),
	  
	  array(
        'label'       => esc_html__( 'Footer Settings', 'trobica_plg' ),
        'id'          => 'footer_setting_section',
        'type'        => 'tab',
      ),
 
	  array(
        'label'       => esc_html__( 'Use Custom Footer', 'trobica_plg' ),
		'desc'          =>  '',
        'id'          => 'custom_footer_choice',
        'type'        => 'select',
		'std'		 => 'global',
		'choices'     => array( 
			  array(
                'value'       => 'global',
                'label'       => esc_html__( 'Use Global Settings (in Theme Options) Footer', 'trobica_plg' )
              ),
			  array(
                'value'       => 'standard',
                'label'       => esc_html__( 'Use Default Footer', 'trobica_plg' )
              ),
			  array(
                'value'       => 'custom_footer',
                'label'       => esc_html__( 'Use Custom Footer', 'trobica_plg' )
              ),
			  array(
                'value'       => 'no_footer',
                'label'       => esc_html__( 'No Footer', 'trobica_plg' )
              ),
			  
		)
      ),
	  
	
	  
	  array(
        'id'          => 'footer_list',
        'label'       => esc_html__( 'Choose Custom Footer', 'trobica_plg' ),
        'desc'        => '',
        'std'         => '',
		'condition'   => 'custom_footer_choice:is(custom_footer)',
        'type' => 'custom-post-type-select',
        'rows'        => '',
        'post_type'   => 'footer',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $trobica_page_mb );

}

