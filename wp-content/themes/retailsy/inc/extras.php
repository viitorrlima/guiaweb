<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package retailsy
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function retailsy_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	$classes[] = 'header1';
	
	if ( is_page_template( 'templates/template-homepage.php' ) ) {
		$classes[] = 'home1';
	}
	
	return $classes;
}
add_filter( 'body_class', 'retailsy_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('retailsy_str_replace_assoc')) {

    /**
     * retailsy_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function retailsy_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function retailsy_widgets_init() {	
	register_sidebar( array(
		'name' => __( 'Header Widget Area 1', 'retailsy' ),
		'id' => 'retailsy-header-above-first',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '<span></span></h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Header Widget Area 2', 'retailsy' ),
		'id' => 'retailsy-header-above-second',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'retailsy' ),
		'id' => 'retailsy-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'retailsy' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title"><span></span>',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget', 'retailsy' ),
		'id' => 'retailsy-footer-widget',
		'description' => __( 'Footer Widget', 'retailsy' ),
		'before_widget' => '<div class="col-lg-3 col-md-6 col-12"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'retailsy' ),
		'id' => 'retailsy-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'retailsy' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'retailsy_widgets_init' );

/**
 * Retailsy Logo
 */
if ( ! function_exists( 'retailsy_logo' ) ) {
	function retailsy_logo() {
			if(has_custom_logo())
			{	
				the_custom_logo();
			} 
			
			$retailsy_site_title = get_bloginfo( 'name');
			if ($retailsy_site_title) :
		?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h4 class="site-title">
					<?php echo esc_html($retailsy_site_title);  ?>
				</h4>	
			</a>
		<?php endif; ?>
		<?php
			$retailsy_site_desc = get_bloginfo( 'description');
			if ($retailsy_site_desc) : ?>
				<p class="site-description"><?php echo esc_html($retailsy_site_desc); ?></p>
		<?php endif;
	}
}
add_action( 'retailsy_logo', 'retailsy_logo' );


/**
 * Retailsy Navigation
 */
if ( ! function_exists( 'retailsy_main_nav' ) ) {
	function retailsy_main_nav() {
		wp_nav_menu( 
			array(  
				'theme_location' => 'primary_menu',
				'container'  => '',
				'menu_class' => 'main-menu menu-wrap',
				'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
				'walker' => new WP_Bootstrap_Navwalker()
				 ) 
			);
	}
}
add_action( 'retailsy_main_nav', 'retailsy_main_nav' );


/**
 * Retailsy Header My Account
 */
 if ( ! function_exists( 'retailsy_hdr_account' ) ) {
	function retailsy_hdr_account() {
		$hide_show_account = get_theme_mod( 'hide_show_account','1');
		$hide_show_account_title = get_theme_mod( 'hide_show_account_title','1');
		if($hide_show_account=='1'  && class_exists( 'woocommerce' )): ?>
			<li class="user">
				<div class="user-btn">
					<?php if(is_user_logged_in()): ?>
						<a href="<?php echo esc_url(wp_logout_url( home_url())); ?>" class="e-commerce-corn">
							<i class="fa fa-sign-out"></i>
							<i class="fa fa-sign-out"></i>
						</a>
						<?php if($hide_show_account_title=='1'){ ?>
							<p><?php echo esc_html__('Logout','retailsy'); ?></p>
						<?php } ?>
					<?php else: ?>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="e-commerce-corn">
							<i class="fa fa-sign-in"></i>
							<i class="fa fa-sign-in"></i>
						</a>
						<?php if($hide_show_account_title=='1'){ ?>
							<p><?php echo esc_html__('Login','retailsy'); ?></p>
						<?php } ?>
					<?php endif; ?>		
				</div>
			</li>
		<?php endif;
	}
}
add_action( 'retailsy_hdr_account', 'retailsy_hdr_account' );


/**
 * Retailsy Header Cart
 */
if ( ! function_exists( 'retailsy_hdr_cart' ) ) {
	function retailsy_hdr_cart() {
		$retailsy_hide_show_cart = get_theme_mod( 'hide_show_cart','1');
		$hide_show_cart_ttl = get_theme_mod( 'hide_show_cart_ttl','1');
		$hdr_cart_ttl = get_theme_mod( 'hdr_cart_ttl','Cart');
		if($retailsy_hide_show_cart=='1' && class_exists( 'woocommerce' )): ?>
			<li class="cart-wrapper">
				<div class="cart-main">
					<button type="button" class="cart-icon-wrap header-cart cart-trigger" tabindex="-1">
						<a href="javascript:void(0)" class="e-commerce-corn" id="cart-bag">
						 <i class="fa fa-cart-plus"></i><i class="fa fa-cart-plus"></i>
						</a> 
						<?php 
							if ( class_exists( 'woocommerce' ) ) {
								$count = WC()->cart->cart_contents_count;
								$cart_url = wc_get_cart_url();
								
								if ( $count > 0 ) {
								?>
									 <span class="cart-counts"><?php echo esc_html( $count ); ?></span>
								<?php 
								}
								else {
									?>
									<span class="cart-counts"><?php esc_html_e('0','retailsy')?></span>
									<?php 
								}
							}
							?>
					</button>
					<?php if($hide_show_cart_ttl=='1'){	?>
						<p><?php echo wp_kses_post($hdr_cart_ttl); ?></p>
					<?php } ?>
					<span class="cart-label">
						<span><?php echo WC()->cart->get_cart_subtotal(); ?></span>
					</span>
				</div>
				<div class="cart-modal cart-modal-1">
					<div class="cart-container">
						<div class="cart-header">
							<div class="cart-top">
								<?php $retailsy_hdr_cart_ttl= get_theme_mod( 'hdr_cart_ttl'); ?>
								<span class="cart-text"><?php echo wp_kses_post($retailsy_hdr_cart_ttl); ?></span>
								<a href="javascript:void(0);" class="cart-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="cart-data">
							<?php get_template_part('woocommerce/cart/mini','cart'); ?>
						</div>	
					</div>
					<div class="cart-overlay"></div>
				</div>
			</li>
			<?php endif;
	}
}
add_action( 'retailsy_hdr_cart', 'retailsy_hdr_cart' );



/**
 * Retailsy Browse Category
 */
if ( ! function_exists( 'retailsy_hdr_browse_cat' ) ) {
	function retailsy_hdr_browse_cat() {
		$browse_cat_ttl		= get_theme_mod( 'browse_cat_ttl','<i class="fa fa-list-ul"></i> Browse Categories');
		$browse_product_cat			= get_theme_mod('browse_product_cat');
		
		if(class_exists( 'woocommerce' )): 
		?>
		<button type="button" class="product-category-btn">
			<span class="cat-left">
				<?php echo wp_kses_post($browse_cat_ttl); ?>
			</span>
			<i class="fa fa-spinner"></i>
		</button>
		<div class="product-category-menus">
			<div class="product-category-menus-list">
				<ul class="main-menu">
						<?php
						$taxonomy     = 'product_cat';
						$orderby      = 'name';
						$show_count   = 0;
						$pad_counts   = 0;
						$hierarchical = 1;
						$title        = '';
						$empty        = 0;
						$args = array(
							'taxonomy'     => $taxonomy,
							'orderby'      => $orderby,
							'show_count'   => $show_count,
							'pad_counts'   => $pad_counts,
							'hierarchical' => $hierarchical,
							'title_li'     => $title,
							'hide_empty'   => $empty
						);
						
						$all_categories = get_categories( $args );
						foreach ($all_categories as $cat) {
							$retailsy_product_cat_icon = get_term_meta($cat->term_id, 'retailsy_product_cat_icon', true);
							if($cat->category_parent == 0) {
								$category_id = $cat->term_id;
								$child_class = (retailsy_has_Children($category_id))?'menu-item-has-children':'';
								
								echo '<li class="menu-item main-top-menu '.$child_class.'"><a href="'.get_term_link($cat->slug, 'product_cat').'">'.(!empty($retailsy_product_cat_icon) ? "<i class='fa {$retailsy_product_cat_icon}'></i>":''); echo $cat->name.'</a>';
								$args2 = array(
									'taxonomy'     => $taxonomy,
									'parent'       => $category_id,
									'hierarchical' => $hierarchical,
									'hide_empty'   => $empty
								);
								$sub_cats = get_categories( $args2 );
								if($sub_cats) {
									echo '<ul class="dropdown-menu 2-main-top-menu">';
									foreach($sub_cats as $sub_category) {
										$child_class = (retailsy_has_Children($sub_category->term_id))?'menu-item-has-children':'';
										
								
										$retailsy_product_cat_icon = get_term_meta($sub_category->term_id, 'retailsy_product_cat_icon', true);
										echo  '<li class="menu-item '.$child_class.'"><a class="nav-link" href="'. get_term_link($sub_category->slug, 'product_cat') .'">'.(!empty($retailsy_product_cat_icon) ? "<i class='fa {$retailsy_product_cat_icon}'></i>":''); echo $sub_category->name .'</a>';
										
										$args3 = array(
											'taxonomy'     => $taxonomy,
											'parent'       => $sub_category->term_id,
											'hierarchical' => $hierarchical,
											'hide_empty'   => $empty
										);
										$sub_cats3 = get_categories( $args3 );
									
										if($sub_cats3) {
											echo '<ul class="dropdown-menu 3-main-top-menu">';
											foreach($sub_cats3 as $sub_category3) {
												$child_class = (retailsy_has_Children($sub_category3->term_id))?'menu-item-has-children':'';
												
												$retailsy_product_cat_icon = get_term_meta($sub_category3->term_id, 'retailsy_product_cat_icon', true);
												echo  '<li class="menu-item '.$child_class.'"><a class="nav-link" href="'. get_term_link($sub_category3->slug, 'product_cat') .'">'.(!empty($retailsy_product_cat_icon) ? "<i class='fa {$retailsy_product_cat_icon}'></i>":''); echo $sub_category3->name .'</a>';
												
												$args4 = array(
													'taxonomy'     => $taxonomy,
													'parent'       => $sub_category3->term_id,
													'hierarchical' => $hierarchical,
													'hide_empty'   => $empty
												);
												$sub_cats4 = get_categories( $args4 );
												if($sub_cats4) {
													echo '<ul class="dropdown-menu 4-main-top-menu">';
													foreach($sub_cats4 as $sub_category4) {
														$child_class = (retailsy_has_Children($sub_category4->term_id))?'menu-item-has-children':'';
														
														$retailsy_product_cat_icon = get_term_meta($sub_category4->term_id, 'retailsy_product_cat_icon', true);
														echo  '<li class="menu-item '.$child_class.'"><a class="nav-link" href="'. get_term_link($sub_category4->slug, 'product_cat') .'">'.(!empty($retailsy_product_cat_icon) ? "<i class='fa {$retailsy_product_cat_icon}'></i>":''); echo $sub_category4->name .'</a>';
														
														$args5 = array(
															'taxonomy'     => $taxonomy,
															'parent'       => $sub_category4->term_id,
															'hierarchical' => $hierarchical,
															'hide_empty'   => $empty
														);
														
														$sub_cats5 = get_categories( $args5 );
														if($sub_cats5) {
															echo '<ul class="dropdown-menu 5-main-top-menu">';
															foreach($sub_cats5 as $sub_category5) {
																$child_class = (retailsy_has_Children($sub_category5->term_id))?'menu-item-has-children':'';
																
																$retailsy_product_cat_icon = get_term_meta($sub_category5->term_id, 'retailsy_product_cat_icon', true);
																echo  '<li class="menu-item '.$child_class.'"><a class="nav-link" href="'. get_term_link($sub_category5->slug, 'product_cat') .'">'.(!empty($retailsy_product_cat_icon) ? "<i class='fa {$retailsy_product_cat_icon}'></i>":''); echo $sub_category5->name .'</a>';
																
																$args6 = array(
																	'taxonomy'     => $taxonomy,
																	'parent'       => $sub_category5->term_id,
																	'hierarchical' => $hierarchical,
																	'hide_empty'   => $empty
																);
																
																$sub_cats6 = get_categories( $args6 );
																
																if($sub_cats6) {
																	echo '<ul class="dropdown-menu 6-main-top-menu">';
																	foreach($sub_cats6 as $sub_category6) {
																		$child_class = (retailsy_has_Children($sub_category6->term_id))?'menu-item-has-children':'';
																		
																		$retailsy_product_cat_icon = get_term_meta($sub_category6->term_id, 'retailsy_product_cat_icon', true);
																		echo  '<li class="menu-item '.$child_class.'"><a class="nav-link" href="'. get_term_link($sub_category6->slug, 'product_cat') .'">'.(!empty($retailsy_product_cat_icon) ? "<i class='fa {$retailsy_product_cat_icon}'></i>":''); echo $sub_category6->name .'</a></li>';
																	}
																	echo '</ul>';
																}
																echo '</li>';
															}
															echo '</ul>';
														}
														echo '</li>';
													}
													echo '</ul>';
												}
												echo '</li>';
											}
											echo '</ul>';
										}	
										echo '</li>';
										}
										echo '</ul>';
									}
									echo '</li>';
								}
							}
						?>
					</ul>
			</div>
		</div>
		<?php
		endif;
	}
}
add_action( 'retailsy_hdr_browse_cat', 'retailsy_hdr_browse_cat' );



/**
 * Retailsy Mobile Browse Category
 */
if ( ! function_exists( 'retailsy_hdr_mobile_browse_cat' ) ) {
	function retailsy_hdr_mobile_browse_cat() {
		$retailsy_hs_browse_cat		= get_theme_mod( 'hs_browse_cat','1');
		if($retailsy_hs_browse_cat=='1' && class_exists( 'woocommerce' )):
		?>
			<div class="product-categories d-none">
				<div class="product-categories-list">
					<ul class="main-menu">
						<?php
							$categories = array(
								  'taxonomy' => 'product_cat',
								  'hide_empty' => false,
								  'parent'   => 0
							  );
							$product_cat = get_terms( $categories );
							foreach ($product_cat as $parent_product_cat) {
								$child_args = array(
									'taxonomy' => 'product_cat',
									'hide_empty' => false,
									'parent'   => $parent_product_cat->term_id
								);
								$thumbnail_id = get_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true );
								$image = wp_get_attachment_url( $thumbnail_id );
								$child_product_cats = get_terms( $child_args );
								$retailsy_product_cat_icon = get_term_meta($parent_product_cat->term_id, 'retailsy_product_cat_icon', true);
								if ( ! empty($child_product_cats) ) {
									echo '<li class="menu-item menu-item-has-children"><a href="'.esc_url(get_term_link($parent_product_cat->term_id)).'" class="nav-link">'.(!empty($retailsy_product_cat_icon) ? "<i class='fa {$retailsy_product_cat_icon}'></i>":''); echo $parent_product_cat->name.'</a><span class="mobile-collapsed d-lg-none"><span class="mobile-toggler"><button type="button" class="fa fa-chevron-right" aria-label="Mobile Toggler" aria-hidden="true"></button></span></span>';
								} else {
									echo '<li class="menu-item"><a href="'.esc_url(get_term_link($parent_product_cat->term_id)).'" class="nav-link">'.(!empty($retailsy_product_cat_icon) ? "<i class='fa {$retailsy_product_cat_icon}'></i>":''); echo $parent_product_cat->name.'</a>';
								}
								if ( ! empty($child_product_cats) ) {
									echo '<ul class="dropdown-menu">';
									foreach ($child_product_cats as $child_product_cat) {
									echo '<li class="menu-item"><a href="'.esc_url(get_term_link($child_product_cat->term_id)).'" class="dropdown-item">'.$child_product_cat->name.'</a></li>';
									} echo '</ul>';
								} echo '</li>';
							} ?>
					</ul>
				</div>
			</div>
		<?php endif;
	}
}
add_action( 'retailsy_hdr_mobile_browse_cat', 'retailsy_hdr_mobile_browse_cat' );


