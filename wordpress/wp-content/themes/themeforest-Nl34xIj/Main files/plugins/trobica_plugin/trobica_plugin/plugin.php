<?php
namespace TrobicaPlugin;

use TrobicaPlugin\Widgets\Dsc_Slider;
use TrobicaPlugin\Widgets\Trobica_Portfolio;
use TrobicaPlugin\Widgets\Trobica_Product;
use TrobicaPlugin\Widgets\Trobica_Title;
use TrobicaPlugin\Widgets\Trobica_Countdown;
use TrobicaPlugin\Widgets\Trobica_Team_one;
use TrobicaPlugin\Widgets\Trobica_Team;
use TrobicaPlugin\Widgets\Trobica_Testimonial;
use TrobicaPlugin\Widgets\Trobica_Testimonial_Two;
use TrobicaPlugin\Widgets\Trobica_TextIcon;
use TrobicaPlugin\Widgets\Trobica_Post;
use TrobicaPlugin\Widgets\Trobica_Post_Two;
use TrobicaPlugin\Widgets\Trobica_Post_Three;
use TrobicaPlugin\Widgets\Trobica_Contact;




if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class TrobicaPlugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		//register all script 
		add_action( 'elementor/widgets/widgets_registered',[ $this, 'on_widgets_registered' ] );
		//isotope script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-isotope',TROBICA_URL .'widgets/js/isotope.pkgd.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-portfolio',TROBICA_URL .'widgets/js/portfolio.js', array('jquery'), null, true  );} );
		//blog masonry script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-blog-masonry',TROBICA_URL .'widgets/js/blog-mason.js', array('jquery'), null, true  );} );
		//slider script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-slick',TROBICA_URL .'widgets/js/slick.min.js.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-animation',TROBICA_URL .'widgets/js/slick-animation.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-slider-script',TROBICA_URL .'widgets/js/slider.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-blog-slider-script',TROBICA_URL .'widgets/js/blog-slider.js', array('jquery'), null, true  );} );
		//gallery popup
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('jquery-magnificpopup',TROBICA_URL .'widgets/js/jquery.magnific-popup.min.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-gallery-popup',TROBICA_URL .'widgets/js/popup-gallery.js', array('jquery'), null, true  );} );
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-blog-script',TROBICA_URL .'widgets/js/blog.js', array('jquery'), null, true  );} );
		
		//gallery  masonry
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-masonry-gallery',TROBICA_URL .'widgets/js/mason-gallery.js', array('jquery'), null, true  );} );
		
		//share script
		add_action( 'elementor/frontend/after_register_scripts', function() {  wp_register_script('trobica-share',TROBICA_URL .'widgets/js/share.js', array('jquery'), null, true  );} );

		
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/dsc-slider.php';
		require __DIR__ . '/widgets/portfolio.php';
		require __DIR__ . '/widgets/product.php';
		require __DIR__ . '/widgets/title.php';
		require __DIR__ . '/widgets/countdown.php';
		require __DIR__ . '/widgets/team-one.php';
		require __DIR__ . '/widgets/team.php';
		require __DIR__ . '/widgets/testimonial-one.php';
		require __DIR__ . '/widgets/testimonial-two.php';
		require __DIR__ . '/widgets/text-icon.php';
		require __DIR__ . '/widgets/post-one.php';
		require __DIR__ . '/widgets/post-two.php';
		require __DIR__ . '/widgets/post-three.php';
		require __DIR__ . '/widgets/contact.php';
		
	}
	

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Dsc_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Portfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Product() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Countdown() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Team_One() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Testimonial_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_TextIcon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Post_two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Post_three() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Trobica_Contact() );

		
	}
}

new TrobicaPlugin();



