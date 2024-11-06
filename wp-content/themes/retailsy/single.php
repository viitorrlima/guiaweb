<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Retailsy
 */

get_header(); 
?>
<div class="blog-details my-default">
	<div class="jcs-container">
		<div class="jcs-row align-items-start g-30 blog-details-page">
			<div id="st-primary-content" class="<?php esc_attr(retailsy_blog_column_layout()); ?>">
				<div class="blog-page">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); ?>
							<?php get_template_part('template-parts/content/content','page'); ?> 
						<?php endwhile; ?>
					<?php endif; ?>
					<hr>
					<?php comments_template( '', true ); // show comments  ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
