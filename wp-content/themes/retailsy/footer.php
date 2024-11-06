</div> 
</div> 
<footer class="footer-section footer-one footer-light">
	<div class="jcs-container">
		<?php if ( is_active_sidebar( 'retailsy-footer-widget' ) ) { ?>
			<div class="footer-middle-wrapper">
				<div class="jcs-row">
					<?php  dynamic_sidebar( 'retailsy-footer-widget' ); ?>
				</div>	
			</div>
		 <?php } ?>
	</div>
	<hr>
	<?php 
	$footer_first_custom 	= get_theme_mod('footer_first_custom','Copyright &copy; [current_year] | Powered by [theme_author]');						
	?>
	<div class="jcs-container">
		<div class="footer-bottom-wrapper">
			<div class="jcs-row">
				<div class="col mx-auto text-center">
					<?php 
						$retailsy_copyright_allowed_tags = array(
						'[current_year]' => date_i18n('Y', current_time( 'timestamp' )),
						'[site_title]'   => get_bloginfo('name'),
						'[theme_author]' => sprintf(__('<a href="#">Retailsy</a>', 'retailsy')),
					);
					
					echo apply_filters('retailsy_footer_copyright', wp_kses_post(retailsy_str_replace_assoc($retailsy_copyright_allowed_tags, $footer_first_custom)));
					?>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- END FOOTER -->

<!-- START: SCROLL UP -->
<?php 
	$retailsy_hs_scroller 	= get_theme_mod('hs_scroller','1');	
	if($retailsy_hs_scroller == '1') :
?>
<a href="javascript:void(0)" class="scrollup"><i class="fa fa-arrow-up"></i></a>
<?php endif; ?>
<!-- END: SCROLL UP -->
<?php 
wp_footer(); ?>
</body>
</html>
