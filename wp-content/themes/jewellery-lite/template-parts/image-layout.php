<?php
/**
 * The template part for displaying image post
 *
 * @package Jewellery Lite
 * @subpackage jewellery-lite
 * @since jewellery-lite 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="entry-content">
        <h1 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>    
        <div class="entry-attachment">
            <div class="attachment">
                <?php jewellery_lite_the_attached_image(); ?>
            </div>

            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( jewellery_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewellery_lite_excerpt_number','30')))); ?></p></div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'jewellery-lite' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'jewellery-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <div class="clearfix"></div>
</article>