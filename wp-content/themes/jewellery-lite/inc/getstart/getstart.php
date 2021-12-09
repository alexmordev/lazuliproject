<?php
//about theme info
add_action( 'admin_menu', 'jewellery_lite_gettingstarted' );
function jewellery_lite_gettingstarted() {    	
	add_theme_page( esc_html__('About Jewellery Lite', 'jewellery-lite'), esc_html__('About Jewellery Lite', 'jewellery-lite'), 'edit_theme_options', 'jewellery_lite_guide', 'jewellery_lite_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function jewellery_lite_admin_theme_style() {
   wp_enqueue_style('jewellery-lite-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('jewellery-lite-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'jewellery_lite_admin_theme_style');

//guidline for about theme
function jewellery_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'jewellery-lite' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Jewellery Lite Theme', 'jewellery-lite' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','jewellery-lite'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Jewellery Lite at 20% Discount','jewellery-lite'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','jewellery-lite'); ?> ( <span><?php esc_html_e('vwpro20','jewellery-lite'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( JEWELLERY_LITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'jewellery-lite' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="jewellery_lite_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'jewellery-lite' ); ?></button>	
			<button class="tablinks" onclick="jewellery_lite_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'jewellery-lite' ); ?></button>
	  		<button class="tablinks" onclick="jewellery_lite_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'jewellery-lite' ); ?></button>
		  	<button class="tablinks" onclick="jewellery_lite_open_tab(event, 'jewellery_pro')"><?php esc_html_e( 'Get Premium', 'jewellery-lite' ); ?></button>
		  	<button class="tablinks" onclick="jewellery_lite_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'jewellery-lite' ); ?></button>
		</div>

		
		<?php
			$jewellery_lite_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$jewellery_lite_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Jewellery_Lite_Plugin_Activation_Settings::get_instance();
				$jewellery_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="jewellery-lite-recommended-plugins">
				    <div class="jewellery-lite-action-list">
				        <?php if ($jewellery_lite_actions): foreach ($jewellery_lite_actions as $key => $jewellery_lite_actionValue): ?>
				                <div class="jewellery-lite-action" id="<?php echo esc_attr($jewellery_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($jewellery_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($jewellery_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($jewellery_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','jewellery-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($jewellery_lite_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'jewellery-lite' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Jewellery Lite is one of the much reputed jewellery WordPress WooCommerce themes of premium level and has done exceptionally well in the international online market since its inception. With its mesmerizing features that rival the competitors in the market, it has emerged as one of the much sought after WordPress themes for jewellery business or the business of precious stones as well as metals. It is not only clean but delightful theme as well and an exceptional choice for the sale of jewellery, rings, necklaces, earrings, bracelets, pendants, diamond, gems, gemstones, jade, items made from gold, silver, and platinum. It is a fine choice for the goldsmiths as well as jewellery designers. It has some exclusive features like Theme support RTL, multi-languages, multi-store websites. Powerful, advanced & customisable theme admin options and caters to the different designs that include popular, common, material design and apart from that is accompanied with easy to use styles. It is multipurpose, responsive to the screens of different shapes and sizes other than being retina ready, CTA [call to action] and Bootstrap oriented. It has the fast page load time making it one of the finest themes in business category. It is also accompanied with secure and clean code.','jewellery-lite'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'jewellery-lite' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'jewellery-lite' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( JEWELLERY_LITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'jewellery-lite' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'jewellery-lite'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'jewellery-lite'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'jewellery-lite'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'jewellery-lite'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'jewellery-lite'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( JEWELLERY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'jewellery-lite'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'jewellery-lite'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'jewellery-lite'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( JEWELLERY_LITE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'jewellery-lite'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'jewellery-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','jewellery-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','jewellery-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','jewellery-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_global_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','jewellery-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','jewellery-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','jewellery-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','jewellery-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','jewellery-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','jewellery-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','jewellery-lite'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','jewellery-lite'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','jewellery-lite'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','jewellery-lite'); ?></span><?php esc_html_e(' Go to ','jewellery-lite'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','jewellery-lite'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','jewellery-lite'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','jewellery-lite'); ?></span><?php esc_html_e(' Go to ','jewellery-lite'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','jewellery-lite'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','jewellery-lite'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','jewellery-lite'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-jewellery-lite/" target="_blank"><?php esc_html_e('Documentation','jewellery-lite'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>	

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Jewellery_Lite_Plugin_Activation_Settings::get_instance();
			$jewellery_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="jewellery-lite-recommended-plugins">
				    <div class="jewellery-lite-action-list">
				        <?php if ($jewellery_lite_actions): foreach ($jewellery_lite_actions as $key => $jewellery_lite_actionValue): ?>
				                <div class="jewellery-lite-action" id="<?php echo esc_attr($jewellery_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($jewellery_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($jewellery_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($jewellery_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','jewellery-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($jewellery_lite_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'jewellery-lite' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','jewellery-lite'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','jewellery-lite'); ?></span></b></p>
	              	<div class="jewellery-lite-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','jewellery-lite'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'jewellery-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','jewellery-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','jewellery-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','jewellery-lite'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','jewellery-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','jewellery-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','jewellery-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','jewellery-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','jewellery-lite'); ?></a>
								</div> 
							</div>
						</div>
				</div>					
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Jewellery_Lite_Plugin_Activation_Settings::get_instance();
			$jewellery_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="jewellery-lite-recommended-plugins">
				    <div class="jewellery-lite-action-list">
				        <?php if ($jewellery_lite_actions): foreach ($jewellery_lite_actions as $key => $jewellery_lite_actionValue): ?>
				                <div class="jewellery-lite-action" id="<?php echo esc_attr($jewellery_lite_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($jewellery_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($jewellery_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($jewellery_lite_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'jewellery-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="jewellery-lite-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','jewellery-lite'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'jewellery-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','jewellery-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','jewellery-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','jewellery-lite'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','jewellery-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','jewellery-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','jewellery-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=jewellery_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','jewellery-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','jewellery-lite'); ?></a>
								</div> 
							</div>
						</div>
				</div>
			<?php } ?>
		</div>

		<div id="jewellery_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'jewellery-lite' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Get the jewellery WordPress theme from market at affordable price and this is a very good step for the start up or for any kind of established business related to the jewellery or precious or semi-precious metals that includes gold and diamonds. One of the best things about this theme is that it is responsive to the core apart from being multipurpose and all this a significant choice to take the jewellery business on the path of global expansion. With significant features like CTA, Bootstrap framework, interactive nature as well as clean code, jewellery WordPress theme is a preferred choice for making the gift shop or a jewellery store with the potential to grow. The best part of this WP theme is that it can be used for any type of online store and not just related to jewellery. It is also good for the online store for fashion.','jewellery-lite'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( JEWELLERY_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'jewellery-lite'); ?></a>
					<a href="<?php echo esc_url( JEWELLERY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'jewellery-lite'); ?></a>
					<a href="<?php echo esc_url( JEWELLERY_LITE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'jewellery-lite'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'jewellery-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'jewellery-lite'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'jewellery-lite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'jewellery-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'jewellery-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'jewellery-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'jewellery-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'jewellery-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'jewellery-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'jewellery-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'jewellery-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'jewellery-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'jewellery-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'jewellery-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'jewellery-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'jewellery-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'jewellery-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'jewellery-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'jewellery-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'jewellery-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'jewellery-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'jewellery-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( JEWELLERY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'jewellery-lite'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'jewellery-lite'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'jewellery-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( JEWELLERY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'jewellery-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'jewellery-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'jewellery-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( JEWELLERY_LITE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'jewellery-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'jewellery-lite'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'jewellery-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( JEWELLERY_LITE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'jewellery-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'jewellery-lite'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'jewellery-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( JEWELLERY_LITE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','jewellery-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'jewellery-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'jewellery-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( JEWELLERY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'jewellery-lite'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>