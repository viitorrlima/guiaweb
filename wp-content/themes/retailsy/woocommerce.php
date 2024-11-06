<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Retailsy
 */

get_header();
?>
<div id="product" class="post-section pt-default pb-default product">
	<div class="jcs-container">
		<div class="jcs-row">
			<div id="st-primary-content" class="col-lg-9 mb-lg-0 mb-4">
				<?php woocommerce_content(); ?>
			</div>
			<?php  get_sidebar('woocommerce'); ?>
		</div>	
	</div>	
</div>
<?php get_footer(); ?>

