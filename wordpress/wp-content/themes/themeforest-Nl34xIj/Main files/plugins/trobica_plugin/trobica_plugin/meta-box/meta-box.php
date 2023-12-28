<?php
/**
 * Metabox Class Fill.
 *
 * @package Trobica
 */
?>
<?php
/**
 * Calls the class on the post edit screen.
 */
defined('TROBICA_ADDONS_ROOT') or define('TROBICA_ADDONS_ROOT', dirname(__FILE__));
defined('TROBICA_ADDONS_CUSTOM_POST_TYPE') or define('TROBICA_ADDONS_CUSTOM_POST_TYPE', dirname(__FILE__).'/custom-post-type');
defined('TROBICA_ADDONS_ROOT_DIR') or define('TROBICA_ADDONS_ROOT_DIR', plugins_url().'/trobica_plugin');


function Trobica_Meta_Boxes() 
{
    new trobicaMetaboxes();
}

	if ( is_admin() ) {
	    add_action( 'load-post.php', 'Trobica_Meta_Boxes' );
	    add_action( 'load-post-new.php', 'Trobica_Meta_Boxes' );
	}


/** 
 * The trobicaMetaboxes Class.
 */
class trobicaMetaboxes {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		$this->trobica_metabox_addons();
		add_action( 'add_meta_boxes', array( $this, 'trobica_add_meta_boxs' ) );
		add_action( 'save_post', array( $this, 'trobica_save_meta_box' ) );
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));

		/* Portfolio */
		add_action( 'add_meta_boxes', array( $this, 'trobica_add_meta_boxs_portfolios' ) );
	}

	/**
	 * Adds the meta box functions container.
	 */
	public function trobica_metabox_addons(){
		include('meta-box-maps.php'); 
	}

	/**
	 * Adds the meta box container.
	 */
	public function trobica_add_meta_boxs( $trobica_post_type ) {
		$trobica_post_types = array('post', 'page', 'portfolio');    //limit meta box to certain post types
		$flag = false;
        if ( in_array( $trobica_post_type, $trobica_post_types )){
           	$flag = true;
        }
        if($flag == true){
	        $this->trobica_add_meta_box('trobica_admin_options', 'Trobica '.ucfirst($trobica_post_type).' Settings', $trobica_post_type);
	    }

	}

	public function trobica_add_meta_box($trobica_id, $trobica_label_name, $trobica_post_type)
	{
		add_meta_box(
			$trobica_id
			,$trobica_label_name
			,array( $this, $trobica_id )
			,$trobica_post_type
			
		);
	}

	public function trobica_admin_options()
	{
		global $post;
		if($post->post_type == 'post' || $post->post_type == 'portfolio'){
			$trobica_tabs_title = array('General Settings', 'Header Settings', 'Footer');
			$trobica_tabs_sub_title = array('General configuration settings', 'Header section configuration settings', '', 'Enable/Disable comments in '.$post->post_type, 'Footer section configuration settings', '');
			$trobica_page_tabs = array('General Settings', 'Header Settings', 'Footer');
			$trobica_page_tab_content = array('general','header', 'footer');
		}else{
			$trobica_tabs_title = array('General Settings','Header Settings', 'Footer Settings');
			$trobica_tabs_sub_title = array( 'General configuration settings','Header section configuration settings', '', 'Enable/Disable comments in page', 'Footer section configuration settings');
			$trobica_page_tabs = array( 'General Settings','Header Settings', 'Footer Settings');
			$trobica_page_tab_content = array('general','header','footer');
		}

		$trobica_icon_class = array('icon-gears','fa fa-header', 'el-icon-website', 'fa fa-align-left', 'fa fa-server', 'el-icon-website icon-rotate', 'fa fa-list-alt');
		echo '<ul class="trobica_meta_box_tabs">';
		$trobica_icon = 0;
		$trobica_showicon = '';
			foreach( $trobica_page_tabs as $tab_key => $tab_name ) {
				if($trobica_icon_class){
					$trobica_showicon = '<i class="'.esc_attr($trobica_icon_class[$trobica_icon]).'"></i>';
				}
				echo '<li class="trobica_tab_'.$trobica_page_tab_content[$tab_key].'"><a href="'.esc_url($tab_name).'">'.$trobica_showicon.'<span class="group_title">'.esc_attr($tab_name).'</span></a></li>';
				$trobica_icon++;
			}
		echo '</ul>';

		echo '<div class="trobica_meta_box_tab_content">';
		foreach( $trobica_page_tab_content as $tab_content_key => $tab_content_name ) {
			echo '<div class="trobica_meta_box_tab" id="trobica_tab_'.esc_attr($tab_content_name).'">';
				echo "<div class='main_tab_title'>";
					echo "<h3>".$trobica_tabs_title[$tab_content_key]."</h3>";
					echo "<span class='description'>".$trobica_tabs_sub_title[$tab_content_key]."</span>";
				echo "</div>";
				include('metabox-tabs/metabox_'.$tab_content_name.'.php'); 
			echo '</div>';
		}
		echo '</div>';
		echo '<div class="clear"></div>';
	}


	/**
	 * Adds the meta box for Portfolio.
	 */
	public function trobica_add_meta_boxs_portfolios( $trobica_post_type ) 
	{
		$trobica_post_types = array('portfolio','post');     //limit meta box to certain post types
		$flag = false;
        if ( in_array( $trobica_post_type, $trobica_post_types )){
           	$flag = true;
        }
        if($flag == true){
	        $this->trobica_add_meta_box('trobica_admin_options_single', 'Trobica '.ucfirst($trobica_post_type).' Format Settings', $trobica_post_type);
	    }

	}

	public function trobica_add_meta_boxs_portfolio($trobica_id, $trobica_label_name, $trobica_post_type)
	{
		add_meta_box(
			$trobica_id
			,$trobica_label_name
			,array( $this, $trobica_id )
			,$trobica_post_type
			,'advanced'
			,'high'
		);
	}

	public function trobica_admin_options_single()
	{
        global $post;
		echo '<div class="trobica_meta_box_tab_content_single">';
			echo '<div class="trobica_meta_box_tab" id="trobica_tab_single">';
		
		echo '</div>';
		if($post->post_type == 'portfolio'):
                include('metabox-tabs/metabox_portfolio_setting.php' );
                endif;
		echo '</div>';
		echo '<div class="clear"></div>';
	}

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function trobica_save_meta_box( $trobica_post_id ) {
	
		// If this is an autosave, our form has not been submitted,
        // so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $trobica_post_id;

		/* OK, its safe for us to save the data now. */
		$trobica_data = array();
		foreach ( $_POST as $key => $value ) {
			if ( strstr( $key, 'trobica_') ) {
				// Sanitize the user input.
				$trobica_data = sanitize_text_field( $_POST[$key] );
				// Update the meta field.
				update_post_meta( $trobica_post_id, $key, $trobica_data );
			}
		}
	}

	function admin_script_loader() {
		
		global $pagenow;
		if( is_admin() && ( $pagenow=='post-new.php' || $pagenow=='post.php' ) ) {
			wp_enqueue_script('media-upload'); 
			wp_enqueue_script('thickbox');
	   		wp_enqueue_style('thickbox');
	   		wp_enqueue_style( 'wp-color-picker' );
    		wp_enqueue_script( 'wp-color-picker');
    		wp_register_script('alpha-color-picker', TROBICA_ADDONS_ROOT_DIR.'/meta-box/js/alpha-color-picker.js', array('jquery', 'wp-color-picker'), '1.0' );
		   	wp_enqueue_script('alpha-color-picker');
		   	wp_register_style('alpha-color-picker', TROBICA_ADDONS_ROOT_DIR.'/meta-box/css/alpha-color-picker.css', array('wp-color-picker'), '1.0' );
		   	wp_enqueue_style('alpha-color-picker');
	   		wp_register_script('trobica-admin-metabox-cookie-js', TROBICA_ADDONS_ROOT_DIR.'/meta-box/js/metabox-cookie.js', array('jquery'), '1.0' );
	   		wp_enqueue_script('trobica-admin-metabox-cookie-js');
	   		wp_register_script('trobica-admin-metabox-js', TROBICA_ADDONS_ROOT_DIR.'/meta-box/js/meta-box.js', array('jquery'), '1.0' );
			wp_enqueue_script('trobica-admin-metabox-js');
	   		wp_register_style('trobica-admin-metabox-css', TROBICA_ADDONS_ROOT_DIR.'/meta-box/css/meta-box.css',null, '1.0' );
	   		wp_enqueue_style('trobica-admin-metabox-css');
		}
	}
}