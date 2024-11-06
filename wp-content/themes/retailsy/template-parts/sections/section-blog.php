<?php  
	$retailsy_blog2_ttl 	= get_theme_mod('blog2_ttl');
	$retailsy_blog2_num		= get_theme_mod('blog2_num','4');
?>
<div class="blog-news blog-home2 pb-default">
	<div class="jcs-container">
		<div class="jcs-row gap10 " style="justify-content: space-between;">
			<div class="col">
				<?php if(!empty($retailsy_blog2_ttl)): ?>
					<div class="section-title-name"><?php echo wp_kses_post($retailsy_blog2_ttl); ?></div>
				<?php endif; ?>
			</div>

			<div id="direction">
				<a href="javascript:void(0)" class="about-left"><i class="fa fa-chevron-left"></i></a>
				<a href="javascript:void(0)" class="about-right"><i class="fa fa-chevron-right"></i></a>
			</div>
		</div>
		<div>
			<div class="in2-news-slider in2-space">
				<?php 
					$retailsy_blog2_args = array( 'post_type' => 'post', 'posts_per_page' => $retailsy_blog2_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				
					$retailsy_wp_query = new WP_Query($retailsy_blog2_args);
					if($retailsy_wp_query)
					{	
					while($retailsy_wp_query->have_posts()):$retailsy_wp_query->the_post();
				?>
					<?php get_template_part('template-parts/content/content','page'); ?>
				<?php endwhile; } wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>