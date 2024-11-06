<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php echo esc_url(get_header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>
<header id="header-section" class="header header-one <?php echo esc_attr(retailsy_sticky_menu()); ?>">
	<!--===// Start: Header Above
	=================================-->
	<?php if(is_active_sidebar( 'retailsy-header-above-first' ) || is_active_sidebar( 'retailsy-header-above-second' )) { ?>
		<div id="above-header" class="header-above-info d-block d-none">
			<div class="header-widget header-dark">
				<div class="jcs-container">
					<div class="jcs-row align-items-start">						
						<div class="col-6">
							<?php if ( is_active_sidebar( 'retailsy-header-above-first' ) ){  ?>
								<div class="widget-left text-lg-left text-center">
									<?php dynamic_sidebar( 'retailsy-header-above-first' );	?>
								</div>
							<?php } ?>	
						</div>
						<div class="col-6">
							<?php if ( is_active_sidebar( 'retailsy-header-above-second' ) ){  ?>
								<div class="widget-right justify-content-lg-end text-right text-center">
									<?php dynamic_sidebar( 'retailsy-header-above-second' );	?>
								</div>
							<?php } ?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!--===// End: Header Top
=================================-->

	<div class="navigation-middle d-none d-block">
		<div class="jcs-container">
			<div class="jcs-row navigation-middle-row">
				<div class="col-lg-3 col-12 text-lg-left text-center my-auto mb-lg-auto mb-2">
					<div class="logo">
					   <?php do_action('retailsy_logo'); ?>
					</div>
				</div>
				<div class="col-lg-7 col-12 text-end my-auto mb-lg-auto mb-2">
					 <?php do_action('retailsy_hdr_product_search'); ?>
				</div>
				<div class="col-lg-2 col-12 text-lg-right text-center my-auto mb-lg-auto mb-2">
					<div class="main-menu-right">
						<ul class="menu-right-list">
							<?php 
								do_action('retailsy_hdr_cart');
								do_action('retailsy_hdr_account');
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="navigator-wrapper">
		<!--===// Start: Mobile Toggle
	=================================-->
		<div class="theme-mobile-nav <?php echo esc_attr(retailsy_sticky_menu()); ?>">
			<div class="jcs-container">
				<div class="jcs-row">
					<div class="col-12">
						<div class="theme-mobile-menu">
							<div class="menu-toggle-wrap">
								<div class="hamburger hamburger-menu">
									<button type="button" class="toggle-lines menu-toggle"
										id="mob-toggle-lines">
										<div class="top-bun"></div>
										<div class="meat"></div>
										<div class="bottom-bun"></div>
									</button>
								</div>

							</div>
							<div class="mobile-logo">
								<div class="logo">
									 <?php do_action('retailsy_logo'); ?>
								</div>
							</div>
							<div id="mobile-m" class="mobile-menu">
								<button type="button" class="header-close-menu close-style"></button>
								<div class="switcher-tab">
									<?php 
									if( class_exists( 'woocommerce' )):
									$retailsy_browse_cat_ttl		= get_theme_mod( 'browse_cat_ttl'); ?>
									<button class="active-bg"><?php echo esc_html_e('Menu','retailsy');?></button>
									<button class="cat-menu-bt">
										<?php if(!empty($retailsy_browse_cat_ttl)):
											echo wp_kses_post($retailsy_browse_cat_ttl); 
											else: 
											?>
											<i class="fa fa-list-ul"></i>
											<?php esc_html_e('Browse Categories','retailsy'); 
											endif; ?>
									</button>
									<?php endif; ?>
								</div>
								<?php do_action('retailsy_main_nav'); ?>
								<?php do_action('retailsy_hdr_mobile_browse_cat')?>
							</div>
							<div class="mobile-menu-right">
								<ul class="header-wrap-right">
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===// End: Mobile Toggle
	=================================-->

		<!--===// Start: Navigation
	=================================-->
		<div class="nav-area d-none d-block">
			<div class="navbar-area <?php echo esc_attr(retailsy_sticky_menu()); ?>">
				<div class="jcs-container">
					<div class="jcs-row">
						<?php $retailsy_hs_browse_cat= get_theme_mod( 'hs_browse_cat','1'); ?>
						<?php if($retailsy_hs_browse_cat=='1'): ?>
							<div class="col-3 my-auto">
								<div class="product-category-browse active">
									<?php do_action('retailsy_hdr_browse_cat'); ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="col-9 my-auto">
							<div class="theme-menu">
								<nav class="menubar">
								   <?php do_action('retailsy_main_nav'); ?>
								</nav>
								<div class="menu-right">
									<ul class="header-wrap-right">
										<?php do_action('retailsy_hdr_contact'); ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===// End:  Navigation
	=================================-->
	</div>
</header>

<?php 
if ( !is_page_template( 'templates/template-homepage.php' )) {
		retailsy_breadcrumbs_style();  
	}	