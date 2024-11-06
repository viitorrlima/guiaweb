<?php
/**
Template Name: Fullwidth Page
**/

get_header();
?>
<div class="post-section pb-default pt-default">
	<div class="jcs-container">
		<div class="jcs-row">
			<div class="col-lg-12 mb-lg-0 mb-4">
				<?php 		
					the_post(); the_content(); 
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
		</div>
	</div>
</div> 
<?php get_footer(); ?>