/**
 * Retailsy Header Contact
 */
if ( ! function_exists( 'retailsy_hdr_contact' ) ) {
	function retailsy_hdr_contact() {
		$retailsy_hide_show_hdr_contact = get_theme_mod( 'hide_show_hdr_contact','1');
		$retailsy_hdr_contact_icon 	   = get_theme_mod( 'hdr_contact_icon','fa-headphones');
		$retailsy_hdr_contact_ttl 	   = get_theme_mod( 'hdr_contact_ttl');
		$retailsy_hdr_contact_url 	   = get_theme_mod( 'hdr_contact_url');
		if($retailsy_hide_show_hdr_contact=='1'): ?>
			<li class="contact-wrapper">
				<a href="<?php echo esc_url($retailsy_hdr_contact_url); ?>" class="headphone-icon-wrap"
					id="headphone" title="Contact Us">
					<i class="fa <?php echo esc_attr($retailsy_hdr_contact_icon); ?>" aria-hidden="true"></i>
					<span class="contact-number"><?php echo wp_kses_post($retailsy_hdr_contact_ttl); ?></span>
				</a>
			</li>
		<?php endif;
	}
}
add_action( 'retailsy_hdr_contact', 'retailsy_hdr_contact' );

/**
 * Retailsy Product Search
 */
