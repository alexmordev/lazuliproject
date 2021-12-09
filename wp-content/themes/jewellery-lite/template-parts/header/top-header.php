<?php
/**
 * The template part for header
 *
 * @package Jewellery Lite 
 * @subpackage jewellery-lite
 * @since jewellery-lite 1.0
 */
?>

<?php if( get_theme_mod( 'jewellery_lite_location') != '' || get_theme_mod( 'jewellery_lite_phone_number') != '' || get_theme_mod( 'jewellery_lite_order_tracking') != '' )  { ?>

	<?php if( get_theme_mod( 'jewellery_lite_topbar_hide_show', false) != '' || get_theme_mod( 'jewellery_lite_resp_topbar_hide_show', false) != '') { ?>
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4">
					    <?php if( get_theme_mod( 'jewellery_lite_phone_number') != '') { ?>
		          			<p><?php esc_html_e('Telephone Enqiry:','jewellery-lite'); ?> <a href="tel:<?php echo esc_attr( get_theme_mod('jewellery_lite_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('jewellery_lite_phone_number',''));?></a></p>
		        		<?php }?>
				    </div>
					<div class="col-lg-6 col-md-6">
					    <?php if( get_theme_mod( 'jewellery_lite_location') != '') { ?>
		          			<p class="loca_address"><i class="<?php echo esc_attr(get_theme_mod('jewellery_lite_location_icon','fas fa-map-marker-alt')); ?>"></i><?php echo esc_html(get_theme_mod('jewellery_lite_location',''));?></p>
		    			<?php } ?>
				    </div>
				    <div class="col-lg-2 col-md-2">
				        <?php if( get_theme_mod( 'jewellery_lite_order_tracking') != '') { ?>
				        	<?php if(class_exists('woocommerce')){ ?>
				          	<div class="order-track">
			            		<span><i class="<?php echo esc_attr(get_theme_mod('jewellery_lite_order_tracking_icon','fas fa-truck')); ?>"></i><?php echo esc_html_e('Order Tracking','jewellery-lite'); ?></span>
					            <div class="order-track-hover">
				              		<?php echo do_shortcode('[woocommerce_order_tracking]','jewellery-lite'); ?>
					            </div>
				          	</div>
				          <?php }?>
				        <?php }?>
				   	</div>
				</div>
			</div>
		</div>
	<?php }?>
	
<?php }?>