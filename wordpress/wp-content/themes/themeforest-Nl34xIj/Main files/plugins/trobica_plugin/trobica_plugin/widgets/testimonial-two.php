<?php
namespace TrobicaPlugin\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.0.0
 */
class Trobica_Testimonial_Two extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'trobica-testimonial-two';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Trobica Testimonial 2', 'trobica_plg' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-blockquote';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'trobica-elements' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
	
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Testimonial Settings', 'trobica_plg' ),
			]
		);
		
		
	
		$this->add_control(
			'testi_list',
			[
				'label' => __( 'Testimonial List', 'trobica_plg' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => 'Testimonial Name',
						'position' => 'Testimonial Position',
						'text' => 'Testimonial Text',
						'rate' => '3.5',
					],
					[
						'title' => 'Testimonial Name',
						'position' => 'Testimonial Position',
						'text' => 'Testimonial Text',
						'rate' => '3.5',
					],
					[
						'title' => 'Testimonial Name',
						'position' => 'Testimonial Position',
						'text' => 'Testimonial Text',
						'rate' => '3.5',
					],
				],
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Testimonial Name', 'trobica_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Testimonial Name..', 'trobica_plg' ),
					],
					
					[
						'name' => 'position',
						'label' => __( 'Testimonial Position', 'trobica_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Testimonial Position..', 'trobica_plg' ),
					],
					[
						'name' => 'image',
						'label' => __( 'Client Image', 'trobica_plg' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'text',
						'label' => __( 'Testimonial Text', 'trobica_plg' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'placeholder' => __( 'Testimonial Text..', 'trobica_plg' ),
					],
					[
						'name' => 'rate',
						'label' => __( 'Testimonial Rate', 'trobica_plg' ),
						'type' => Controls_Manager::NUMBER,
						'label_block' => true,
					],
				],
				'title_field' => '{{ title }}',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_settting',
			[
				'label' => __( 'Text Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .testi-text' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typography',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .testimonial .testi-text',
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'name_settings',
			[
				'label' => __( 'Name Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial h3' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'name_typography',
				'label'     => __( 'Name Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .testimonial h3',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'post_settting',
			[
				'label' => __( 'Position Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'post_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .testi-from' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'post_typography',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .testimonial .testi-from',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'quote_settting',
			[
				'label' => __( 'Quote Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'quote_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .quote-icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'quotebg_color',
			[
				'label' => __( 'Background Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .quote-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'quote_radius',
			[
				'label' => __( 'Border Radius', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial .fa' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'border_settting',
			[
				'label' => __( 'Border Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'border_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial .slick-slide' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		
		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings(); ?>
		
		
            <div class="testi-slider testimonial">
                <?php foreach ( $settings['testi_list'] as $index => $item ) : 
                ?>
                <div>
                	
                    <h3><?php echo  $item['title']; ?></h3>
                    
                    <p class="testi-from"><?php echo  $item['position']; ?></p>
                    
                    <div class="author-img">
						<img src="<?php echo esc_url ( $item['image']['url']); ?>" alt="img">
					</div>
                    
                    <p class="testi-text">
                   	<?php echo  $item['text']; ?>
                    </p>

                    <?php
					    for($x=1;$x<=$item['rate'];$x++) {
					        echo '<i class="rating-icon fa fa-star" aria-hidden="true"></i>';
					    }
					    if (strpos($item['rate'],'.')) {
					        echo '<i class="rating-icon fa fa-star-half-o" aria-hidden="true"></i>';
					        $x++;
					    }
					    while ($x<=5) {
					        echo '<i class="rating-icon fa fa-star-o" aria-hidden="true"></i>';
					        $x++;
					    }
				    ?>
                    
                </div>
                
                <?php endforeach; ?>
            </div><!--/.testimonial-->
	
		
	<?php 
			wp_enqueue_script('jquery-slick',plugins_url( '/js/slick.min.js' , __FILE__ ), array('jquery'), null, true  );
			wp_enqueue_script('trobica-testimonial',plugins_url( '/js/testimonial.js' , __FILE__ ) , array('jquery'), null, true );
		}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		
		
	}
}


