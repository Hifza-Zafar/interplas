<?php
namespace TrobicaPlugin\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.0.0
 */
class Dsc_Slider extends Widget_Base {

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
		return 'dsc-slider';
	}
	
	//script depend
	public function get_script_depends() { return [ 'jquery-slick','trobica-animation','trobica-slider-script' ]; }

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
		return __( 'Trobica Slider', 'trobica_plg' );
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
		return 'eicon-slideshow';
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
				'label' => __( 'Slider Settings', 'trobica_plg' ),
			]
		);

		$this->add_control(
			'slider_style',
			[
				'label' => __( 'Style', 'trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => __( 'Style One', 'trobica_plg' ),
					'2' => __( 'Style Two', 'trobica_plg' ),
					'3' => __( 'Style Three', 'trobica_plg' ),
				],
				'default' => '1',
			]
		);
		
		
		
		$this->add_control(
			'slider_list',
			[
				'label' => __( 'Slider List', 'trobica_plg' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title' => __( 'Slider Heading Title', 'trobica_plg' ),
						'subtitle' => __( 'Slider subtitle', 'trobica_plg' ),
						'text' => __( 'Slider text', 'trobica_plg' ),
					],
					[
						'title' => __( 'Slider Heading Title', 'trobica_plg' ),
						'subtitle' => __( 'Slider subtitle', 'trobica_plg' ),
						'text' => __( 'Slider text', 'trobica_plg' ),
					],
					[
						'title' => __( 'Slider Heading Title', 'trobica_plg' ),
						'subtitle' => __( 'Slider subtitle', 'trobica_plg' ),
						'text' => __( 'Slider text', 'trobica_plg' ),
					],
				],
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Slider Heading Title', 'trobica_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Insert your slider heading title here..', 'trobica_plg' ),
						'default' => __( 'Slider Heading Title' ,  'trobica_plg'  ),
					],
					[
						'name' => 'subtitle',
						'label' => __( 'Slider Subtitle', 'trobica_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Insert your slider subtitle here..', 'trobica_plg' ),
						'default' => __( 'Slider Subtitle' ,  'trobica_plg'  ),
					],
					[
						'name' => 'text',
						'label' => __( 'Slider Text', 'trobica_plg' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => __( 'Slider Text' ,  'trobica_plg' ),
					],
					[
						'name' => 'btn_text',
						'label' => __( 'Button Text', 'trobica_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'trobica_plg' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'Leave it blank if you don\'t need this button', 'trobica_plg' ),
					],
					[
						'name' => 'btn_text2',
						'label' => __( 'Button Text', 'trobica_plg' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'btn_link2',
						'label' => __( 'Button Link', 'trobica_plg' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'placeholder' => __( 'Leave it blank if you don\'t need this button', 'trobica_plg' ),
					],
					[
						'name' => 'image',
						'label' => __( 'Slider Image', 'trobica_plg' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->add_responsive_control(
			'slider_width',
			[
				'label' => __( 'Slider Container Max Width (px)', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>100,
						'max' => 4000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-box ' => 'max-width: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_responsive_control(
			'slider_content',
			[
				'label' => __( 'Slider Content Max Width (px)', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>100,
						'max' => 4000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-content ' => 'max-width: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_responsive_control(
			'slider_height',
			[
				'label' => __( 'Slider Top Padding (%)', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-box ' => 'padding-top: {{SIZE}}%;',
				],
			]
		);
		
		$this->add_responsive_control(
			'slider_height_bottom',
			[
				'label' => __( 'Slider Bottom Padding (%)', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-box ' => 'padding-bottom: {{SIZE}}%;',
				],
			]
		);
		
		$this->add_control(
			'slider_speed',
			[
				'label' => __( 'Slider Speed', 'trobica_plg' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'frontend_available' => true,
			]
		);
		
		$this->add_control(
			'show_line',
			[
				'label' => __( 'Show Line','trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'show' => __( 'Show','trobica_plg' ),
					'hide' => __( 'Hide','trobica_plg' ),
				],
				'default' => 'show',
			]
		);
		
		$this->add_control(
			'pos_line',
			[
				'label' => __( 'Line Position','trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top','trobica_plg' ),
					'bottom' => __( 'Bottom','trobica_plg' ),
				],
				'default' => 'bottom',
				'condition' => [
					'show_line' => 'show',
				],
			]
			
		);
		
		$this->add_control(
			'show_arrows',
			[
				'label' => __( 'Show Arrows','trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'visible' => __( 'Show','trobica_plg' ),
					'hidden' => __( 'Hide','trobica_plg' ),
				],
				'default' => 'visible',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow' => 'visibility: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Slider Alignment', 'trobica_plg' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'trobica_plg' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'trobica_plg' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'trobica_plg'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .slider-box' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Slider Title Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typo',
				'label'     => __( 'Title Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .slider-title',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'title_bgcolor',
			[
				'label' => __( 'Background Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-title' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'title_type',
			[
				'label' => __( 'Title Display','trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'block' => __( 'Block','trobica_plg' ),
					'inline-block' => __( 'Inline Block','trobica_plg' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .slider-title' => 'display: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'subtitle_section',
			[
				'label' => __( 'Slider Subtitle Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_padding',
			[
				'label' => __( 'Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'subtitle_typo',
				'label'     => __( 'Subtitle Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .slider-subtitle',
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'subtitle_bgcolor',
			[
				'label' => __( 'Background Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-subtitle' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'subtitle_type',
			[
				'label' => __( 'Subtitle Display','trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'block' => __( 'Block','trobica_plg' ),
					'inline-block' => __( 'Inline Block','trobica_plg' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .slider-subtitle' => 'display: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'textsetting_section',
			[
				'label' => __( 'Slider Text Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'text_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'text_padding',
			[
				'label' => __( 'Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'text_width',
			[
				'label' => __( 'Width', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' =>10,
						'max' => 2000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-text' =>'width: {{SIZE}}{{UNIT}};max-width:100%;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'text_typo',
				'label'     => __( 'Text Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .slider-text',
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_bgcolor',
			[
				'label' => __( 'Background Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-text' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'text_type',
			[
				'label' => __( 'Subtitle Display','trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'block' => __( 'Block','trobica_plg' ),
					'inline-block' => __( 'Inline Block','trobica_plg' ),
					'none' => __( 'None','trobica_plg' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .slider-text' => 'display: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'sl_line_section',
			[
				'label' => __( 'Slider Line Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_line' => 'show',
				],
			]
		);
		
		$this->add_responsive_control(
			'line_width',
			[
				'label' => __( 'Slider Line Width', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>10,
						'max' => 2000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-line ' => 'width: {{SIZE}}px;max-width:100%;',
				],
			]
		);
		
		$this->add_responsive_control(
			'line_height',
			[
				'label' => __( 'Slider Line Height', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>10,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-line ' => 'height: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'line_top_position',
			[
				'label' => __( 'Slider Line Top Position', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>-100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider-line ' => 'top: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_control(
			'linecolor',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-line' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'line_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-line' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
		
		$this->add_control(
			'icon',
			[
				'label' => __( 'Button Icon', 'trobica_plg' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
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
					'icon!' => '',
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
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .slider-btn .content-btn-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .slider-btn .content-btn-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'btn_typography',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .slider-btn',
			]
		);
		
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .slider-btn' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .slider-btn' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'btn_color_1',
			[
				'label' => __( 'Color 1','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_color_2',
			[
				'label' => __( 'Color 2','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style2' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_color_hover_1',
			[
				'label' => __( 'Color on Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style1:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_color_hover_2',
			[
				'label' => __( 'Color on Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style2:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_bg_1',
			[
				'label' => __( 'Background Color btn 1','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style1' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_2',
			[
				'label' => __( 'Background Color btn 2','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style2' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_bg_hover_1',
			[
				'label' => __( 'Background Color on Hover 1','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style1:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .dsc-btn-style1::after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_hover_2',
			[
				'label' => __( 'Background Color on Hover 2','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style2:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .dsc-btn-style2::after' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .slider-btn' => 'border-style:solid;border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					
				],
			]
		);
		
		$this->add_responsive_control(
			'btn_border_hover_1',
			[
				'label' => __( 'Border on Hover', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style1:hover' => 'border-style:solid;border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					
				],
			]
		);
		$this->add_responsive_control(
			'btn_border_hover_2',
			[
				'label' => __( 'Border on Hover', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style2:hover' => 'border-style:solid;border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					
				],
			]
		);
		
		$this->add_control(
			'btn_border_color',
			[
				'label' => __( 'Border Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_border_color_hover_1',
			[
				'label' => __( 'Border Color on  Hover 1','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style1:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_border_color_hover_2',
			[
				'label' => __( 'Border Color on  Hover 2','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dsc-btn-style2:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'sl_mask',
			[
				'label' => __( 'Slider Mask Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'slider_mask',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider-mask' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'sl_arrow',
			[
				'label' => __( 'Slider Arrows Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_arrows' => 'visible',
				],
			]
		);
		
		$this->add_responsive_control(
			'arrow_width',
			[
				'label' => __( 'Slider arrow size', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>10,
						'max' => 400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow ' => 'width: {{SIZE}}px;height: {{SIZE}}px;line-height: {{SIZE}}px;',
					'{{WRAPPER}} .home-slider .fa.fa-angle-right.slick-arrow' => 'left: {{SIZE}}px;',
				],
			]
		);
		
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'arrow_color_hover',
			[
				'label' => __( 'Color on Hover', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_bg_color',
			[
				'label' => __( 'Background Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_bg_color_hover',
			[
				'label' => __( 'Background Color on Hover', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider .slick-arrow:hover' => 'background: {{VALUE}};',
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
		$this->add_render_attribute( 'icon-align', 'class', 'content-btn-align-icon-' . $settings['icon_align'] );
		$this->add_render_attribute( 'icon-align', 'class', 'content-btn-button-icon' );
		
		?>
        
        
        <div class="slider home-slider  ani-slider  clearfix <?php if  ($settings['slider_style'] == '2') {echo "slider-style-2"; } else if  ($settings['slider_style'] == '3') {echo "slider-style-3"; }?>" data-slick='{"autoplaySpeed": <?php echo esc_attr ( $settings['slider_speed'] )?>}'>
        
			<?php foreach ( $settings['slider_list'] as $index => $item ) : ?> 
                
                <div class="item slide clearfix">
                
                  <div class="slider-img-bg" data-animation="puffIn" data-delay="0.2s" data-animation-duration="0.7s"  
                  style="background-image:url(<?php echo esc_url ( $item['image']['url']); ?>);" ></div>
                  
                  <div class="slider-mask" data-animation="slideUpReturn" data-delay="0.1s"></div>
                  
                  <div class="caption-box clearfix">
                      
                      <div class="slider-box container">
                      <div class="slider-content">
                      
                      	  <?php if ( $item['subtitle']){?>
                          <p class="slider-subtitle" data-animation="fadeIn" data-delay="1.5s">
                              <?php echo wp_kses_post ( $item['subtitle']) ; ?>
                          </p>
                          <?php } ?>
                          
                          <?php if ( $settings['show_line'] == 'show' && $settings['pos_line'] == 'top' ){?>
                          <div class="slider-line"  data-animation="swashIn" data-delay="0.5s"></div>
                          <?php } ?>
                          
                          <div class="slider-hidden">
                              <h3 class="slider-title" data-animation="fadeInUp" data-delay="0.8s"><?php echo wp_kses_post ( $item['title'] ); ?></h3>
                          </div><!--/.slider-hidden-->
                          
                          <?php if ( $settings['show_line'] == 'show' && $settings['pos_line'] == 'bottom' ){?>
                          <div class="slider-line"  data-animation="swashIn" data-delay="0.5s"></div>
                          <?php } ?>
                          
                          <?php if ( $item['text']){?>
                          <p class="slider-text" data-animation="fadeInDown" data-delay="1s">
                              <?php echo wp_kses_post ( $item['text']) ; ?>
                          </p>
                          <?php } ?>
                          
                          <?php if ( $item['btn_link'] && $item['btn_text']){ ?>
                              <div class="btn-relative" data-animation="swashIn" data-delay="1.8s" data-animation-duration="1s">
                                <?php if ( ! empty( $item['btn_link']['url'] ) ) {
									$link_key = 'link_' . $index;
			
									$this->add_render_attribute( $link_key, 'href', $item['btn_link']['url'] );
			
									if ( $item['btn_link']['is_external'] ) {
										$this->add_render_attribute( $link_key, 'target','_blank' );
									}
			
									if ( $item['btn_link']['nofollow'] ) {
										$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
									}
			
									echo '<a class="slider-btn dsc-btn-style1" ' . $this->get_render_attribute_string( $link_key ) . '>';
								} ?>
                                	<?php if ( ! empty( $settings['icon'] ) ) : ?>
                                        <span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
                                            <i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
                                        </span>
                                    <?php endif; ?>
                                        
                                 	<?php echo esc_attr ( $item['btn_text'] ) ; ?>
                                 </a> 
                              </div><!--/.btn-relative-->
                          <?php } ?>
                          <?php if ( $item['btn_link2'] && $item['btn_text2']){ ?>
                              <div class="btn-relative" data-animation="swashIn" data-delay="1.8s" data-animation-duration="1s">
                                <?php if ( ! empty( $item['btn_link2']['url'] ) ) {
									$link_key2 = 'link_' . $index;
			
			
									if ( $item['btn_link2']['is_external'] ) {
										$this->add_render_attribute( $link_key, 'target','_blank' );
									}
			
									if ( $item['btn_link2']['nofollow'] ) {
										$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
									}
			
									echo '<a class="slider-btn dsc-btn-style2" ' . $this->get_render_attribute_string( $link_key ) . '>';
								} ?>
                                	<?php if ( ! empty( $settings['icon'] ) ) : ?>
                                        <span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
                                            <i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
                                        </span>
                                    <?php endif; ?> 
                                        
                                 	<?php echo esc_attr ( $item['btn_text2'] ) ; ?>
                                 </a> 
                              </div><!--/.btn-relative-->
                          <?php } ?>
                              
                      </div><!--/.slider-content-->
                  </div><!--/.slider-box-->
                  
                     
                      
                  </div><!--/.caption-box-->
                </div><!--/.slide-->
				
				<?php
				
			endforeach; 
			
			?>
		</div>
		
		
		<?php
	
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


