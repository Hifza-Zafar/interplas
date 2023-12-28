<?php
namespace TrobicaPlugin\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		
/**
 * @since 1.0.0
 */
class Trobica_Post extends Widget_Base {

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
		return 'trobica-post';
	}
	
	//script depend
	public function get_script_depends() { return [ 'jquery-isotope','trobica-blog-masonry' ]; }
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
		return __( 'Trobica Post List Style 1', 'trobica_plg' );
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
		return 'eicon-post-list';
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
		return [ 'trobica-blog-elements' ];
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
				'label' => __( 'Blog Post Settings', 'trobica_plg' ),
			]
		);
		
		
	
		$this->add_control(
            'blog_post',
            [
                'label' => __( 'Blog Post to show', 'trobica_plg' ),
                'type' => Controls_Manager::NUMBER,
				'default' => '6',

            ]
        );
		
		$this->add_control(
			'sort_cat',
			[
				'label' => __( 'Sort post by Category', 'trobica_plg' ),
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
				'label'   => __( 'Category', 'trobica_plg' ),
				'type'    => Controls_Manager::SELECT2, 'options' => category_choice(),
				'condition' => [
					'sort_cat' => 'yes',
				],
				'multiple'   => 'true',
			]
		);
		
		$this->add_control(
			'paged_on',
			[
				'label' => __( 'Always show the same list on every page(not paged).', 'trobica_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => __( 'Yes', 'trobica_plg' ),
				'label_off' => __( 'No', 'trobica_plg' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Show Exerpt', 'trobica_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'trobica_plg' ),
				'label_off' => __( 'Hide', 'trobica_plg' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
            'excerpt',
            [
                'label' => __( 'Blog Excerpt Length', 'trobica_plg' ),
                'type' => Controls_Manager::NUMBER,
				'default' => '150',
				'min' => 10,
				'condition' => [
					'show_excerpt' => 'yes',
				],
            ]
        );

		$this->add_control(
            'excerpt_after',
            [
                'label' => __( 'After Excerpt text/symbol', 'trobica_plg' ),
                'type' => Controls_Manager::TEXT,
				'condition' => [
					'show_excerpt' => 'yes',
				],
				'default' => '...',
            ]
        );
		
		$this->add_control(
			'blog_column',
			[
				'label' => __( 'Blog Columns', 'trobica_plg' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => __( 'One Column', 'trobica_plg' ),
					'two' => __( 'Two Columns', 'trobica_plg' ),
					'three' => __( 'Three Columns', 'trobica_plg' ),
					'four' => __( 'Four Columns', 'trobica_plg' ),
				],
				'default' => 'three',
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Show Featured Image', 'trobica_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'trobica_plg' ),
				'label_off' => __( 'Hide', 'trobica_plg' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'button_show',
			[
				'label' => __( 'Show Button', 'trobica_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => __( 'Show', 'trobica_plg' ),
				'label_off' => __( 'Hide', 'trobica_plg' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
            'button',
            [
                'label' => __( 'Button Text', 'trobica_plg'),
                'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'trobica_plg' ),
				'label_block' => true,
				'condition' => [
					'button_show' => 'yes',
				],
            ]
        );
		
		$this->add_control(
			'icon',
			[
				'label' => __( 'Button Icon', 'trobica_plg' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
				'condition' => [
					'button_show' => 'yes',
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
				    'button_show' => 'yes',
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
					'button_show' => 'yes',
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .content-btn .content-btn-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .content-btn .content-btn-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'meta_show',
			[
				'label' => __( 'Show Post Meta', 'trobica_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'trobica_plg' ),
				'label_off' => __( 'Hide', 'trobica_plg' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'cat_show',
			[
				'label' => __( 'Show Post Category', 'trobica_plg' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'trobica_plg' ),
				'label_off' => __( 'Hide', 'trobica_plg' ),
				'return_value' => 'yes',
				'condition' => [
					'image' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'colors_warning',
					[
						'type' =>  Controls_Manager::RAW_HTML,
						'raw' => __( '<b>Note:</b> Try to show pagination only for (single) blog page.', 'trobica_plg' ),
						'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
						'condition' => [
							'paged_on' => '',
						],
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
					'paged_on' => '',
				],
			]
		);
		
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title Settings', 'trobica_plg' ),
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
					'{{WRAPPER}} .blog-post-list h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'title_typo',
				'label'     => __( 'Title Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .blog-post-list h3',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-post-list h3' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Color on Hover', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-post-list h3:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'text_section',
			[
				'label' => __( 'Text Settings', 'trobica_plg' ),
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
					'{{WRAPPER}} .blog-post-list p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'text_typo',
				'label'     => __( 'Text Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .blog-post-list p',
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .blog-post-list p' => 'color: {{VALUE}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'meta_section',
			[
				'label' => __( 'Post Meta Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'meta_show' => 'yes',
				],
			]
		);
		
		$this->add_responsive_control(
			'meta_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'meta_typo',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .post-meta',
			]
		);
		
		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-meta' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'meta_link',
			[
				'label' => __( 'Link Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-meta a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'meta_link_hover',
			[
				'label' => __( 'Link Color on Hover', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-meta a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'meta_icon',
			[
				'label' => __( 'Icon Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-meta .fa' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'cat_section_setting',
			[
				'label' => __( 'Post Category Settings', 'trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'cat_show' => 'yes',
				],
			]
		);
		
		$this->add_responsive_control(
			'cat_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cat-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'cat_typo',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .cat-post',
			]
		);
		
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Color', 'trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cat-post' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'btn_settings',
			[
				'label' => __( 'Button Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'button_show' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'btn_typography',
				'label'     => __( 'Typography', 'trobica_plg' ),
				'selector'  => '{{WRAPPER}} .content-btn',
			]
		);
		
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .content-btn' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .content-btn' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .content-btn' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'btn_color_section',
			[
				'label' => __( 'Button Color Scheme Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'button_show' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-btn' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_color_hover',
			[
				'label' => __( 'Color on Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Background Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-btn' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .content-btn::before' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_bg_hover',
			[
				'label' => __( 'Background Color on Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-btn:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .content-btn::after' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .content-btn' => 'border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .content-btn:hover' => 'border-width:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'btn_border_color',
			[
				'label' => __( 'Border Color','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_border_color_hover',
			[
				'label' => __( 'Border Color on  Hover','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-btn:hover' => 'border-color: {{VALUE}};',
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
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'content_padding_setting',
			[
				'label' => __( 'Text & Button Content Setting','trobica_plg' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'content_bg',
			[
				'label' => __( 'Background','trobica_plg' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .excerpt-box' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'excerpt_padding_box',
			[
				'label' => __( 'Padding', 'trobica_plg' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .excerpt-box' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .blog-col-inner',
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
		if ($settings['paged_on']  != 'yes') {
			$trobica_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		} else {
			$trobica_paged = '';
		}
		if ( $settings['sort_cat']  == 'yes' ) {
			$query = new \WP_Query(array(
				'posts_per_page'   => $settings['blog_post'],
				'paged' => $trobica_paged,
				'post_type' => 'post',
				'cat'=> $settings['blog_cat']
					
			)); 
		} else { 
			$query = new \WP_Query(array(
				'posts_per_page'   => $settings['blog_post'],
				'paged' => $trobica_paged,
				'post_type' => 'post'
			)); 	
			
		}
		$this->add_render_attribute( 'icon-align', 'class', 'content-btn-align-icon-' . $settings['icon_align'] );
		$this->add_render_attribute( 'icon-align', 'class', 'content-btn-button-icon' );
		
		?>
	        			<div class="blog-post-list row clearfix blog-body">
	                        <?php while ($query->have_posts()): $query->the_post(); ?> 
	                        <div class="<?php if  ($settings['blog_column'] == 'one') {echo "col-md-12"; } else if  ($settings['blog_column'] == 'two') {echo "col-md-6"; }
	                        if  ($settings['blog_column'] == 'three') {echo "col-md-4"; } if  ($settings['blog_column'] == 'four') {echo "col-md-3"; } ?>">
	                        	<div class="blog-col-inner">
									<?php if  ($settings['image'] == 'yes') { ?>
	                                <div class="blog-link-img"> 
	                                    <?php if ( has_post_thumbnail() ) {
	                                        the_post_thumbnail(); 
	                                        } else { ?>
	                                        <img alt="blog-image" src="<?php echo TROBICA_URL ?>images/no-image.jpg" />
	                                    <?php } ?>
	                                            
	                                     <?php if  ($settings['cat_show'] == 'yes') { ?>
	                                            <div class="cat-post">
	                                               <i class="fa fa-clone"></i> <?php the_category(' | '); ?>
	                                            </div>
	                                    <?php } ?>
	                                </div>
	                                <?php } ?>
	                                
	                                <div class="excerpt-box">
	                                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
	                                    
	                                    <?php if  ($settings['meta_show'] == 'yes') { ?>
	                                    <ul class="post-meta">
	                                        <li><i class="fa fa-user-o fw-700"></i> <?php the_author_posts_link(); ?></li>
	                                        <li><i class="fa fa-clock-o"></i> <?php echo get_the_date();  ?></li>
	                                    </ul>
	                                    <?php } ?>
	                                    
	                                    <?php if  ($settings['show_excerpt'] == 'yes') { ?>
	                                    <p>
	                                        <?php $excerpt = get_the_excerpt();
	                                        $excerpt = substr( $excerpt , 0,$settings['excerpt']); 
	                                        echo $excerpt;echo esc_attr ($settings['excerpt_after'])?>
	                                    </p>
	                                    <?php } ?>
	                                    
	                                    <?php if  ($settings['show_excerpt'] == 'yes' && $settings['button_show'] != 'yes') { ?>
	                                    <div class="spc-20 clearfix"></div>
	                                    <?php } ?>
	                                    
	                                    <?php if  ($settings['button_show'] == 'yes') { ?>
	                                        <div class="spc-20 clearboth"></div>
	                                        <a class="content-btn" href="<?php the_permalink(); ?>">
	                                        
	                                        <?php if ( ! empty( $settings['icon'] ) ) : ?>
	                                        <span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
	                                            <i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
	                                        </span>
	                                        <?php endif; ?>
	                                        
											<?php echo esc_attr ($settings['button']); ?>
	                                        </a>
	                                    <?php  } ?>
	                                </div>
	                                
	                            </div>
	                            <div class="spc-30 clearboth"></div>
	                        </div>
	                        
	                        <?php endwhile; wp_reset_postdata();?>
	                   </div>
                   
                   <!--pagination--> 
                   <?php  if ($settings['paged_on']  != 'yes') {
					   if  ($settings['page_show'] == 'yes') { 
					   		trobica_pagination($query->max_num_pages); 
					   } 
				   }		   

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
	protected function trobica_custom_pagination() {
		
		
	}
}


