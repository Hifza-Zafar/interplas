<?php
/**
 * Initialize the Portfolio Post Meta Boxes. 
 */
add_action( 'admin_init','portfolio_mb' );
function portfolio_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the reduxoptions Meta Box API Class.
   */
  $portfolio_mb = array(
    'id'          => 'portfolio_meta_box',
    'title'       => esc_html__( 'Portfolio Setting', 'trobica_plg' ),
    'desc'        => '',
    'pages'       => array( 'portfolio' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
  
      array(
        'label'       => esc_html__( 'Portfolio Format Setting', 'trobica_plg' ),
        'id'          => 'portfolio_format',
        'type'        => 'tab',
      ),
	  array(
        'id'          => 'port_setting_block',
        'label'       => '',
        'desc'        => esc_html__('Recommended size for portfolio featured images is 800x582px or 800x1164px', 'trobica_plg' ),
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
        'label'       => esc_html__( 'Choose Portfolio Format Here', 'trobica_plg' ),
        'id'          => 'port_format',
        'type'        => 'select',
		'std'		 => 'port_standard',
		'choices'     => array( 
			  array(
                'value'       => 'port_standard',
                'label'       => esc_html__( 'Portfolio Gallery at Top', 'trobica_plg' )
              ),
			  array(
                'value'       => 'port_two',
                'label'       => esc_html__( 'Portfolio Gallery at Right', 'trobica_plg' )
              ),
		)
      ),
	 
	  
	  array(
        'label'       => esc_html__( 'Top Content Format', 'trobica_plg' ),
        'id'          => 'top_type',
        'type'        => 'select',
		'condition'   => 'port_format:is(port_two)',
		'std'		 => 'top_content_slider',
		'desc'        => esc_html__( 'Choose the content that will appear on the top of the single portfolio page.', 'trobica_plg' ),
		'choices'     => array( 
			  array(
                'value'       => 'top_content_slider',
                'label'       => esc_html__( 'Images Background', 'trobica_plg' )
              ),
			  array(
                'value'       => 'top_content_video',
                'label'       => esc_html__( 'Video Background', 'trobica_plg' )
              ),
			  array(
                'value'       => 'top_content_youtube',
                'label'       => esc_html__( 'Youtube Background', 'trobica_plg' )
              )
		)
      ),
	  
	  array(
        'label'       => esc_html__( 'Portfolio Top Image', 'trobica_plg' ),
        'id'          => 'port_slider_setting',
        'type'        => 'upload',
        'desc'        => esc_html__( 'Upload Your Top Image here. <br/>You still need to fill this if you choose the video/youtube background. <br/>
		So the image will replace the video/youtube background in touch devices. ', 'trobica_plg' ),
        'condition'   => 'port_format:is(port_two)'
      ),
	  array(
        'label'       => esc_html__( 'Youtube ID', 'trobica_plg' ),
        'id'          => 'port_youtube_link',
        'type'        => 'text',
        'desc'        => esc_html__( 'Insert Youtube ID here. e.g EMy5krGcoOU', 'trobica_plg' ),
        'condition'   => 'port_format:is(port_two),top_type:is(top_content_youtube)'
      ),
	  array(
        'label'       => esc_html__( 'Youtube Quality', 'trobica_plg' ),
        'id'          => 'port_youtube_quality',
        'type'        => 'text',
        'desc'        => esc_html__( 'Insert Youtube video quality here. You can input <b>small, medium, large, hd720, hd1080, highres</b>. Default value is <b>large</b>', 'trobica_plg' ),
        'condition'   => 'port_format:is(port_two),top_type:is(top_content_youtube)'
      ),
	  array(
        'label'       => esc_html__( 'Video Link', 'trobica_plg' ),
        'id'          => 'port_video_link',
        'type'        => 'text',
        'desc'        => esc_html__( 'Insert the video directlink here. eg. https://www.quirksmode.org/html5/videos/big_buck_bunny.mp4', 'trobica_plg' ),
        'condition'   => 'port_format:is(port_two),top_type:is(top_content_video)'
      ),


	  array(
        'id'          => 'gallery_list',
        'label'       => esc_html__('Portfolio Gallery Images', 'trobica_plg' ),
        'desc'        => esc_html__('Create your gallery here.', 'trobica_plg' ),
        'type'        => 'list-item',
        'operator'    => 'and',
        'settings'    => array( 

          array(
            'id'          => 'gallery_port_img',
            'label'       => esc_html__('Image', 'trobica_plg' ),
            'desc'        => esc_html__('Upload your gallery image here.', 'trobica_plg' ),
            'type'        => 'upload',
          ),
		  array(
            'id'          => 'gallery_size',
            'label'       => esc_html__('Image Gallery Size', 'trobica_plg' ),
            'desc'        => esc_html__('Choose your image size here.', 'trobica_plg' ),
			'type'        => 'select',
			'std'		 => 'gallery_size_standard',
			'choices'     => array( 
				  array(
					'value'       => 'gallery_size_standard',
					'label'       => esc_html__( 'Default Size', 'trobica_plg' )
				  ),
				  array(
					'value'       => 'gallery_size_big',
					'label'       => esc_html__( 'Big Size', 'trobica_plg' )
				  ),
			)
          ),
		  
        )
      ),
	  
	  array(
        'label'       => esc_html__( 'Portfolio Detail Setting', 'trobica_plg' ),
        'id'          => 'port_detail_tab',
        'type'        => 'tab',
      ),
	  
	  array(
        'label'       => esc_html__( 'Portfolio Button Link', 'trobica_plg' ),
        'id'          => 'port_item_btn_link',
        'type'        => 'text',
        'desc'        => esc_html__( 'Insert your button link here. Leave it blank if you dont want it.', 'trobica_plg' ),
      ),
	  array(
        'label'       => esc_html__( 'Portfolio Button Text', 'trobica_plg' ),
        'id'          => 'port_item_btn_text',
        'type'        => 'text',
        'desc'        => esc_html__( 'Insert your button text here. Leave it blank if you dont want it.', 'trobica_plg' ),
      ),
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $portfolio_mb );

}

