<?php
/**
 * The template for displaying product content within loops
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$columns = wc_get_loop_prop('columns');
if (1 == $columns) {
    $grid = 'col-md-12';
}
elseif (2 == $columns) {
    $grid = 'col-md-6';
}
elseif (3 == $columns) {
    $grid = 'col-md-4';
}
elseif (4 == $columns) {
    $grid = 'col-md-3';
}
else {
    $grid = 'col-md-2';
}
?>
<div class="product <?php echo esc_attr($grid); ?>">
	<div class="product-single">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
		
		if ( $product->is_on_sale() ) : ?>
			<?php echo apply_filters( 'woocommerce_sale_flash', '<div class="sale-ribbon"><span class="tag-line">' . esc_html__( 'SALE', 'convo' ) . '</span></div>', $post, $product ); ?>
			<?php endif;
			
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );
		remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
		
		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</div>
</div>
