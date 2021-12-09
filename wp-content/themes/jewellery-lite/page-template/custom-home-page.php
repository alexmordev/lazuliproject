<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'jewellery_lite_before_slider' ); ?>

  <?php if( get_theme_mod( 'jewellery_lite_slider_hide_show', false) != '' || get_theme_mod( 'jewellery_lite_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'jewellery_lite_slider_speed',4000)) ?>"> 
        <?php $jewellery_lite_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'jewellery_lite_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $jewellery_lite_pages[] = $mod;
            }
          }
          if( !empty($jewellery_lite_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $jewellery_lite_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( jewellery_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewellery_lite_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('jewellery_lite_slider_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('jewellery_lite_slider_button_text',__('READ MORE','jewellery-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('jewellery_lite_slider_button_text',__('READ MORE','jewellery-lite')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','jewellery-lite' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','jewellery-lite' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'jewellery_lite_after_slider' ); ?>

  <section id="second_section">
    <div class="container">
      <div class="row">
        <?php if( get_theme_mod( 'jewellery_lite_sidebar') != '') { ?>
        <div class="col-lg-3 col-md-4">
          <div id="sidebar">
            <?php dynamic_sidebar('sidebar-4'); ?>
          </div>
        </div>
        <?php }?>
        <div class="<?php if( get_theme_mod( 'jewellery_lite_sidebar') != '') { ?>col-lg-9 col-md-8"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
          <div id="content-vw">
            <div class="container">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; // end of the loop. ?>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </section>

  <?php do_action( 'jewellery_lite_after_second_section' ); ?>
</main>

<?php get_footer(); ?>