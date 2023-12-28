<?php
/**
 * Metabox Map
 *
 * @package Trobica
 */
?>
<?php
function trobica_meta_box_text($trobica_id, $trobica_label, $trobica_desc = '', $trobica_short_desc = '')
{
	global $post;

	$html = '';
		$html .= '<div class="'.esc_attr($trobica_id).'_box description_box">';
		$html .= '<div class="left-part">';
			$html .= $trobica_label;
			if($trobica_desc) {
				$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
			}
		$html .='</div>';
		$html .= '<div class="right-part">';
			$html .= '<input type="text" id="' . esc_attr($trobica_id) . '" name="' . esc_attr($trobica_id) . '" value="' . get_post_meta($post->ID, $trobica_id, true) . '" />';
			if($trobica_short_desc) {
				$html .= '<span class="short-description">' . esc_attr($trobica_short_desc) . '</span>';
			}
		$html .= '</div>';
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function trobica_meta_box_dropdown($trobica_id, $trobica_label, $trobica_options, $trobica_desc = '')
{
	global $post;

	$html = $trobica_select_class = '';

			$html .= '<div class="'.esc_attr($trobica_id).'_box description_box">';
					$html .= '<div class="left-part">';
							$html .= $trobica_label;
							if($trobica_desc) {
									$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
							}
					$html .='</div>';
					$html .= '<div class="right-part">';
							$html .= '<select id="' . esc_attr($trobica_id) . '" class="'.$trobica_select_class.'" name="' . esc_attr($trobica_id) . '">';
							foreach($trobica_options as $key => $option) {
									if(get_post_meta($post->ID, $trobica_id, true) == (string)$key && get_post_meta($post->ID, $trobica_id, true) != '') {
											$trobica_selected = 'selected="selected"';
									}else {
													$trobica_selected = '';
									}

									$html .= '<option ' . $trobica_selected . ' value="' . esc_attr($key) . '">' . esc_attr($option) . '</option>';

							}
							$html .= '</select>';
					$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function trobica_meta_box_dropdown_sidebar($trobica_id, $trobica_label, $trobica_options, $trobica_desc = '', $trobica_child_hidden = '')
{
	global $post;

	$html = $trobica_select_class = '';
	$flag = false;
		$trobica_child_hidden = ( $trobica_child_hidden ) ? ' hide-child '.$trobica_child_hidden : '';
		$html .= '<div class="'.esc_attr($trobica_id).'_box description_box'.$trobica_child_hidden.'">';
			$html .= '<div class="left-part">';
				$html .= $trobica_label;
				if($trobica_desc) {
					$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($trobica_id) . '" class="'.esc_attr($trobica_select_class).'" name="' . esc_attr($trobica_id) . '">';
				foreach($trobica_options as $key => $option) {
					if(get_post_meta($post->ID, $trobica_id, true) == $key && get_post_meta($post->ID, $trobica_id, true) != '') {
						$trobica_selected = 'selected="selected"';
					}else {
							$trobica_selected = '';
					}

					$html .= '<option ' . $trobica_selected . ' value="' . esc_attr($key) . '">' . esc_attr($option) . '</option>';

				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

/* menu dropdown */

function trobica_meta_box_dropdown_menu($trobica_id, $trobica_label, $trobica_options, $trobica_desc = '')
{
	global $post;

	$html = $trobica_select_class = '';
	$flag = false;

	
		$html .= '<div class="'.esc_attr($trobica_id).'_box description_box">';
			$html .= '<div class="left-part">';
				$html .= $trobica_label;
				if($trobica_desc) {
					$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($trobica_id) . '" class="'.esc_attr($trobica_select_class).'" name="' . esc_attr($trobica_id) . '">';
				$html .= '<option value="">Default</option>';
				$trobica_menus = wp_get_nav_menus();
				$trobica_menu_array = array();
				foreach ($trobica_menus as $key => $value) {
					if(get_post_meta($post->ID, $trobica_id, true) == $value->slug && get_post_meta($post->ID, $trobica_id, true) != '') {
						$trobica_selected = 'selected="selected"';
					}else {
							$trobica_selected = ''; 
					}

					$html .= '<option ' . $trobica_selected . ' value="' . esc_attr($value->slug) . '">' . esc_attr($value->name) . '</option>';
				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function trobica_meta_box_dropdown_custom_headers($trobica_id, $trobica_label, $trobica_options, $trobica_desc = '')
{
	global $post;

	$html = $trobica_select_class = '';
	$flag = false;

	
		$html .= '<div class="'.esc_attr($trobica_id).'_box description_box">';
			$html .= '<div class="left-part">';
				$html .= $trobica_label;
				if($trobica_desc) {
					$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($trobica_id) . '" class="'.esc_attr($trobica_select_class).'" name="' . esc_attr($trobica_id) . '">';
				$html .= '<option value="">Default</option>';
				$trobica_custom_headers = new WP_Query( array( 'post_type' => 'header' ) );
				$posts = $trobica_custom_headers->posts; 
				foreach ($posts as $key => $value) {
					if(get_post_meta($post->ID, $trobica_id, true) == $value->ID && get_post_meta($post->ID, $trobica_id, true) != '') {
						$trobica_selected = 'selected="selected"';
					}else {
							$trobica_selected = '';
					}

					$html .= '<option ' . $trobica_selected . ' value="' . esc_attr($value->ID) . '">' . esc_attr($value->post_name) . '</option>';
				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function trobica_meta_box_dropdown_custom_footers($trobica_id, $trobica_label, $trobica_options, $trobica_desc = '')
{
	global $post;

	$html = $trobica_select_class = '';
	$flag = false;

	
		$html .= '<div class="'.esc_attr($trobica_id).'_box description_box">';
			$html .= '<div class="left-part">';
				$html .= $trobica_label;
				if($trobica_desc) {
					$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($trobica_id) . '" class="'.esc_attr($trobica_select_class).'" name="' . esc_attr($trobica_id) . '">';
				$html .= '<option value="">Default</option>';
				$trobica_custom_footers = new WP_Query( array( 'post_type' => 'footer' ) );
				$posts = $trobica_custom_footers->posts; 
				foreach ($posts as $key => $value) {
					if(get_post_meta($post->ID, $trobica_id, true) == $value->ID && get_post_meta($post->ID, $trobica_id, true) != '') {
						$trobica_selected = 'selected="selected"'; 
					}else {
							$trobica_selected = '';
					}

					$html .= '<option ' . $trobica_selected . ' value="' . esc_attr($value->ID) . '">' . esc_attr($value->post_name) . '</option>';
				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
	echo sprintf("%s",$html);
}

function trobica_meta_box_textarea($trobica_id, $trobica_label, $trobica_desc = '', $trobica_default = '' )
{
	global $post;
	$html = '';
	$html .= '<div class="'.esc_attr($trobica_id).'_box description_box">';
	$html .= '<div class="left-part">';
		$html .= $trobica_label;
		if($trobica_desc) {
			$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
		}
	$html .='</div>';
	
	if( get_post_meta($post->ID, $trobica_id, true)) {
		$trobica_value = get_post_meta($post->ID, $trobica_id, true);
	} else {
		$trobica_value = '';
	}
	$html .= '<div class="right-part">';
		$html .= '<textarea cols="120" id="' . esc_attr($trobica_id) . '" name="' . esc_attr($trobica_id) . '">' . esc_attr($trobica_value) . '</textarea>';
	$html .='</div>';
	$html .= '</div>';

	echo sprintf("%s",$html);
}

function trobica_meta_box_upload($trobica_id, $trobica_label, $trobica_desc = '')
{
	global $post;

	$html = '';
	$html .= '<div class="'.esc_attr($trobica_id).'_box description_box">';
	$html .= '<div class="left-part">';
		$html .= $trobica_label;
		if($trobica_desc) {
			$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
		}
	$html .='</div>';
	$html .= '<div class="right-part">';
		$html .= '<input name="' . esc_attr($trobica_id) . '" class="upload_field" id="trobica_upload" type="text" value="' . get_post_meta($post->ID,  $trobica_id, true) . '" />';
		$html .= '<input name="'. $trobica_id.'_thumb" class="'. $trobica_id.'_thumb" id="'. $trobica_id.'_thumb" type="hidden" value="'.get_post_meta($post->ID,  $trobica_id, true).'" />';
				$html .= '<img class="upload_image_screenshort" src="'.get_post_meta($post->ID,  $trobica_id, true).'" />';
		$html .= '<input class="trobica_upload_button" id="trobica_upload_button" type="button" value="'.__( 'Browse', 'trobica_plg' ).'" />';
		$html .= '<span class="trobica_remove_button button">'.__( 'Remove', 'trobica_plg' ).'</span>';
				
	$html .='</div>';
	$html .= '</div>';
	echo sprintf("%s",$html);
}

function trobica_meta_box_upload_multiple($trobica_id, $trobica_label, $trobica_desc = '')
{
	global $post;

	$html = '';
	$html .= '<div class="'.esc_attr($trobica_id).'_box description_box">';
		$html .= '<div class="left-part">';
			$html .= $trobica_label;
			if($trobica_desc) {
				$html .= '<span class="description">' . esc_attr($trobica_desc) . '</span>';
			}
		$html .='</div>';
		$html .= '<div class="right-part">';
		
			$html .= '<input name="' . esc_attr($trobica_id) . '" class="upload_field" id="trobica_upload" type="hidden" value="'.get_post_meta($post->ID,  $trobica_id, true).'" />';
			$html .= '<div class="multiple_images">';
			$trobica_val = explode(",",get_post_meta($post->ID,  $trobica_id, true));
			
			foreach ($trobica_val as $key => $value) {
				if(!empty($value)):
					$trobica_image_url = wp_get_attachment_url( $value );
					$html .='<div id='.esc_attr($value).'>';
						$html .= '<img class="upload_image_screenshort_multiple" src="'.$trobica_image_url.'" style="width:100px;" />';
						$html .= '<a href="javascript:void(0)" class="remove">'.__( 'Remove', 'trobica_plg' ).'</a>';
					$html .= '</div>';
				endif;
			}
			$html .= '</div>';
			$html .= '<input class="trobica_upload_button_multiple" id="trobica_upload_button_multiple" type="button" value="Browse" />'.__( ' Select Files', 'trobica_plg' );
					
		$html .='</div>';
	$html .= '</div>';
	echo sprintf( "%s", $html );
}

	if ( ! function_exists( 'trobica_meta_box_colorpicker' ) ) {
		function trobica_meta_box_colorpicker( $id, $label, $desc = '', $trobica_dependency = '' ) {
			global $post;
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( !empty($trobica_dependency) ){
				$val = array();
				$dependency_arr[] = 'data-element="'.$trobica_dependency['element'].'"';
				foreach ($trobica_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}
				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $label;
					if($desc) {
						$html .= '<span class="description">' . $desc . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<input type="text" class="trobica-color-picker" id="' . $id . '" name="' . $id . '" value="' . get_post_meta($post->ID, $id, true) . '" />';
				$html .='</div>';
			$html .='</div>';
			echo $html;
		}
	}