<?php
namespace TrobicaPlugin\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.0.0
 */
class Trobica_TextIcon extends Widget_Base {

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
		return 'trobica-texticon';
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
		return __( 'Trobica Text Icon','trobica_plg' );
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
		return 'fa fa-sun-o';
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
				'label' => __( 'Settings','trobica_plg' ),
			]
		);
		
		$this->add_control(
			'feature_style',
			[
				'label' => __( 'Style', 'trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => __( 'Style One', 'trobica_plg' ),
					'2' => __( 'Style Two', 'trobica_plg' ),
					'3' => __( 'Style Three', 'trobica_plg' ),
					'4' => __( 'Style Four', 'trobica_plg' ),
				],
				'default' => '1',
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon','trobica_plg' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-bell',
			]
		);
		
		$this->add_control(
			'icon_style',
			[
				'label' => __( 'Text & Icon  Type','trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'center' => __( 'Centered Icon','trobica_plg' ),
					'left' => __( 'Left Aligned Icon','trobica_plg' ),
					
				],
				'default' => 'center',
			]
		);
		
		$this->add_responsive_control(
			'title_text_margin',
			[
				'label' => __( 'Title & Subtitle Spacing','trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'condition' => [
					'icon_style' => 'left',
				],
				'selectors' => [
					'{{WRAPPER}} .box-with-icon .icon-title' => 'padding-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .box-with-icon .icon-subtitle' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title','trobica_plg' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => 'Insert your title..',
			]
		);
		
		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Subtitle','trobica_plg' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => 'Leave it blank if you don\'t want to use this subtitle',
			]
		);
		
		$this->add_control(
			'text',
			[
				'label' => __( 'Text','trobica_plg' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'placeholder' => 'Insert your text..',
			]
		);
		
		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text','trobica_plg' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'label_block' => true,
				'placeholder' => 'Insert your button text here..',
			]
		);
		
		$this->add_control(
			'link',
			[
				'label' => __( 'Button Link','trobica_plg' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'Leave it blank if you don\'t want to use this button',
			]
		);
		
		$this->add_control(
			'icon_btn',
			[
				'label' => __( 'Button Icon', 'trobica_plg' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
				'condition' => [
					'link!' => '',
				],
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Button Icon Position', 'trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'trobica_plg' ),
					'right' => __( 'After', 'trobica_plg' ),
				],
				'condition' => [
					'link!' => '',
					'icon_btn!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => __( 'Button Icon Spacing', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'link!' => '',
					'icon_btn!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .feature-btn .feature-btn-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .feature-btn .feature-btn-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'box_settings',
			[
				'label' => __( 'Box Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'box_color',
			[
				'label' => __( 'Background Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-1' => 'background-color: {{VALUE}};',
				],
			]
		);
				$this->add_control(
			'boxbrd_color',
			[
				'label' => __( 'Border Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-1' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		
		$this->start_controls_section(
			'title_settings',
			[
				'label' => __( 'Title Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typography',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .icon-title',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'condition' => [
					'icon_style' => 'left',
				],
				'selectors' => [
					'{{WRAPPER}} .icon-title' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'condition' => [
					'icon_style' => 'left',
				],
				'selectors' => [
					'{{WRAPPER}} .box-with-icon' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'subtitle_settings',
			[
				'label' => __( 'Subtitle Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'subtitle_typography',
				'label'     => __( 'Subtitle Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .icon-subtitle',
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'text_settings',
			[
				'label' => __( 'Text Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'text_typography',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .icon-text',
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-text' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'text_margin',
			[
				'label' => __( 'Margin)', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .icon-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'icon_settings',
			[
				'label' => __( 'Icon Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size','trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .trobica-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_bg_size',
			[
				'label' => __( 'Background Size','trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .trobica-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_border',
			[
				'label' => __( 'Border Radius', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .trobica-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'allowed_dimensions' => 'vertical',
				'condition' => [
					'icon_style' => 'center',
				],
				'placeholder' => [
					'top' => '',
					'right' => 'auto',
					'bottom' => '',
					'left' => 'auto',
				],
				'selectors' => [
					'{{WRAPPER}} .trobica-icon' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_margin_left',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'condition' => [
					'icon_style' => 'left',
				],
				'selectors' => [
					'{{WRAPPER}} .trobica-icon' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .trobica-icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'iconbg_color',
			[
				'label' => __( 'Background Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .trobica-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'iconbordr_color',
			[
				'label' => __( 'Border Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .box-small-icon .trobica-icon' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_bordering',
				'placeholder' => '1px',
				'default' => '',
				'selector' => '{{WRAPPER}} .trobica-icon',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'btn_settings',
			[
				'label' => __( 'Button Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'btn_typography',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .feature-btn',
			]
		);
		
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .feature-btn' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .feature-btn' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_border_radius',
			[
				'label' => __( 'Border Radius', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .feature-btn' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'btn_color_section',
			[
				'label' => __( 'Button Color Scheme Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-btn' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_color_hover',
			[
				'label' => __( 'Color on Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Background Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-btn' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .feature-btn::before' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_bg_hover',
			[
				'label' => __( 'Background Color on Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-btn:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .feature-btn::after' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_border',
			[
				'label' => __( 'Border', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .feature-btn' => 'border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_border_hover',
			[
				'label' => __( 'Border on Hover', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .feature-btn:hover' => 'border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'btn_border_color',
			[
				'label' => __( 'Border Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_border_color_hover',
			[
				'label' => __( 'Border Color on  Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-btn:hover' => 'border-color: {{VALUE}};',
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
		$settings = $this->get_settings(); 
		$this->add_render_attribute( 'subtitle','class','box-sub-title' );
		$this->add_inline_editing_attributes( 'title' , 'basic');
		$this->add_inline_editing_attributes( 'subtitle','basic' );
		$this->add_inline_editing_attributes( 'text','basic' );
		$this->add_render_attribute( 'title','class','icon-title' );
		$this->add_render_attribute( 'subtitle','class','icon-subtitle' );
		$this->add_render_attribute( 'text','class','icon-text' );
		$this->add_render_attribute( 'icon-align', 'class', 'feature-btn-align-icon-' . $settings['icon_align'] );
		$this->add_render_attribute( 'icon-align', 'class', 'feature-btn-button-icon' );
		?>
		
		<div class="<?php if ( $settings['icon_style'] != 'left' ) { echo 'box-small-icon'; }else {echo 'box-with-icon'; } ?> <?php if  ($settings['feature_style'] == '1') {echo "feature-1"; }elseif  ($settings['feature_style'] == '2') {echo "feature-2"; }elseif  ($settings['feature_style'] == '3') {echo "feature-3"; }else{echo "feature-4"; }?>">
		  <i class="trobica-icon fa <?php echo esc_attr( $settings['icon']); ?>"></i>
		  <?php if($settings['title']!=''){?>
		  <div class="cont">
		  <h3 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></h3>
		  <?php }?>
		  
		  <?php if ( $settings['subtitle'] != '' ) { ?>
		  <p <?php echo $this->get_render_attribute_string( 'subtitle' ); ?>><?php echo esc_attr( $settings['subtitle']); ?></p>
		  <?php } ?>
          
		  <div <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo wp_kses_post ( $settings['text']); ?></div>
		  
		  
		  
		  <?php if ( $settings['btn_text'] != '' && $settings['link']['url'] != '' ) { ?>
			  <a class="feature-btn" href="<?php echo esc_url( $settings['link']['url']); ?>">
              
			  	<?php if ( ! empty( $settings['icon_btn'] ) ) : ?>
                    <span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
                        <i class="<?php echo esc_attr( $settings['icon_btn'] ); ?>" aria-hidden="true"></i>
                    </span>
                <?php endif; ?>
                
			  	<?php echo esc_attr( $settings['btn_text']); ?>
              </a>  
		  <?php } ?>
		  
          
	  </div><!--/.cont-->
	  </div><!--/.box-small-icon-->
		
		
		
	<?php }

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


