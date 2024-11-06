<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Retailsy
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div><?php the_post_thumbnail(); ?></div>
	<?php } ?>
	
	<div class="meta-icon item-wrapper">
		<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><i class="bi-calendar-check"></i> <?php echo esc_html(get_the_date('j, M, Y')); ?></a>
		<a href="#"><i class="bi-chat-left-text"></i> <?php echo esc_html(get_comments_number($post->ID)); ?> <?php esc_html_e('Comments','retailsy'); ?></a>
	</div>
	<?php     
		if ( is_single() ) :
		
		the_title('<h5 class="titles-16">', '</h5>' );
		
		else:
		
		the_title( sprintf( '<h5 class="titles-16"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
		
		endif; 
	?> 
	<?php 
		the_content( 
				sprintf( 
					__( 'Read More', 'retailsy' ), 
					'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
				) 
			);
	?>
</div>