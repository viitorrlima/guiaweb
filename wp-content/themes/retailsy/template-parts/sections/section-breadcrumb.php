<?php 
$retailsy_hs_breadcrumb		= get_theme_mod('hs_breadcrumb','1');
if($retailsy_hs_breadcrumb == '1') {	
?>
<section class="bread-title">
	<div class="jcs-container">
		<div class="page-name">
			<?php 
				if ( is_home() || is_front_page()):

					single_post_title();
			
				elseif ( is_day() ) : 
				
					printf( __( 'Daily Archives: %s', 'retailsy' ), get_the_date() );
				
				elseif ( is_month() ) :
				
					printf( __( 'Monthly Archives: %s', 'retailsy' ), (get_the_date( 'F Y' ) ));
					
				elseif ( is_year() ) :
				
					printf( __( 'Yearly Archives: %s', 'retailsy' ), (get_the_date( 'Y' ) ) );
					
				elseif ( is_category() ) :
				
					printf( __( 'Category Archives: %s', 'retailsy' ), (single_cat_title( '', false ) ));

				elseif ( is_tag() ) :
				
					printf( __( 'Tag Archives: %s', 'retailsy' ), (single_tag_title( '', false ) ));
					
				elseif ( is_404() ) :

					printf( __( 'Error 404', 'retailsy' ));
					
				elseif ( is_author() ) :
				
					printf( __( 'Author: %s', 'retailsy' ), (get_the_author( '', false ) ));	
					
				elseif ( class_exists( 'woocommerce' ) ) : 
					
					if ( is_shop() ) {
						woocommerce_page_title();
					}
					
					elseif ( is_cart() ) {
						the_title();
					}
					
					elseif ( is_checkout() ) {
						the_title();
					}
					
					else {
						the_title();
					}
				else :
						the_title();
						
				endif;
					
			?>
		</div>
		<div class="page-st">
			<ol>
			<?php if (function_exists('retailsy_breadcrumbs')) retailsy_breadcrumbs();?>
			</ol>
		</div>  
	</div>
</section>
<?php } ?>	