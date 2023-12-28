<?php
/**
 * Mini-cart
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

		<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="single-cart-box <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						<div class="cart-image">
							<a href="#"><?php echo $thumbnail; ?></a>
						</div>	
						<div class="cart-content">
							<div class="cart-heading">
								<a href="cart.html"> <span class="cart-qty"><?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?></span> </a>
							</div>                                        
							<div class="cart-price"><?php echo  $product_name; ?></div>
							
							
						
						<div class="cart-remove deft-remove-icon"><?php
						echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							__( 'Remove this item', 'convo' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						), $cart_item_key );
						?></span>
						</div>
					</div>
					</div>
					<?php
				}
			}

			do_action( 'woocommerce_mini_cart_contents' );
		?>
		<div class="cart-subtotal">
            <span class="subttl-text"><?php _e( 'Grand total', 'convo' ); ?></span><span class="subttl-amt"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
        </div>
		 <div class="cart-checkout-btn">
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="boxed-btn"><?php _e('Check out','convo'); ?> <i class="checkout-dir-icon fa fa-angle-right"></i></a>
        </div>
<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php _e( 'No products in the cart.', 'convo' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>


<?php 
/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<div class="header-cart-box-wrapper cart-position-style1">
	<?php if ( ! WC()->cart->is_empty() ) : ?>

		<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="single-cart-box <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						<div class="cart-image">
							<a href="#"><?php echo $thumbnail; ?></a>
						</div>	
						<div class="cart-content">
							<div class="cart-heading">
								<a href="cart.html"> <span class="cart-qty"><?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?></span> </a>
							</div>                                        
							<div class="cart-price"><?php echo  $product_name; ?></div>
							
							
						
						<div class="cart-remove deft-remove-icon"><?php
						echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							__( 'Remove this item', 'convo' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						), $cart_item_key );
						?></span>
						</div>
					</div>
					</div>
					<?php
				}
			}

			do_action( 'woocommerce_mini_cart_contents' );
		?>
		<div class="cart-subtotal">
            <span class="subttl-text"><?php _e( 'Grand total', 'convo' ); ?></span><span class="subttl-amt"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
        </div>
		 <div class="cart-checkout-btn">
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="boxed-btn"><?php _e('Check out','convo'); ?> <i class="checkout-dir-icon fa fa-angle-right"></i></a>
        </div>
	<?php else : ?>

		<p class="woocommerce-mini-cart__empty-message"><?php _e( 'No products in the cart.', 'convo' ); ?></p>

	<?php endif; ?>
	</div>
	<?php
	$fragments['div.header-cart-box-wrapper'] = ob_get_clean();
	return $fragments;
}
