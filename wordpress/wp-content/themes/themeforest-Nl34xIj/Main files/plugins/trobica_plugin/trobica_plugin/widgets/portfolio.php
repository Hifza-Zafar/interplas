<?php
namespace TrobicaPlugin\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.0.0
 */
class Trobica_Portfolio extends Widget_Base {

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
		return 'trobica-portfolio';
	}
	
	//script depend
	public function get_script_depends() { return [ 'jquery-isotope','trobica-portfolio' ]; }
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
		return __( 'Trobica Portfolio', 'trobica_plg' );
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
		return 'fa fa-clone';
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
				'label' => __( 'Portfolio Settings.', 'trobica_plg' ),
			]
		);
		
		$this->add_control(
			'port_style',
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
		
		$this->add_responsive_control(
			'filter',
			[
				'label' => __( 'Filter', 'trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'block' => __( 'Show', 'trobica_plg' ),
					'none' => __( 'Hide', 'trobica_plg' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .filter-tab' => 'display: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'filter_align',
			[
				'label' => __( 'Filter Alignment', 'trobica_plg' ),
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
					'{{WRAPPER}} .filter-tab' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		
		$this->add_control(
			'portfolio_item',
			[
				'label' => __( 'Item to display', 'trobica_plg' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '8',
			]
		);
		
		$this->add_control(
			'sort_cat',
			[
				'label' => __( 'Sort Portfolio by Portfolio Category', 'trobica_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'trobica_plg' ),
				'label_off' => __( 'No', 'trobica_plg' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'blog_cat',
			[
				'label'   => __( 'Category to Show', 'trobica_plg' ),
				'type'    => Controls_Manager::SELECT2, 'options' => tax_choice(),
				'condition' => [
					'sort_cat' => 'yes',
				],
				'multiple'   => 'true',
			]
		);
		
		$this->add_control(
			'port_order',
			[
				'label' => __( 'Orders', 'trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'DESC' => __( 'Descending', 'trobica_plg' ),
					'ASC' => __( 'Ascending', 'trobica_plg' ),
					'rand' => __( 'Random', 'trobica_plg' ),
				],
				'default' => 'DESC',
			]
		);
		
		
		$this->add_control(
			'port_column',
			[
				'label' => __( 'Columns', 'trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'2' => __( 'Two Columns', 'trobica_plg' ),
					'3' => __( 'Three Columns', 'trobica_plg' ),
					'4' => __( 'Four Columns', 'trobica_plg' ),
				],
				'default' => '3',
			]
		);
		
		$this->add_control(
			'page_show',
			[
				'label' => __( 'Show Pagination', 'trobica_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => __( 'Show', 'trobica_plg' ),
				'label_off' => __( 'Hide', 'trobica_plg' ),
				'return_value' => 'yes',
				'condition' => [
					'sort_cat!' => 'yes',
				],
			]
		);
		
		$this->add_responsive_control(
			'page_align',
			[
				'label' => __( 'Pagination Alignment', 'trobica_plg' ),
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
				'condition' => [
					'page_show' => 'yes',
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .pagi-box' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'portfolio_styling',
			[
				'label' => __( '<div style="padding:10px 0;">Portfolio Item Settings.  <br/><small style="font-weight:normal;">You can click the (All) filter to refresh the layout when you change the Height settings.</small></div>', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'portfolio_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-inner' => 'margin: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .portfolio-body' => 'margin: -{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'portfolio_height',
			[
				'label' => __( 'Height', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-box' => 'padding: {{SIZE}}% 0;',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		
		$this->add_responsive_control(
			'port_content',
			[
				'label' => __( 'Content Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'port_padding',
			[
				'label' => __( 'Content Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'bg_content',
			[
				'label' => __( 'Content Background', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'port_style' => '1',
				],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'content_align',
			[
				'label' => __( 'Alignment', 'trobica_plg' ),
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
						'title' => __( 'Right', 'trobica_plg' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_typo',
			[
				'label' => __( 'Title Content Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'cport_typography',
				'label'     => __( 'Title Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .dbox-relative h3',
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
					'{{WRAPPER}} .dbox-relative h3' => 'display: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_cl',
			[
				'label' => __( 'Title Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_bgl',
			[
				'label' => __( 'Title Background Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative h3' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'titlep_padding',
			[
				'label' => __( 'Title Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'titlep_margin',
			[
				'label' => __( 'Title Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'sub_typo',
			[
				'label' => __( 'Category/Text Content Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'ctext_typography',
				'label'     => __( 'Text Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .dbox-relative p',
			]
		);
		
		$this->add_control(
			'text_type',
			[
				'label' => __( 'Text Display','trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'block' => __( 'Block','trobica_plg' ),
					'inline-block' => __( 'Inline Block','trobica_plg' ),
				],
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'display: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'txt_cl',
			[
				'label' => __( 'Text Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'txt_bg',
			[
				'label' => __( 'Text Background Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'tx_padding',
			[
				'label' => __( 'Text Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'tx_margin',
			[
				'label' => __( 'Text Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbox-relative p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Filter Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'filter_typography',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .port-filter a',
			]
		);
		
		$this->add_responsive_control(
			'filter_margin',
			[
				'label' => __( 'Filter Container Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .port-filter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'filter_padding',
			[
				'label' => __( 'Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->add_responsive_control(
			'filter_linkmargin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'filter_border_radius',
			[
				'label' => __( 'Border Radius', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'color_def',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'color_bgdef',
			[
				'label' => __( 'Background Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-filter a' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'color_hov',
			[
				'label' => __( 'Color on Hover & Active', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-filter a.active' => 'color: {{VALUE}};',
					'{{WRAPPER}} .port-filter a:hover' => 'color: {{VALUE}};'
				],
			]
		);
		
		$this->add_control(
			'color_bgdefhover',
			[
				'label' => __( 'Background Color on Hover & Active', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-filter a.active' => 'background: {{VALUE}};',
					'{{WRAPPER}} .port-filter a::before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .port-filter a::after' => 'background: {{VALUE}};',
					'{{WRAPPER}} .port-filter a:hover' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .port-filter a',
				'separator' => 'before',
			]
		);
		
		
		
		$this->add_control(
			'color_borderhover',
			[
				'label' => __( 'Border Color on Hover & Active', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-filter a:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .port-filter a.active' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'port_mask',
			[
				'label' => __( 'Portfolio Mask Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'mask_color',
			[
				'label' => __( 'Mask Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .port-box' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'mask_color2',
			[
				'label' => __( 'Second Mask Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .port-box::after' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'mask_post2',
			[
				'label' => __( 'Second Mask Top Posisition (on hover)', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>-200,
						'max' => 200,
						'step' =>1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .port-box::after' => 'top: {{SIZE}}%;',
				],
			]
		);
		
		$this->add_control(
			'mask_color_opacity',
			[
				'label' => __( 'Mask Color Opacity (on hover)', 'trobica_plg' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>0,
						'max' => 1,
						'step' =>0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .port-inner:hover .port-box' => 'opacity: {{SIZE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'pagination_setting',
			[
				'label' => __( 'Pagination Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'page_color',
			[
				'label' => __( 'Pagination Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination > li > a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'page_color_hover',
			[
				'label' => __( 'Pagination Color on Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination > li > a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'page_color_bg',
			[
				'label' => __( 'Pagination Background Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination > li > a' => 'background-color: {{VALUE}};border-color:{{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'page_color_hover_bg',
			[
				'label' => __( 'Pagination Background Color on Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination > li > a:hover' => 'background-color: {{VALUE}};border-color:{{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'page_color_active',
			[
				'label' => __( 'Pagination Color on Active','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination > .active > a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'page_color_hover_bg_active',
			[
				'label' => __( 'Pagination Background Color on Active','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination > .active > a' => 'background-color: {{VALUE}};border-color:{{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'pagi_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		<div class="filter-tab">
	        <ul class="port-filter center-port-filter">
	                            
				<?php
	            $destudio_taxonomy = 'portfolio_category';
	            $destudio_terms = get_terms($destudio_taxonomy); // Get all terms of a taxonomy
	            if ( $destudio_terms && !is_wp_error( $destudio_terms ) ) : ?>
	            <li>
	                <a class="active" href="#" data-filter="*">
	                    <?php if ( class_exists('ReduxFrameworkPlugin')&& trobica_option( 'trobica_portfolio_all') ) { 
	                    echo esc_attr( trobica_option( 'trobica_portfolio_all'));} else { esc_html_e('Show All','trobica_plg'); } ?>
	                </a>
	            </li>
	            <?php foreach ( $destudio_terms as $destudio_term ) { ?>
	                <li><a data-filter=".<?php echo  strtolower(preg_replace('/[^a-zA-Z]+/','-', $destudio_term->name)); ?>" href="#">
	                <?php echo esc_attr( $destudio_term->name); ?></a></li>
	            <?php } 
	            endif;?> 
	        </ul>
        </div>
		
        
   
   		<div class="portfolio-body clearfix standard-port <?php if  ($settings['port_style'] == '2') {echo "portfolio-2"; } else if  ($settings['port_style'] == '3') {echo "portfolio-type-three"; }?>">
			<?php 
			$trobica_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			if ($settings['port_order'] != 'rand') {
				$order = 'order';
				$ord_val = $settings['port_order'];
			} else {
				$order = 'orderby';
				$ord_val = 'rand';
			}
			
			if ( $settings['sort_cat']  == 'yes' ) {
				$destudio_work = new \WP_Query(array(
					'posts_per_page'   => $settings['portfolio_item'],
					'post_type' =>  'portfolio', 'trobica_plg',
					$order       =>  $ord_val,
					'tax_query' => array(
						array(
							'taxonomy' => 'portfolio_category',   // taxonomy name
							'field' => 'term_id',
							'terms' => $settings['blog_cat'],           // term_id, slug or name                // term id, term slug or term name
						)
					)
				)); 
			} else {
				$destudio_work = new \WP_Query(array(
				    'paged' => $trobica_paged,
					'posts_per_page'   => $settings['portfolio_item'],
					'post_type' =>  'portfolio', 'trobica_plg',
					$order       =>  $ord_val
				)); 
			}
			
            if ($destudio_work->have_posts()) : while  ($destudio_work->have_posts()) : $destudio_work->the_post();
            global $post ;
            
            ?>
            
            <div class="<?php if  ($settings['port_column'] == '3') {echo "col-md-4"; } else if  ($settings['port_column'] == '2') {echo "col-md-6"; } else  {echo "col-md-3"; } ?>
             port-item <?php $destudio_terms = get_the_terms( get_the_ID(), 'portfolio_category' ); if(is_array($destudio_terms) && count($destudio_terms) > 0) { foreach ($destudio_terms as $destudio_term) { 
            echo  strtolower(preg_replace('/[^a-zA-Z]+/', '-', $destudio_term->name)). ' '; } }
            $destudio_allClasses = get_post_class(); foreach ($destudio_allClasses as $destudio_class) { 
            echo esc_attr( $destudio_class . " "); } ?><?php if  ($settings['port_style'] == '2') {echo "pb-30"; }?>" id="post-<?php the_ID(); ?>">
               
                <div class="port-inner">
                    <div class="port-box"></div>
                    <div class="port-img width-img img-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
                    <div class="img-mask"></div>
                    <div class="port-dbox">
                        <div class="dbox-relative">
                        	<?php if  ($settings['port_style'] == '3') {?>
                            <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="popup-img port-icon"> 
                                <span class="icon"><i class="fa fa-search"></i></span>
                             </a>
                             <?php }?>
                            <h3><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
                            <div class="cleaboth clearfix"></div>
                            <?php $destudio_taxonomy = 'portfolio_category'; 
                                $destudio_taxs = wp_get_post_terms($post->ID,$destudio_taxonomy);  ?> 
                            <p><?php $destudio_cats = array();  foreach ( $destudio_taxs as $destudio_tax ) { $destudio_cats[] =   $destudio_tax->name ;   } 
                            echo implode(' / ', $destudio_cats);?></p>
                        </div><!--/.dbox-relative-->
                        <?php if  ($settings['port_style'] == '2') {?>
	                     <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="popup-img port-icon"> 
	                        <span class="icon"><i class="fa fa-search"></i></span>
	                    <?php }?>
	                     </a>
                    </div><!--/.port-dbox-->
                </div><!--/.port-inner-->                
                
            </div><!--.port-item-->
           
           <?php endwhile;  ?>
			
				   <!--pagination--> 
                   <?php  
				   if  ($settings['page_show'] == 'yes' && $settings['sort_cat']  != 'yes' ) {  ?>
				   <div class="pagi-box clearfix
                   <?php
							$destudio_taxonomy = 'portfolio_category';
							$destudio_terms = get_terms($destudio_taxonomy); // Get all terms of a taxonomy
							if ( $destudio_terms && !is_wp_error( $destudio_terms ) ) :
								foreach ( $destudio_terms as $destudio_term ) { ?>
										<?php echo  strtolower(preg_replace('/[^a-zA-Z]+/', '-', $destudio_term->name)); ?>
									<?php } 
							endif;?>">
						<?php trobica_pagination($destudio_work->max_num_pages);  ?>
					</div>
					   
				   <?php };
				   
			else: ?>
            
            <div class="alert alert-warning"><?php _e('There is no Portfolio Post Found. You need to  choose the portfolio category to show or create at least 1 portfolio post first.','trobica-plg'); ?></div>
            <?php endif;  wp_reset_postdata();  ?>
                          
                            
        </div><!--/.portfolio-body-->
                        
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



