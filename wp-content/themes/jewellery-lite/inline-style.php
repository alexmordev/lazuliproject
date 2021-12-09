<?php

	$jewellery_lite_first_color = get_theme_mod('jewellery_lite_first_color');

	$jewellery_lite_custom_css = "";
	
	if($jewellery_lite_first_color != false){
		$jewellery_lite_custom_css .='.top-bar,span.cart-value,.more-btn a,.woocommerce span.onsale,input[type="submit"],#sidebar .tagcloud a:hover,#footer-2,#comments input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar .custom-social-icons i, #footer .custom-social-icons i,.pagination .current,.pagination a:hover,nav.woocommerce-MyAccount-navigation ul li,#footer .tagcloud a:hover, .scrollup i, #comments a.comment-reply-link, .toggle-nav i , #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #sidebar .woocommerce-product-search button, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #footer a.custom_read_more, #sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .nav-previous a:hover, .nav-next a:hover, .wp-block-button__link, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button{';
			$jewellery_lite_custom_css .='background-color: '.esc_attr($jewellery_lite_first_color).';';
		$jewellery_lite_custom_css .='}';
	}
	if($jewellery_lite_first_color != false){
		$jewellery_lite_custom_css .='a,.products li:hover h2,#sidebar ul li a:hover,.post-main-box:hover h2,#footer .custom-social-icons i:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,#footer li a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #footer a.custom_read_more:hover, .logo .site-title a:hover, .account a:hover, span.cart_no a:hover, #slider .inner_carousel h1 a:hover{';
			$jewellery_lite_custom_css .='color: '.esc_attr($jewellery_lite_first_color).';';
		$jewellery_lite_custom_css .='}';
	}
	if($jewellery_lite_first_color != false){
		$jewellery_lite_custom_css .='.main-navigation ul ul{';
			$jewellery_lite_custom_css .='border-top-color: '.esc_attr($jewellery_lite_first_color).';';
		$jewellery_lite_custom_css .='}';
	}
	if($jewellery_lite_first_color != false){
		$jewellery_lite_custom_css .='.main-navigation ul ul, .header-fixed{';
			$jewellery_lite_custom_css .='border-bottom-color: '.esc_attr($jewellery_lite_first_color).';';
		$jewellery_lite_custom_css .='}';
	}
	if($jewellery_lite_first_color != false){
		$jewellery_lite_custom_css .='.toggle a{';
			$jewellery_lite_custom_css .='background: url(assets/images/responsive_menu.png) no-repeat right center '.esc_attr($jewellery_lite_first_color).';';
		$jewellery_lite_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$jewellery_lite_theme_lay = get_theme_mod( 'jewellery_lite_width_option','Full Width');
    if($jewellery_lite_theme_lay == 'Boxed'){
		$jewellery_lite_custom_css .='body{';
			$jewellery_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='right: 100px;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.scrollup.left i{';
			$jewellery_lite_custom_css .='left: 100px;';
		$jewellery_lite_custom_css .='}';
	}else if($jewellery_lite_theme_lay == 'Wide Width'){
		$jewellery_lite_custom_css .='body{';
			$jewellery_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='right: 30px;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.scrollup.left i{';
			$jewellery_lite_custom_css .='left: 30px;';
		$jewellery_lite_custom_css .='}';
	}else if($jewellery_lite_theme_lay == 'Full Width'){
		$jewellery_lite_custom_css .='body{';
			$jewellery_lite_custom_css .='max-width: 100%;';
		$jewellery_lite_custom_css .='}';
	}

	/*-------------------- Slider Opacity -------------------*/

	$jewellery_lite_theme_lay = get_theme_mod( 'jewellery_lite_slider_opacity_color','0.8');
	if($jewellery_lite_theme_lay == '0'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.1'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.1';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.2'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.2';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.3'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.3';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.4'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.4';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.5'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.5';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.6'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.6';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.7'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.7';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.8'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.8';
		$jewellery_lite_custom_css .='}';
		}else if($jewellery_lite_theme_lay == '0.9'){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='opacity:0.9';
		$jewellery_lite_custom_css .='}';
	}

	/*----------------Slider Content Layout -------------------*/

	$jewellery_lite_theme_lay = get_theme_mod( 'jewellery_lite_slider_content_option','Left');
    if($jewellery_lite_theme_lay == 'Left'){
		$jewellery_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$jewellery_lite_custom_css .='text-align:left; left:10%; right:45%;';
		$jewellery_lite_custom_css .='}';
	}else if($jewellery_lite_theme_lay == 'Center'){
		$jewellery_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$jewellery_lite_custom_css .='text-align:center; left:20%; right:20%;';
		$jewellery_lite_custom_css .='}';
	}else if($jewellery_lite_theme_lay == 'Right'){
		$jewellery_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$jewellery_lite_custom_css .='text-align:right; left:45%; right:10%;';
		$jewellery_lite_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$jewellery_lite_slider_content_padding_top_bottom = get_theme_mod('jewellery_lite_slider_content_padding_top_bottom');
	$jewellery_lite_slider_content_padding_left_right = get_theme_mod('jewellery_lite_slider_content_padding_left_right');
	if($jewellery_lite_slider_content_padding_top_bottom != false || $jewellery_lite_slider_content_padding_left_right != false){
		$jewellery_lite_custom_css .='#slider .carousel-caption{';
			$jewellery_lite_custom_css .='top: '.esc_attr($jewellery_lite_slider_content_padding_top_bottom).'; bottom: '.esc_attr($jewellery_lite_slider_content_padding_top_bottom).';left: '.esc_attr($jewellery_lite_slider_content_padding_left_right).';right: '.esc_attr($jewellery_lite_slider_content_padding_left_right).';';
		$jewellery_lite_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$jewellery_lite_slider_height = get_theme_mod('jewellery_lite_slider_height');
	if($jewellery_lite_slider_height != false){
		$jewellery_lite_custom_css .='#slider img{';
			$jewellery_lite_custom_css .='height: '.esc_attr($jewellery_lite_slider_height).';';
		$jewellery_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$jewellery_lite_theme_lay = get_theme_mod( 'jewellery_lite_blog_layout_option','Default');
    if($jewellery_lite_theme_lay == 'Default'){
		$jewellery_lite_custom_css .='.post-main-box{';
			$jewellery_lite_custom_css .='';
		$jewellery_lite_custom_css .='}';
	}else if($jewellery_lite_theme_lay == 'Center'){
		$jewellery_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$jewellery_lite_custom_css .='text-align:center;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.post-info, .content-bttn{';
			$jewellery_lite_custom_css .='margin-top:10px;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.post-info hr{';
			$jewellery_lite_custom_css .='margin:10px auto;';
		$jewellery_lite_custom_css .='}';
	}else if($jewellery_lite_theme_lay == 'Left'){
		$jewellery_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$jewellery_lite_custom_css .='text-align:Left;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.content-bttn{';
			$jewellery_lite_custom_css .='margin:20px 0;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.post-info hr{';
			$jewellery_lite_custom_css .='margin-bottom:10px;';
		$jewellery_lite_custom_css .='}';
		$jewellery_lite_custom_css .='.post-main-box h2{';
			$jewellery_lite_custom_css .='margin-top:10px;';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_header_cart = get_theme_mod( 'jewellery_lite_my_account_hide_show',true);
    if($jewellery_lite_header_cart == true){	
		$jewellery_lite_custom_css .='span.cart-value{';
			$jewellery_lite_custom_css .='right: -20px;';
		$jewellery_lite_custom_css .='}';
	}else if($jewellery_lite_header_cart == false){
		$jewellery_lite_custom_css .='span.cart-value{';
			$jewellery_lite_custom_css .='right: -20px;';
		$jewellery_lite_custom_css .='}';
	}

	/*-------------------Responsive Media -----------------------*/

	$jewellery_lite_resp_topbar = get_theme_mod( 'jewellery_lite_resp_topbar_hide_show',false);
	if($jewellery_lite_resp_topbar == true && get_theme_mod( 'jewellery_lite_topbar_hide_show', false) == false){
    	$jewellery_lite_custom_css .='.top-bar{';
			$jewellery_lite_custom_css .='display:none;';
		$jewellery_lite_custom_css .='} ';
	}
    if($jewellery_lite_resp_topbar == true){
    	$jewellery_lite_custom_css .='@media screen and (max-width:575px) {';
		$jewellery_lite_custom_css .='.top-bar{';
			$jewellery_lite_custom_css .='display:block;';
		$jewellery_lite_custom_css .='} }';
	}else if($jewellery_lite_resp_topbar == false){
		$jewellery_lite_custom_css .='@media screen and (max-width:575px) {';
		$jewellery_lite_custom_css .='.top-bar{';
			$jewellery_lite_custom_css .='display:none;';
		$jewellery_lite_custom_css .='} }';
	}

	$jewellery_lite_resp_stickyheader = get_theme_mod( 'jewellery_lite_stickyheader_hide_show',false);
	if($jewellery_lite_resp_stickyheader == true && get_theme_mod( 'jewellery_lite_sticky_header',false) != true){
    	$jewellery_lite_custom_css .='.header-fixed{';
			$jewellery_lite_custom_css .='position:static;';
		$jewellery_lite_custom_css .='} ';
	}
    if($jewellery_lite_resp_stickyheader == true){
    	$jewellery_lite_custom_css .='@media screen and (max-width:575px) {';
		$jewellery_lite_custom_css .='.header-fixed{';
			$jewellery_lite_custom_css .='position:fixed;';
		$jewellery_lite_custom_css .='} }';
	}else if($jewellery_lite_resp_stickyheader == false){
		$jewellery_lite_custom_css .='@media screen and (max-width:575px){';
		$jewellery_lite_custom_css .='.header-fixed{';
			$jewellery_lite_custom_css .='position:static;';
		$jewellery_lite_custom_css .='} }';
	}

	$jewellery_lite_resp_slider = get_theme_mod( 'jewellery_lite_resp_slider_hide_show',false);
	if($jewellery_lite_resp_slider == true && get_theme_mod( 'jewellery_lite_slider_hide_show', false) == false){
    	$jewellery_lite_custom_css .='#slider{';
			$jewellery_lite_custom_css .='display:none;';
		$jewellery_lite_custom_css .='} ';
	}
    if($jewellery_lite_resp_slider == true){
    	$jewellery_lite_custom_css .='@media screen and (max-width:575px) {';
		$jewellery_lite_custom_css .='#slider{';
			$jewellery_lite_custom_css .='display:block;';
		$jewellery_lite_custom_css .='} }';
	}else if($jewellery_lite_resp_slider == false){
		$jewellery_lite_custom_css .='@media screen and (max-width:575px) {';
		$jewellery_lite_custom_css .='#slider{';
			$jewellery_lite_custom_css .='display:none;';
		$jewellery_lite_custom_css .='} }';
	}

	$jewellery_lite_resp_sidebar = get_theme_mod( 'jewellery_lite_sidebar_hide_show',true);
    if($jewellery_lite_resp_sidebar == true){
    	$jewellery_lite_custom_css .='@media screen and (max-width:575px) {';
		$jewellery_lite_custom_css .='#sidebar{';
			$jewellery_lite_custom_css .='display:block;';
		$jewellery_lite_custom_css .='} }';
	}else if($jewellery_lite_resp_sidebar == false){
		$jewellery_lite_custom_css .='@media screen and (max-width:575px) {';
		$jewellery_lite_custom_css .='#sidebar{';
			$jewellery_lite_custom_css .='display:none;';
		$jewellery_lite_custom_css .='} }';
	}

	$jewellery_lite_resp_scroll_top = get_theme_mod( 'jewellery_lite_resp_scroll_top_hide_show',true);
	if($jewellery_lite_resp_scroll_top == true && get_theme_mod( 'jewellery_lite_hide_show_scroll',true) != true){
    	$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='visibility:hidden !important;';
		$jewellery_lite_custom_css .='} ';
	}
    if($jewellery_lite_resp_scroll_top == true){
    	$jewellery_lite_custom_css .='@media screen and (max-width:575px) {';
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='visibility:visible !important;';
		$jewellery_lite_custom_css .='} }';
	}else if($jewellery_lite_resp_scroll_top == false){
		$jewellery_lite_custom_css .='@media screen and (max-width:575px){';
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='visibility:hidden !important;';
		$jewellery_lite_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$jewellery_lite_topbar_padding_top_bottom = get_theme_mod('jewellery_lite_topbar_padding_top_bottom');
	if($jewellery_lite_topbar_padding_top_bottom != false){
		$jewellery_lite_custom_css .='.top-bar{';
			$jewellery_lite_custom_css .='padding-top: '.esc_attr($jewellery_lite_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($jewellery_lite_topbar_padding_top_bottom).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_navigation_menu_font_size = get_theme_mod('jewellery_lite_navigation_menu_font_size');
	if($jewellery_lite_navigation_menu_font_size != false){
		$jewellery_lite_custom_css .='.main-navigation a{';
			$jewellery_lite_custom_css .='font-size: '.esc_attr($jewellery_lite_navigation_menu_font_size).';';
		$jewellery_lite_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$jewellery_lite_sticky_header_padding = get_theme_mod('jewellery_lite_sticky_header_padding');
	if($jewellery_lite_sticky_header_padding != false){
		$jewellery_lite_custom_css .='.header-fixed{';
			$jewellery_lite_custom_css .='padding: '.esc_attr($jewellery_lite_sticky_header_padding).';';
		$jewellery_lite_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$jewellery_lite_button_padding_top_bottom = get_theme_mod('jewellery_lite_button_padding_top_bottom');
	$jewellery_lite_button_padding_left_right = get_theme_mod('jewellery_lite_button_padding_left_right');
	if($jewellery_lite_button_padding_top_bottom != false || $jewellery_lite_button_padding_left_right != false){
		$jewellery_lite_custom_css .='.post-main-box .more-btn a{';
			$jewellery_lite_custom_css .='padding-top: '.esc_attr($jewellery_lite_button_padding_top_bottom).'; padding-bottom: '.esc_attr($jewellery_lite_button_padding_top_bottom).';padding-left: '.esc_attr($jewellery_lite_button_padding_left_right).';padding-right: '.esc_attr($jewellery_lite_button_padding_left_right).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_button_border_radius = get_theme_mod('jewellery_lite_button_border_radius');
	if($jewellery_lite_button_border_radius != false){
		$jewellery_lite_custom_css .='.post-main-box .more-btn a{';
			$jewellery_lite_custom_css .='border-radius: '.esc_attr($jewellery_lite_button_border_radius).'px;';
		$jewellery_lite_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$jewellery_lite_featured_image_border_radius = get_theme_mod('jewellery_lite_featured_image_border_radius', 0);
	if($jewellery_lite_featured_image_border_radius != false){
		$jewellery_lite_custom_css .='.box-image img, .feature-box img{';
			$jewellery_lite_custom_css .='border-radius: '.esc_attr($jewellery_lite_featured_image_border_radius).'px;';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_single_blog_post_navigation_show_hide = get_theme_mod('jewellery_lite_single_blog_post_navigation_show_hide',true);
	if($jewellery_lite_single_blog_post_navigation_show_hide != true){
		$jewellery_lite_custom_css .='.post-navigation{';
			$jewellery_lite_custom_css .='display: none;';
		$jewellery_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$jewellery_lite_footer_background_color = get_theme_mod('jewellery_lite_footer_background_color');
	if($jewellery_lite_footer_background_color != false){
		$jewellery_lite_custom_css .='#footer{';
			$jewellery_lite_custom_css .='background-color: '.esc_attr($jewellery_lite_footer_background_color).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_copyright_font_size = get_theme_mod('jewellery_lite_copyright_font_size');
	if($jewellery_lite_copyright_font_size != false){
		$jewellery_lite_custom_css .='.copyright p{';
			$jewellery_lite_custom_css .='font-size: '.esc_attr($jewellery_lite_copyright_font_size).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_copyright_padding_top_bottom = get_theme_mod('jewellery_lite_copyright_padding_top_bottom');
	if($jewellery_lite_copyright_padding_top_bottom != false){
		$jewellery_lite_custom_css .='#footer-2{';
			$jewellery_lite_custom_css .='padding-top: '.esc_attr($jewellery_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($jewellery_lite_copyright_padding_top_bottom).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_copyright_alingment = get_theme_mod('jewellery_lite_copyright_alingment');
	if($jewellery_lite_copyright_alingment != false){
		$jewellery_lite_custom_css .='.copyright p{';
			$jewellery_lite_custom_css .='text-align: '.esc_attr($jewellery_lite_copyright_alingment).';';
		$jewellery_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$jewellery_lite_scroll_to_top_font_size = get_theme_mod('jewellery_lite_scroll_to_top_font_size');
	if($jewellery_lite_scroll_to_top_font_size != false){
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='font-size: '.esc_attr($jewellery_lite_scroll_to_top_font_size).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_scroll_to_top_padding = get_theme_mod('jewellery_lite_scroll_to_top_padding');
	$jewellery_lite_scroll_to_top_padding = get_theme_mod('jewellery_lite_scroll_to_top_padding');
	if($jewellery_lite_scroll_to_top_padding != false){
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='padding-top: '.esc_attr($jewellery_lite_scroll_to_top_padding).';padding-bottom: '.esc_attr($jewellery_lite_scroll_to_top_padding).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_scroll_to_top_width = get_theme_mod('jewellery_lite_scroll_to_top_width');
	if($jewellery_lite_scroll_to_top_width != false){
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='width: '.esc_attr($jewellery_lite_scroll_to_top_width).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_scroll_to_top_height = get_theme_mod('jewellery_lite_scroll_to_top_height');
	if($jewellery_lite_scroll_to_top_height != false){
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='height: '.esc_attr($jewellery_lite_scroll_to_top_height).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_scroll_to_top_border_radius = get_theme_mod('jewellery_lite_scroll_to_top_border_radius');
	if($jewellery_lite_scroll_to_top_border_radius != false){
		$jewellery_lite_custom_css .='.scrollup i{';
			$jewellery_lite_custom_css .='border-radius: '.esc_attr($jewellery_lite_scroll_to_top_border_radius).'px;';
		$jewellery_lite_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$jewellery_lite_social_icon_font_size = get_theme_mod('jewellery_lite_social_icon_font_size');
	if($jewellery_lite_social_icon_font_size != false){
		$jewellery_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$jewellery_lite_custom_css .='font-size: '.esc_attr($jewellery_lite_social_icon_font_size).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_social_icon_padding = get_theme_mod('jewellery_lite_social_icon_padding');
	if($jewellery_lite_social_icon_padding != false){
		$jewellery_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$jewellery_lite_custom_css .='padding: '.esc_attr($jewellery_lite_social_icon_padding).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_social_icon_width = get_theme_mod('jewellery_lite_social_icon_width');
	if($jewellery_lite_social_icon_width != false){
		$jewellery_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$jewellery_lite_custom_css .='width: '.esc_attr($jewellery_lite_social_icon_width).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_social_icon_height = get_theme_mod('jewellery_lite_social_icon_height');
	if($jewellery_lite_social_icon_height != false){
		$jewellery_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$jewellery_lite_custom_css .='height: '.esc_attr($jewellery_lite_social_icon_height).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_social_icon_border_radius = get_theme_mod('jewellery_lite_social_icon_border_radius');
	if($jewellery_lite_social_icon_border_radius != false){
		$jewellery_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$jewellery_lite_custom_css .='border-radius: '.esc_attr($jewellery_lite_social_icon_border_radius).'px;';
		$jewellery_lite_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$jewellery_lite_products_padding_top_bottom = get_theme_mod('jewellery_lite_products_padding_top_bottom');
	if($jewellery_lite_products_padding_top_bottom != false){
		$jewellery_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$jewellery_lite_custom_css .='padding-top: '.esc_attr($jewellery_lite_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($jewellery_lite_products_padding_top_bottom).'!important;';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_products_padding_left_right = get_theme_mod('jewellery_lite_products_padding_left_right');
	if($jewellery_lite_products_padding_left_right != false){
		$jewellery_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$jewellery_lite_custom_css .='padding-left: '.esc_attr($jewellery_lite_products_padding_left_right).'!important; padding-right: '.esc_attr($jewellery_lite_products_padding_left_right).'!important;';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_products_box_shadow = get_theme_mod('jewellery_lite_products_box_shadow');
	if($jewellery_lite_products_box_shadow != false){
		$jewellery_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$jewellery_lite_custom_css .='box-shadow: '.esc_attr($jewellery_lite_products_box_shadow).'px '.esc_attr($jewellery_lite_products_box_shadow).'px '.esc_attr($jewellery_lite_products_box_shadow).'px #ddd;';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_products_border_radius = get_theme_mod('jewellery_lite_products_border_radius');
	if($jewellery_lite_products_border_radius != false){
		$jewellery_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$jewellery_lite_custom_css .='border-radius: '.esc_attr($jewellery_lite_products_border_radius).'px;';
		$jewellery_lite_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$jewellery_lite_site_title_font_size = get_theme_mod('jewellery_lite_site_title_font_size');
	if($jewellery_lite_site_title_font_size != false){
		$jewellery_lite_custom_css .='.logo h1, .logo p.site-title{';
			$jewellery_lite_custom_css .='font-size: '.esc_attr($jewellery_lite_site_title_font_size).';';
		$jewellery_lite_custom_css .='}';
	}

	// Site tagline Font Size
	$jewellery_lite_site_tagline_font_size = get_theme_mod('jewellery_lite_site_tagline_font_size');
	if($jewellery_lite_site_tagline_font_size != false){
		$jewellery_lite_custom_css .='.logo p.site-description{';
			$jewellery_lite_custom_css .='font-size: '.esc_attr($jewellery_lite_site_tagline_font_size).';';
		$jewellery_lite_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$jewellery_lite_preloader_bg_color = get_theme_mod('jewellery_lite_preloader_bg_color');
	if($jewellery_lite_preloader_bg_color != false){
		$jewellery_lite_custom_css .='#preloader{';
			$jewellery_lite_custom_css .='background-color: '.esc_attr($jewellery_lite_preloader_bg_color).';';
		$jewellery_lite_custom_css .='}';
	}

	$jewellery_lite_preloader_border_color = get_theme_mod('jewellery_lite_preloader_border_color');
	if($jewellery_lite_preloader_border_color != false){
		$jewellery_lite_custom_css .='.loader-line{';
			$jewellery_lite_custom_css .='border-color: '.esc_attr($jewellery_lite_preloader_border_color).'!important;';
		$jewellery_lite_custom_css .='}';
	}