if ( ! function_exists( 'retailsy_hdr_product_search' ) ) {
	function retailsy_hdr_product_search() {
		$retailsy_hs_product_search	= get_theme_mod( 'hs_product_search','1');
		 if($retailsy_hs_product_search=='1' && class_exists( 'woocommerce' )): ?>
			<div class="header-search-form">
				<form method="get" action="<?php echo esc_url(home_url('/')); ?>">
					<select class="header-search-select" name="product_cat">
					   <option value=""><?php esc_html_e('Select Category', 'retailsy'); ?></option> 
						<?php
							$storely_product_categories = get_categories('taxonomy=product_cat');
							foreach ($storely_product_categories as $category) {
								$option = '<option value="' . esc_attr($category->category_nicename) . '">';
								$option .= esc_html($category->cat_name);
								$option .= ' (' . absint($category->category_count) . ')';
								$option .= '</option>';
								echo $option; // WPCS: XSS OK.
							}
						?>
					</select>
					<input type="hidden" name="post_type" value="product" />
					<input class="header-search-input" name="s" type="text"
						placeholder="<?php esc_attr_e('Search Products Here', 'retailsy'); ?>" />
					<input type="hidden" name="post_type" value="product" />
					<button class="header-search-button" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		<?php endif;
	}
}
add_action( 'retailsy_hdr_product_search', 'retailsy_hdr_product_search' );

 /**
 * Add WooCommerce Cart Icon With Cart Count (https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header)
 */
