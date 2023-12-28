 <!-- Start: Header
============================= -->
<?php
	$convo_hide_show_search		= get_theme_mod('hide_show_search','1');
	$conceptly_header_search	= get_theme_mod('header_search','fa-search'); 
	$hide_show_cart				= get_theme_mod('hide_show_cart','1');
?>
<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php echo esc_url( get_header_image() ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>

    <!-- Start: Navigation
    ============================= -->
    <header id="header-section" class="header active-convo">

    	<?php do_action( 'conceptly_above_header');  ?>

    	<div class="navigator-wrapper">
    		<div class="theme-mobile-nav d-lg-none d-block <?php echo esc_attr(conceptly_sticky_menu()); ?>">        
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="theme-mobile-menu">
								<div class="logo">
									<?php
										if(has_custom_logo())
										{	
											the_custom_logo();
										} 
										
										$convo_site_title = get_bloginfo( 'name');
										if ($convo_site_title) :
									?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<h4 class="site-title">
												<?php echo esc_html($convo_site_title);  ?>
											</h4>	
										</a>
									<?php endif; ?>
									<?php
										$convo_site_desc = get_bloginfo( 'description');
										if ($convo_site_desc) : ?>
											<p class="site-description"><?php echo esc_html($convo_site_desc); ?></p>
									<?php endif; ?>
		                        </div>		
								<div class="menu-toggle-wrap">
									<div class="mobile-menu-right"></div>
									<div class="hamburger-menu">
										<button type="button" class="menu-toggle">
											<div class="top-bun"></div>
											<div class="meat"></div>
											<div class="bottom-bun"></div>
										</button>
									</div>
								</div>
								<div id="mobile-m" class="mobile-menu">
									<button type="button" class="header-close-menu close-style"></button>
								</div>
							</div>
						</div>
					</div>
				</div>        
		    </div>
    		<div class="nav-area d-none d-lg-block">
		        <div class="navbar-area <?php echo esc_attr(conceptly_sticky_menu()); ?>">
		            <div class="container">
		                <div class="row">
		                    <div class="col-lg-3 col-6">
		                        <div class="logo">
									<?php
										if(has_custom_logo())
										{	
											the_custom_logo();
										} 
										
										$convo_site_title = get_bloginfo( 'name');
										if ($convo_site_title) :
									?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<h4 class="site-title">
												<?php echo esc_html($convo_site_title);  ?>
											</h4>	
										</a>
									<?php endif; ?>
									<?php
										$convo_site_desc = get_bloginfo( 'description');
										if ($convo_site_desc) : ?>
											<p class="site-description"><?php echo esc_html($convo_site_desc); ?></p>
									<?php endif; ?>
		                        </div>
		                    </div>
		                    <div class="col-lg-9">
		                    	<div class="theme-menu">
			                        <nav class="menubar">
			                            <?php 
											wp_nav_menu( 
												array(  
													'theme_location' => 'primary_menu',
													'container'  => '',
													'menu_class' => 'menu-wrap',
													'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
													'walker' => new WP_Bootstrap_Navwalker()
													 ) 
												);
										?>
			                        </nav>	
			                        <div class="menu-right">			
				                        <ul class="header-wrap-right">
											<?php if($convo_hide_show_search =='1'){ ?>
											<li class="search-button">
												<button id="view-search-btn" class="header-search-toggle"><i class="fa <?php  echo esc_attr( $conceptly_header_search ); ?>"></i></button>												
											</li>

										<?php } if($hide_show_cart =='1'){ ?>
										<?php if ( class_exists( 'WooCommerce' ) ) { ?>
										<li class="cart-icon d-none d-lg-block">
				                            <div class="cart-icon-wrapper">	
													<div class="cart-wrap">
														<i class="fa fa-shopping-cart"></i>
													</div>
													<a href="#" class="cart-title">
														<h6><?php echo esc_html('Shopping Cart'); ?></h6>
														<?php 
															if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
																$count = WC()->cart->cart_contents_count;
																$cart_url = wc_get_cart_url();
																
																if ( $count > 0 ) {
																?>
																	<p><?php echo esc_html( $count ); ?> item - <?php echo WC()->cart->get_cart_subtotal(); ?></p>
																<?php 
																}
																else {
																	?>
																	 <p><?php echo esc_html__('0 item - $0.00','convo'); ?></p>
																	<?php 
																}
															}
														?>
													</a>
				                            </div>
												<div class="header-cart-box-wrapper cart-position-style1">
														<?php get_template_part('woocommerce/cart/mini','cart');	 ?>
												</div>
										</li>
										<?php } } ?>	
				                        </ul>
				                    </div>
			                    </div>
		                    </div>
						</div>
			        </div>
		        </div>
		    </div>
	    </div>
    </header>
    <!-- Quik search -->
	<div class="view-search-btn header-search-popup">
		<div class="search-overlay-layer"></div>
		<div class="search-overlay-layer"></div>
		<div class="search-overlay-layer"></div>
        <button type="button" class="close-style header-search-close"></button>
	    <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Site Search', 'convo' ); ?>">
	        <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'convo' ); ?></span>
	        <input type="search" class="search-field header-search-field" placeholder="<?php esc_attr_e( 'Type To Search', 'convo' ); ?>" name="s" id="popfocus" value="" autofocus>
	        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	    </form>
	</div>
	<!-- / -->
    <!-- End: Navigation
    ============================= -->
<?php 
if ( !is_page_template( 'templates/template-homepage.php' ) ) {
	conceptly_breadcrumbs_style();  
}