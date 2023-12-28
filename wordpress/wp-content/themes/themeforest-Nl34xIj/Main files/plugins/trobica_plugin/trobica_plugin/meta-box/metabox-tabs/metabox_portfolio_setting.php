<?php
/**
 * Metabox For Portfolio Setting.
 *
 * @package trobica
 */
?>
<?php 
trobica_meta_box_dropdown('trobica_port_format',
				esc_html__('Choose Portfolio Format Here', 'trobica_plg'),
				array('port_standard' => esc_html__('Portfolio Gallery at Top', 'trobica_plg'),
					  'port_two' => esc_html__('Portfolio Gallery at Right', 'trobica_plg'),
					 )
			);
trobica_meta_box_dropdown('trobica_top_type',
				esc_html__('Choose Portfolio Format Here', 'trobica_plg'),
				array('top_content_slider' => esc_html__('Images Background', 'trobica_plg'),
					  'top_content_video' => esc_html__('Video Background', 'trobica_plg'),
					  'top_content_youtube' => esc_html__('Youtube Background', 'trobica_plg'),
					 )
			);
trobica_meta_box_upload('trobica_port_slider_setting', 
				esc_html__('Portfolio Top Image', 'trobica_plg'),
				esc_html__('Upload Your Top Image here. <br/>You still need to fill this if you choose the video/youtube background. <br/>
		So the image will replace the video/youtube background in touch devices. ', 'trobica_plg')
			);

trobica_meta_box_text('trobica_port_youtube_link',
				esc_html__('Youtube ID', 'trobica_plg'),
				esc_html__('Insert Youtube ID here. e.g EMy5krGcoOU', 'trobica_plg')
			);
trobica_meta_box_text('trobica_port_youtube_quality',
				esc_html__('Youtube Quality', 'trobica_plg'),
				esc_html__('Insert Youtube video quality here. You can input <b>small, medium, large, hd720, hd1080, highres</b>. Default value is <b>large</b>', 'trobica_plg')
			);
trobica_meta_box_text('trobica_port_video_link',
				esc_html__('Video Link', 'trobica_plg'),
				esc_html__('Insert the video directlink here. eg. https://www.quirksmode.org/html5/videos/big_buck_bunny.mp4', 'trobica_plg')
			);
trobica_meta_box_upload('trobica_gallery_port_img', 
				esc_html__('Portfolio Side Image', 'trobica_plg'),
				esc_html__('Upload Your Side Image here.', 'trobica_plg')
			);


