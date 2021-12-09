<?php
/**
 * The template part for top header
 *
 * @package Jewellery Lite 
 * @subpackage jewellery-lite
 * @since jewellery-lite 1.0
 */
?>

<div class="middle-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 align-self-center">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('jewellery_lite_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('jewellery_lite_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('jewellery_lite_tagline_hide_show',true) != ''){ ?>
              <p class="site-description">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-5 align-self-center">
        <div class="search-bar">
          <?php if(class_exists('woocommerce')){ ?>
            <?php get_product_search_form(); ?>
          <?php }?>
        </div>
      </div>
      <?php if( get_theme_mod( 'jewellery_lite_my_account_hide_show', true) != '') { ?>
        <div class="col-lg-2 col-md-2 col-12 align-self-center">
          <div class="account">
            <?php if(class_exists('woocommerce')){ ?>
              <?php if ( is_user_logged_in() ) { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Account','jewellery-lite'); ?>"><i class="<?php echo esc_attr(get_theme_mod('jewellery_lite_my_account_icon','fas fa-sign-in-alt')); ?>"></i><p><?php esc_html_e('Account','jewellery-lite'); ?></p><span class="screen-reader-text"><?php esc_html_e( 'Account','jewellery-lite' );?></span></a>
              <?php }
              else { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','jewellery-lite'); ?>"><i class="fas fa-user"></i><p><?php esc_html_e('Login / Register','jewellery-lite'); ?></p><span class="screen-reader-text"><?php esc_html_e( 'Login / Register','jewellery-lite' );?></span></a>
              <?php } ?>
            <?php }?>
          </div>
        </div>
      <?php } ?>
      <?php if( get_theme_mod( 'jewellery_lite_cart_hide_show',true) != '') { ?>
        <div class="col-lg-1 col-md-2 col-12 align-self-center">
          <?php if(class_exists('woocommerce')){ ?>
            <span class="cart_no">
              <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','jewellery-lite' ); ?>"><i class="<?php echo esc_attr(get_theme_mod('jewellery_lite_cart_icon','fas fa-shopping-cart')); ?>"></i><p><?php esc_html_e('Cart','jewellery-lite'); ?></p><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','jewellery-lite' );?></span></a>
              <span class="cart-value"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></span>
            </span>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>