function retailsy_add_to_cart_count_fragment( $fragments ) {
	
    ob_start();
    $count = WC()->cart->cart_contents_count; 
    ?> 	
	<?php
    if ( $count > 0 ) {
	?>
		 <span class="cart-counts"><?php echo esc_html( $count ); ?></span>
	<?php 
	}
	else {
		?>
		<span class="cart-counts"><?php esc_html_e('0','retailsy')?></span>
		<?php 
	}
    ?><?php
 
    $fragments['span.cart-counts'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'retailsy_add_to_cart_count_fragment' );


function retailsy_add_to_cart_total_fragment( $fragments ) {
	
    ob_start(); 
    ?> 	
	<span class="cart-label">
		<span><?php echo WC()->cart->get_cart_subtotal(); ?></span>
	</span>
   <?php
    $fragments['span.cart-label'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'retailsy_add_to_cart_total_fragment' );


/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'retailsy_blog_column_layout' )) :
function retailsy_blog_column_layout(){
	if(is_active_sidebar('retailsy-sidebar-primary'))
		{ echo 'col-lg-8'; } 
	else 
		{ echo 'col-lg-12'; }  
} endif;
 
 
 
/**
 * Retailsy Breadcrumb
 */ 
function retailsy_breadcrumbs() {
	
	$showOnHome	= esc_html__('1','retailsy'); 	// 1 - Show breadcrumbs on the homepage, 0 - don't show
	$delimiter 	= '';   // Delimiter between breadcrumb
	$home 		= esc_html__('Home','retailsy'); 	// Text for the 'Home' link
	$showCurrent= esc_html__('1','retailsy'); // Current post/page title in breadcrumb in use 1, Use 0 for don't show
	$before		= '<li class="active">'; // Tag before the current Breadcrumb
	$after 		= '</li>'; // Tag after the current Breadcrumb
	$breadcrumb_seprator	= get_theme_mod('breadcrumb_seprator','/');
	global $post;
	$homeLink = home_url();

	if (is_home() || is_front_page()) {
 
	if ($showOnHome == 1) echo '<li><a href="' . esc_url($homeLink) . '">  ' . esc_html($home) . '</a></li>';
 
	} else {
 
    echo '<li><a href="' . esc_url($homeLink) . '">  ' . esc_html($home) . '</a> ' . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
 
    if ( is_category() ) 
	{
		$thisCat = get_category(get_query_var('cat'), false);
		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
		echo $before . esc_html__('Archive by category','retailsy').' "' . esc_html(single_cat_title('', false)) . '"' .$after;
		
	} 
	
	elseif ( is_search() ) 
	{
		echo $before . esc_html__('Search results for ','retailsy').' "' . esc_html(get_search_query()) . '"' . $after;
	} 
	
	elseif ( is_day() )
	{
		echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
		echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a> '. '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
		echo $before . esc_html(get_the_time('d')) . $after;
	} 
	
	elseif ( is_month() )
	{
		echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
		echo $before . esc_html(get_the_time('F')) . $after;
	} 
	
	elseif ( is_year() )
	{
		echo $before . esc_html(get_the_time('Y')) . $after;
	} 
	
	elseif ( is_single() && !is_attachment() )
	{
		if ( get_post_type() != 'post' )
		{
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '/">  ' . $post_type->labels->singular_name . '</a>';
			if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp' . $before . wp_kses_post(get_the_title()) . $after;
		}
		else
		{
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp');
			if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
			echo $cats;
			if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
		}
 
    }
		
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				$thisshop = woocommerce_page_title();
			}
		}	
		else  {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		}	
	} 
	
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) 
	{
		$post_type = get_post_type_object(get_post_type());
		echo $before . $post_type->labels->singular_name . $after;
	} 
	
	elseif ( is_attachment() ) 
	{
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); 
		if(!empty($cat)){
		$cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp');
		}
		echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>';
		if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
 
    } 
	
	elseif ( is_page() && !$post->post_parent ) 
	{
		if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;
	} 
	
	elseif ( is_page() && $post->post_parent ) 
	{
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) 
		{
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>' . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
			$parent_id  = $page->post_parent;
		}
		
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) 
		{
			echo $breadcrumbs[$i];
			if ($i != count($breadcrumbs)-1) echo ' ' . esc_attr($delimiter) . '&nbsp' . wp_kses_post($breadcrumb_seprator) . '&nbsp';
		}
		if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
 
    } 
	elseif ( is_tag() ) 
	{
		echo $before . esc_html__('Posts tagged ','retailsy').' "' . esc_html(single_tag_title('', false)) . '"' . $after;
	} 
	
	elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata($author);
		echo $before . esc_html__('Articles posted by ','retailsy').'' . $userdata->display_name . $after;
	} 
	
	elseif ( is_404() ) {
		echo $before . esc_html__('Error 404 ','retailsy'). $after;
    }
	
    if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
		echo ' ( ' . esc_html__('Page','retailsy') . '' . esc_html(get_query_var('paged')). ' )';
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }
 
    echo '</li>';
 
  }
}