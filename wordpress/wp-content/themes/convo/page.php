<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package convo
 */

get_header();
?>
<section class="section-padding">
	<div class="container">
		<div class="row padding-top-60 padding-bottom-60">			
			<?php 			
				if ( class_exists( 'woocommerce' ) ){						
					if( is_account_page() || is_checkout() ) {
						echo '<div id="primary-content" class="col-lg-12">'; 
					}else if(is_cart() || is_shop()) {
						echo '<div id="primary-content" class="col-lg-'.( !is_active_sidebar( "convo-sidebar-woocommerce" ) ?"12" :"8" ).'">';
					}else {
						echo '<div id="primary-content" class="col-lg-'.( !is_active_sidebar( "conceptly-sidebar-primary" ) ?"12" :"8" ).'">';				
					}
				}
				else
				{ 
					echo '<div id="primary-content" class="col-lg-'.( !is_active_sidebar( "conceptly-sidebar-primary" ) ?"12" :"8" ).'">';
				}  		
					if( have_posts()) :  the_post();
					
					the_content(); 
					endif;
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
				
				<!-- Pagination -->
				<?php		
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'convo' ),
						'after'  => '</div>',
					) );
					// Previous/next page navigation.
					the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
					'next_text'          => '<i class="fa fa-angle-double-right"></i>',
					) ); ?>
				<!-- Pagination -->
			</div>
			<?php 
				if ( class_exists( 'WooCommerce' ) ) {
					if( is_cart() || is_shop() ) {
					echo '<div  class="sidebar col-lg-4">'; 
						dynamic_sidebar('convo-sidebar-woocommerce');
					echo '</div>';
					}
					else if( is_account_page()  || is_checkout() ) {
					/* No Need of woocommerce Sidebar */
					}
					else{ 
						get_sidebar();
					}
				}
				else{ 
					get_sidebar();
				}
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>