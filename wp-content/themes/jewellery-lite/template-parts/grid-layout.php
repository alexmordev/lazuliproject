<?php
/**
 * The template part for displaying grid post
 *
 * @package Jewellery Lite
 * @subpackage jewellery-lite
 * @since jewellery-lite 1.0
 */
?>

<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'jewellery_lite_featured_image_hide_show',true) != '') { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><?php the_title();?></h2>
	        <div class="new-text">
	        	<div class="entry-content">
	        		<p>
			          <?php $excerpt = get_the_excerpt(); echo esc_html( jewellery_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewellery_lite_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('jewellery_lite_excerpt_suffix','') ); ?>
			        </p>
	        	</div>
	        </div>
	        <?php if( get_theme_mod('jewellery_lite_button_text','READ MORE') != ''){ ?>
		        <div class="more-btn">
		          <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('jewellery_lite_button_text',__('READ MORE','jewellery-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('jewellery_lite_button_text',__('READ MORE','jewellery-lite')));?></span></a>
		        </div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>