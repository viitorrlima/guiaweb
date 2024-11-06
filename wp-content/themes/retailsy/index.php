<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package retailsy
 */
 get_header(); 
?>
<div class="blog-details mt-default">
	<div class="jcs-container">
		<div class="complete-page-lsb jcs-row align-items-start g-30 blog-details-page">
			<div id="st-primary-content" class="<?php esc_attr(retailsy_blog_column_layout()); ?>">
				<div class="blog-page main">
					<div class="jcs-container">
						<div class="jcs-row align-items-start g-30">
							<?php 
								$retailsy_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
								$args = array( 'post_type' => 'post','paged'=>$retailsy_paged );	
							?>
							<?php if( have_posts() ): ?>
				
								<?php while( have_posts() ) : the_post();
								
										get_template_part('template-parts/content/content','page'); 
										
								endwhile; ?>
								
							<?php else: ?>
							
								<?php get_template_part('template-parts/content/content','none'); ?>
								
							<?php endif; ?>
						</div>
					</div>
					<div class="pagination-wrapper">
						<div class="pagination jcs-row jcs-jf-c">
							<?php								
								// Previous/next page navigation.
								the_posts_pagination( array(
								'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
								'next_text'          => '<i class="fa fa-angle-double-right"></i>',
								) ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>	
<?php get_footer(); ?>