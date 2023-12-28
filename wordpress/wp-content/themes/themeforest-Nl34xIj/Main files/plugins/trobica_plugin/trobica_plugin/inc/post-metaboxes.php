<?php
/**
 * Initialize the Post Post Meta Boxes. 
 */
add_action( 'admin_init', 'trobica_post_mb' );
function trobica_post_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the reduxoptions Meta Box API Class.
   */
  $trobica_post_mb = array(
    'id'          => 'post_meta_box',
    'title'       => esc_html__( 'Post Setting', 'trobica_plg' ), 
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	 array(
        'id'          => 'post_setting_block',
        'label'       => esc_html__('Note for Image', 'trobica_plg' ),
        'desc'        => esc_html__('Always use the same ratio/size for images in slider/gallery below.  ', 'trobica_plg' ),
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
        'label'       => esc_html__( 'Choose Post Format Here', 'trobica_plg' ),
        'id'          => 'post_format',
        'type'        => 'select',
		'std'		 => 'post_standard',
		'choices'     => array( 
			  array(
                'value'       => 'post_standard',
                'label'       => esc_html__( 'Post Standard', 'trobica_plg' )
              ),
			  array(
                'value'       => 'post_gallery',
                'label'       => esc_html__( 'Post Gallery', 'trobica_plg' )
              ),
			  array(
                'value'       => 'post_slider',
                'label'       => esc_html__( 'Post Slider', 'trobica_plg' )
              ),
			  array(
                'value'       => 'post_video',
                'label'       => esc_html__( 'Post Video', 'trobica_plg' )
              ),
			  array(
                'value'       => 'post_audio',
                'label'       => esc_html__( 'Post Audio', 'trobica_plg' )
              ),
		)
      ),
	  
	  array(
        'label'       => esc_html__( 'Gallery Setting', 'trobica_plg' ),
        'id'          => 'post_gallery_setting',
        'type'        => 'gallery',
        'desc'        => esc_html__( 'Create your Post gallery here. <br/>Try to use same ratio for each image.', 'trobica_plg' ),
        'condition'   => 'post_format:is(post_gallery)'
      ),
	  array(
        'label'       => esc_html__( 'Slider Setting', 'trobica_plg' ),
        'id'          => 'post_slider_setting',
        'type'        => 'gallery',
        'desc'        => esc_html__( 'Create your Post Slider here.', 'trobica_plg' ),
        'condition'   => 'post_format:is(post_slider)'
      ),
	  array(
        'label'       => esc_html__( 'Video Setting', 'trobica_plg' ),
        'id'          => 'post_video_setting',
        'type'        => 'text',
        'desc'        => esc_html__( 'Insert the link for video embed here.<br/> For video from youtube/vimeo just put the link without any attribute like ?wmode=opaque.<br/>eg: http://www.youtube.com/embed/IzgAYZTuBA8 or http://player.vimeo.com/video/64078587', 'trobica_plg' ),
        'condition'   => 'post_format:is(post_video)'
      ),
	   array(
        'label'       => esc_html__( 'Audio Setting', 'trobica_plg' ),
        'id'          => 'post_audio_setting',
        'type'        => 'textarea',
		'rows'        => '3',
        'desc'        => esc_html__( 'Insert your iframe/embedded code for audio here.<br/>
		You can input iframe/embed code from youtube/vimeo here too, if you don\'t like the default style of Post video.', 'trobica_plg' ),
        'condition'   => 'post_format:is(post_audio)'
      ),
	  array(
        'label'       => esc_html__( 'Sidebar', 'trobica_plg' ),
        'id'          => 'post_sidebar',
        'type'        => 'on-off',
		'desc'        => esc_html__( 'You can hide the sidebar by turning it off.', 'trobica_plg' ),
		'std'		 => 'on',
      )
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $trobica_post_mb );

}

