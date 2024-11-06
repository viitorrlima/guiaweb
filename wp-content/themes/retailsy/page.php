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
 * @package retailsy
 */

get_header(); 
?>
<div class="blog-details mt-default mb-default">
	<div class="jcs-container">
		<div class="complete-page-lsb jcs-row align-items-start g-30 blog-details-page">
			<?php if ( class_exists( 'woocommerce' ) ){
						
					if( is_account_page() || is_cart() || is_checkout() ) {
							echo '<div id="st-primary-content" class="col-lg-'.( !is_active_sidebar( "retailsy-woocommerce-sidebar" ) ?"12" :"8" ).'">'; 
					}
					else{ 
				
					echo '<div id="st-primary-content" class="col-lg-'.( !is_active_sidebar( "retailsy-sidebar-primary" ) ?"12" :"8" ).'">'; 
					
					}
				}
				else
				{ 
					echo '<div id="st-primary-content" class="col-lg-'.( !is_active_sidebar( "retailsy-sidebar-primary" ) ?"12" :"8" ).' ">';
				} 	 ?>	
				<div class="blog-page main">
					<div class="jcs-container">
						<div class="jcs-row align-items-start g-30">
							<div class="col-lg-12 col-md-12">
								<?php 		
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
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'retailsy' ),
										'after'  => '</div>',
									) );
									// Previous/next page navigation.
									the_posts_pagination( array(
									'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
									'next_text'          => '<i class="fa fa-angle-double-right"></i>',
									) ); ?>
								<!-- Pagination -->	

							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						get_sidebar('woocommerce');
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
</div>	
<?php get_footer(); ?>