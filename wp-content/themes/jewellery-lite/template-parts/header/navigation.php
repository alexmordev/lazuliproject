<?php
/**
 * The template part for header
 *
 * @package Jewellery Lite 
 * @subpackage jewellery-lite
 * @since jewellery-lite 1.0
 */
?>

<div id="header" class="menubar">
	<div class="header-menu <?php if( get_theme_mod( 'jewellery_lite_sticky_header', false) != '' || get_theme_mod( 'jewellery_lite_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-5 col-8 position-relative align-self-center">
			        <?php if(class_exists('woocommerce')){ ?>
			          	<button class="product-btn"><i class="fas fa-bars"></i><?php echo esc_html('ALL DEPARTMENTS','jewellery-lite'); ?></button>
			          	<div class="product-cat">
				            <?php
				              $args = array(
				                'orderby'    => 'title',
				                'order'      => 'ASC',
				                'hide_empty' => 0,
				                'parent'  => 0
				              );
				              $product_categories = get_terms( 'product_cat', $args );
				              $count = count($product_categories);
				              if ( $count > 0 ){
				                  foreach ( $product_categories as $product_category ) {
				                    $product_cat_id   = $product_category->term_id;
				                    $cat_link = get_category_link( $product_cat_id );
				                    if ($product_category->category_parent == 0) { ?>
				                  <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
				                  <?php
				                }
				                echo esc_html( $product_category->name ); ?></a><i class="fas fa-chevron-right"></i></li>
				            <?php } } ?>
			          	</div>
			        <?php }?>
			    </div>
			    <div class="align-self-center <?php if(class_exists('woocommerce') != '') { ?>col-lg-9 col-md-7 col-4"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
			    	<?php if(has_nav_menu('primary')){ ?>
				    	<div class="toggle-nav mobile-menu">
						    <button role="tab" onclick="jewellery_lite_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('jewellery_lite_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','jewellery-lite'); ?></span></button>
						</div>
					<?php } ?>
			    	<div id="mySidenav" class="nav sidenav">
			          	<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'jewellery-lite' ); ?>">
				            <?php 
								if(has_nav_menu('primary')){
									wp_nav_menu( array( 
										'theme_location' => 'primary',
										'container_class' => 'main-menu clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
									) ); 
								}
							?>
				            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="jewellery_lite_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('jewellery_lite_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','jewellery-lite'); ?></span></a>
			          	</nav>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>