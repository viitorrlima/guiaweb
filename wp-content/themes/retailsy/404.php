<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Retailsy
 */
get_header();
?>
<div class="main-section-error jcs-row my-default">
	<div> 
		<img src="<?php echo esc_url(get_template_directory_uri() .'/assets/images/Illustation.png'); ?>" alt="">
		<div class="errormessage text-center"><?php esc_html_e('oops! The page you requested was not found!','retailsy'); ?></div>
		<div class="jcs-row">
			<div class="button-bubble-container">
				<a href="<?php echo esc_url( home_url( '/' )); ?>" class="s-shop-button cbb blue"><?php esc_html_e('Back To Home','retailsy'); ?></a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
