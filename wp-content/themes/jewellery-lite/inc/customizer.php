<?php
/**
 * Jewellery Lite Theme Customizer
 *
 * @package Jewellery Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function jewellery_lite_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'jewellery_lite_custom_controls' );

function jewellery_lite_customize_register( $wp_customize ) {

    load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'blogname', array( 
        'selector' => '.logo .site-title a', 
        'render_callback' => 'jewellery_lite_customize_partial_blogname', 
    )); 

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
        'selector' => 'p.site-description', 
        'render_callback' => 'jewellery_lite_customize_partial_blogdescription', 
    ));

    $JewelleryLiteParentPanel = new Jewellery_Lite_WP_Customize_Panel( $wp_customize, 'jewellery_lite_panel_id', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'VW Settings', 'jewellery-lite' ),
        'priority' => 10,
    ));

	// Layout
	$wp_customize->add_section( 'jewellery_lite_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'jewellery-lite' ),
		'panel' => 'jewellery_lite_panel_id'
	) );

	$wp_customize->add_setting('jewellery_lite_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Jewellery_Lite_Image_Radio_Control($wp_customize, 'jewellery_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','jewellery-lite'),
        'description' => __('Here you can change the width layout of Website.','jewellery-lite'),
        'section' => 'jewellery_lite_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('jewellery_lite_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'	        
	) );
	$wp_customize->add_control('jewellery_lite_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','jewellery-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','jewellery-lite'),
        'section' => 'jewellery_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','jewellery-lite'),
            'Right Sidebar' => __('Right Sidebar','jewellery-lite'),
            'One Column' => __('One Column','jewellery-lite'),
            'Three Columns' => __('Three Columns','jewellery-lite'),
            'Four Columns' => __('Four Columns','jewellery-lite'),
            'Grid Layout' => __('Grid Layout','jewellery-lite')
        ),
	));

	$wp_customize->add_setting('jewellery_lite_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));
	$wp_customize->add_control('jewellery_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','jewellery-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','jewellery-lite'),
        'section' => 'jewellery_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','jewellery-lite'),
            'Right Sidebar' => __('Right Sidebar','jewellery-lite'),
            'One Column' => __('One Column','jewellery-lite')
        ),
	) );

	$wp_customize->add_setting( 'jewellery_lite_sidebar',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_sidebar',array(
      	'label' => esc_html__( 'Show / Hide Homepage Sidebar','jewellery-lite' ),
      	'section' => 'jewellery_lite_left_right'
    )));

    //Pre-Loader
	$wp_customize->add_setting( 'jewellery_lite_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','jewellery-lite' ),
        'section' => 'jewellery_lite_left_right'
    )));

	$wp_customize->add_setting('jewellery_lite_preloader_bg_color', array(
        'default'           => '#f8ae57',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'jewellery_lite_preloader_bg_color', array(
        'label'    => __('Pre-Loader Background Color', 'jewellery-lite'),
        'section'  => 'jewellery_lite_left_right',
    )));

    $wp_customize->add_setting('jewellery_lite_preloader_border_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'jewellery_lite_preloader_border_color', array(
        'label'    => __('Pre-Loader Border Color', 'jewellery-lite'),
        'section'  => 'jewellery_lite_left_right',
    )));

	//Top Bar
	$wp_customize->add_section( 'jewellery_lite_topbar', array(
    	'title'      => __( 'Top Bar Settings', 'jewellery-lite' ),
		'panel' => 'jewellery_lite_panel_id'
	) );

	$wp_customize->add_setting( 'jewellery_lite_topbar_hide_show',array(
          'default' => 0,
          'transport' => 'refresh',
          'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_topbar_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Topbar','jewellery-lite' ),
          'section' => 'jewellery_lite_topbar'
    )));

    $wp_customize->add_setting('jewellery_lite_topbar_padding_top_bottom',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_topbar_padding_top_bottom',array(
        'label' => __('Topbar Padding Top Bottom','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_topbar',
        'type'=> 'text'
    ));

    //Sticky Header
	$wp_customize->add_setting( 'jewellery_lite_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','jewellery-lite' ),
        'section' => 'jewellery_lite_topbar'
    )));

    $wp_customize->add_setting('jewellery_lite_sticky_header_padding',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_sticky_header_padding',array(
        'label' => __('Sticky Header Padding','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_topbar',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_navigation_menu_font_size',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_navigation_menu_font_size',array(
        'label' => __('Menus Font Size','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_topbar',
        'type'=> 'text'
    ));

	$wp_customize->add_setting( 'jewellery_lite_order_tracking',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_order_tracking',array(
      	'label' => esc_html__( 'Show / Hide Order Tracker','jewellery-lite' ),
      	'section' => 'jewellery_lite_topbar'
    )));

    $wp_customize->add_setting( 'jewellery_lite_my_account_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_my_account_hide_show',
       array(
		'label' => esc_html__( 'Show / Hide My Account','jewellery-lite' ),
		'section' => 'jewellery_lite_topbar'
    )));

    $wp_customize->add_setting( 'jewellery_lite_cart_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_cart_hide_show',
       array(
		'label' => esc_html__( 'Show / Hide Cart','jewellery-lite' ),
		'section' => 'jewellery_lite_topbar'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('jewellery_lite_phone_number', array( 
        'selector' => '.top-bar p', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_phone_number', 
    ));

	$wp_customize->add_setting('jewellery_lite_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'jewellery_lite_sanitize_phone_number'
	));
	$wp_customize->add_control('jewellery_lite_phone_number',array(
		'label'	=> __('Add Phone Number','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( '+00 1236 123 456', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting('jewellery_lite_location_icon',array(
        'default'   => 'fas fa-map-marker-alt',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Jewellery_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'jewellery_lite_location_icon',array(
        'label' => __('Add Location Icon','jewellery-lite'),
        'transport' => 'refresh',
        'section'   => 'jewellery_lite_topbar',
        'setting'   => 'jewellery_lite_location_icon',
        'type'      => 'icon'
    )));

	$wp_customize->add_setting('jewellery_lite_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jewellery_lite_location',array(
		'label'	=> __('Add Location','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( '123 Dunmmy street lorem ipsum, USA', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_topbar',
		'type'=> 'text'
	));	

    $wp_customize->add_setting('jewellery_lite_order_tracking_icon',array(
        'default'   => 'fas fa-truck',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Jewellery_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'jewellery_lite_order_tracking_icon',array(
        'label' => __('Add Order Tracking Icon','jewellery-lite'),
        'transport' => 'refresh',
        'section'   => 'jewellery_lite_topbar',
        'setting'   => 'jewellery_lite_order_tracking_icon',
        'type'      => 'icon'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('jewellery_lite_my_account_icon', array( 
        'selector' => '.account', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_my_account_icon', 
    ));

    $wp_customize->add_setting('jewellery_lite_my_account_icon',array(
        'default'   => 'fas fa-sign-in-alt',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Jewellery_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'jewellery_lite_my_account_icon',array(
        'label' => __('Add My Account Icon','jewellery-lite'),
        'transport' => 'refresh',
        'section'   => 'jewellery_lite_topbar',
        'setting'   => 'jewellery_lite_my_account_icon',
        'type'      => 'icon'
    )));

    $wp_customize->add_setting('jewellery_lite_cart_icon',array(
        'default'   => 'fas fa-shopping-cart',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Jewellery_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'jewellery_lite_cart_icon',array(
        'label' => __('Add Cart Icon','jewellery-lite'),
        'transport' => 'refresh',
        'section'   => 'jewellery_lite_topbar',
        'setting'   => 'jewellery_lite_cart_icon',
        'type'      => 'icon'
    )));
    
	//Slider
	$wp_customize->add_section( 'jewellery_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'jewellery-lite' ),
		'panel' => 'jewellery_lite_panel_id'
	) );

	$wp_customize->add_setting( 'jewellery_lite_slider_hide_show',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','jewellery-lite' ),
      	'section' => 'jewellery_lite_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('jewellery_lite_slider_hide_show',array(
        'selector'        => '#slider .inner_carousel h1',
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_slider_hide_show',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'jewellery_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'jewellery_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'jewellery_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'jewellery-lite' ),
			'description' => __('Slider image size (1500 x 800)','jewellery-lite'),
			'section'  => 'jewellery_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

    $wp_customize->add_setting('jewellery_lite_slider_button_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_slider_button_text',array(
        'label' => __('Add Slider Button Text','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_slidersettings',
        'type'=> 'text'
    ));

	//content layout
	$wp_customize->add_setting('jewellery_lite_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Jewellery_Lite_Image_Radio_Control($wp_customize, 'jewellery_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','jewellery-lite'),
        'section' => 'jewellery_lite_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider content padding
    $wp_customize->add_setting('jewellery_lite_slider_content_padding_top_bottom',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_slider_content_padding_top_bottom',array(
        'label' => __('Slider Content Padding Top Bottom','jewellery-lite'),
        'description'   => __('Enter a value in %. Example:20%','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '50%', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_slidersettings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_slider_content_padding_left_right',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_slider_content_padding_left_right',array(
        'label' => __('Slider Content Padding Left Right','jewellery-lite'),
        'description'   => __('Enter a value in %. Example:20%','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '50%', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_slidersettings',
        'type'=> 'text'
    ));

    //Slider excerpt
	$wp_customize->add_setting( 'jewellery_lite_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'jewellery_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'jewellery_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','jewellery-lite' ),
		'section'     => 'jewellery_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'jewellery_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('jewellery_lite_slider_opacity_color',array(
      'default'              => 0.8,
      'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'jewellery_lite_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','jewellery-lite' ),
	'section'     => 'jewellery_lite_slidersettings',
	'type'        => 'select',
	'settings'    => 'jewellery_lite_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','jewellery-lite'),
      '0.1' =>  esc_attr('0.1','jewellery-lite'),
      '0.2' =>  esc_attr('0.2','jewellery-lite'),
      '0.3' =>  esc_attr('0.3','jewellery-lite'),
      '0.4' =>  esc_attr('0.4','jewellery-lite'),
      '0.5' =>  esc_attr('0.5','jewellery-lite'),
      '0.6' =>  esc_attr('0.6','jewellery-lite'),
      '0.7' =>  esc_attr('0.7','jewellery-lite'),
      '0.8' =>  esc_attr('0.8','jewellery-lite'),
      '0.9' =>  esc_attr('0.9','jewellery-lite')
	),
	));

    //Slider height
    $wp_customize->add_setting('jewellery_lite_slider_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_slider_height',array(
        'label' => __('Slider Height','jewellery-lite'),
        'description'   => __('Specify the slider height (px).','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_slidersettings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'jewellery_lite_slider_speed', array(
        'default'  => 4000,
        'sanitize_callback' => 'jewellery_lite_sanitize_float'
    ) );
    $wp_customize->add_control( 'jewellery_lite_slider_speed', array(
        'label' => esc_html__('Slider Transition Speed','jewellery-lite'),
        'section' => 'jewellery_lite_slidersettings',
        'type'  => 'number',
    ) );

    //Blog Post
    $wp_customize->add_panel( $JewelleryLiteParentPanel );

    $BlogPostParentPanel = new Jewellery_Lite_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
        'title' => __( 'Blog Post Settings', 'jewellery-lite' ),
        'panel' => 'jewellery_lite_panel_id',
    ));

    $wp_customize->add_panel( $BlogPostParentPanel );

    // Add example section and controls to the middle (second) panel
    $wp_customize->add_section( 'jewellery_lite_post_settings', array(
        'title' => __( 'Post Settings', 'jewellery-lite' ),
        'panel' => 'blog_post_parent_panel',
    ));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('jewellery_lite_toggle_postdate', array( 
        'selector' => '.post-main-box h2 a', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_toggle_postdate', 
    ));

	$wp_customize->add_setting( 'jewellery_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','jewellery-lite' ),
        'section' => 'jewellery_lite_post_settings'
    )));

    $wp_customize->add_setting( 'jewellery_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_toggle_author',array(
		'label' => esc_html__( 'Author','jewellery-lite' ),
		'section' => 'jewellery_lite_post_settings'
    )));

    $wp_customize->add_setting( 'jewellery_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','jewellery-lite' ),
		'section' => 'jewellery_lite_post_settings'
    )));

    $wp_customize->add_setting( 'jewellery_lite_toggle_time',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_toggle_time',array(
        'label' => esc_html__( 'Time','jewellery-lite' ),
        'section' => 'jewellery_lite_post_settings'
    )));

    $wp_customize->add_setting( 'jewellery_lite_featured_image_hide_show',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_featured_image_hide_show', array(
        'label' => esc_html__( 'Featured Image','jewellery-lite' ),
        'section' => 'jewellery_lite_post_settings'
    )));

    $wp_customize->add_setting( 'jewellery_lite_featured_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'jewellery_lite_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'jewellery_lite_featured_image_border_radius', array(
        'label'       => esc_html__( 'Featured Image Border Radius','jewellery-lite' ),
        'section'     => 'jewellery_lite_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'jewellery_lite_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'jewellery_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'jewellery_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','jewellery-lite' ),
		'section'     => 'jewellery_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'jewellery_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('jewellery_lite_meta_field_separator',array(
        'default'=> '|',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_meta_field_separator',array(
        'label' => __('Add Meta Separator','jewellery-lite'),
        'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','jewellery-lite'),
        'section'=> 'jewellery_lite_post_settings',
        'type'=> 'text'
    ));

	//Blog layout
    $wp_customize->add_setting('jewellery_lite_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
    ));
    $wp_customize->add_control(new Jewellery_Lite_Image_Radio_Control($wp_customize, 'jewellery_lite_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','jewellery-lite'),
        'section' => 'jewellery_lite_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('jewellery_lite_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
    ));
    $wp_customize->add_control('jewellery_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','jewellery-lite'),
        'section' => 'jewellery_lite_post_settings',
        'choices' => array(
            'Content' => __('Content','jewellery-lite'),
            'Excerpt' => __('Excerpt','jewellery-lite'),
            'No Content' => __('No Content','jewellery-lite')
        ),
    ) );

    $wp_customize->add_setting('jewellery_lite_excerpt_suffix',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_excerpt_suffix',array(
        'label' => __('Add Excerpt Suffix','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '[...]', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'jewellery_lite_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','jewellery-lite' ),
      'section' => 'jewellery_lite_post_settings'
    )));

    $wp_customize->add_setting( 'jewellery_lite_blog_pagination_type', array(
        'default'           => 'blog-page-numbers',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'jewellery_lite_blog_pagination_type', array(
        'section' => 'jewellery_lite_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'jewellery-lite' ),
        'choices'       => array(
            'blog-page-numbers'  => __( 'Numeric', 'jewellery-lite' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'jewellery-lite' ),
    )));

     // Button Settings
    $wp_customize->add_section( 'jewellery_lite_button_settings', array(
        'title' => __( 'Button Settings', 'jewellery-lite' ),
        'panel' => 'blog_post_parent_panel',
    ));

    $wp_customize->add_setting('jewellery_lite_button_padding_top_bottom',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_button_padding_top_bottom',array(
        'label' => __('Padding Top Bottom','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_button_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_button_padding_left_right',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_button_padding_left_right',array(
        'label' => __('Padding Left Right','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_button_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'jewellery_lite_button_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'jewellery_lite_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'jewellery_lite_button_border_radius', array(
        'label'       => esc_html__( 'Button Border Radius','jewellery-lite' ),
        'section'     => 'jewellery_lite_button_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('jewellery_lite_button_text', array( 
        'selector' => '.new-text .more-btn a', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_button_text', 
    ));

    $wp_customize->add_setting('jewellery_lite_button_text',array(
		'default'=> esc_html__( 'READ MORE', 'jewellery-lite' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jewellery_lite_button_text',array(
		'label'	=> __('Add Button Text','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_blog_post',
		'type'=> 'text'
	));

    // Related Post Settings
    $wp_customize->add_section( 'jewellery_lite_related_posts_settings', array(
        'title' => __( 'Related Posts Settings', 'jewellery-lite' ),
        'panel' => 'blog_post_parent_panel',
    ));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('jewellery_lite_related_post_title', array( 
        'selector' => '.related-post h3', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_related_post_title', 
    ));

    $wp_customize->add_setting( 'jewellery_lite_related_post',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_related_post',array(
        'label' => esc_html__( 'Related Post','jewellery-lite' ),
        'section' => 'jewellery_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('jewellery_lite_related_post_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_related_post_title',array(
        'label' => __('Add Related Post Title','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_related_posts_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_related_posts_count',array(
        'default'=> '3',
        'sanitize_callback' => 'jewellery_lite_sanitize_float'
    ));
    $wp_customize->add_control('jewellery_lite_related_posts_count',array(
        'label' => __('Add Related Post Count','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '3', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_related_posts_settings',
        'type'=> 'number'
    ));

    // Single Posts Settings
    $wp_customize->add_section( 'jewellery_lite_single_blog_settings', array(
        'title' => __( 'Single Post Settings', 'jewellery-lite' ),
        'panel' => 'blog_post_parent_panel',
    ));

    $wp_customize->add_setting( 'jewellery_lite_toggle_tags',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_toggle_tags', array(
        'label' => esc_html__( 'Tags','jewellery-lite' ),
        'section' => 'jewellery_lite_single_blog_settings'
    )));

    $wp_customize->add_setting( 'jewellery_lite_single_blog_post_navigation_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_single_blog_post_navigation_show_hide', array(
        'label' => esc_html__( 'Post Navigation','jewellery-lite' ),
        'section' => 'jewellery_lite_single_blog_settings'
    )));

    //navigation text
    $wp_customize->add_setting('jewellery_lite_single_blog_prev_navigation_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_single_blog_prev_navigation_text',array(
        'label' => __('Post Navigation Text','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_single_blog_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_single_blog_next_navigation_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_single_blog_next_navigation_text',array(
        'label' => __('Post Navigation Text','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_single_blog_settings',
        'type'=> 'text'
    ));

    //404 Page Setting
	$wp_customize->add_section('jewellery_lite_404_page',array(
		'title'	=> __('404 Page Settings','jewellery-lite'),
		'panel' => 'jewellery_lite_panel_id',
	));	

	$wp_customize->add_setting('jewellery_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('jewellery_lite_404_page_title',array(
		'label'	=> __('Add Title','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('jewellery_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('jewellery_lite_404_page_content',array(
		'label'	=> __('Add Text','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('jewellery_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('jewellery_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_404_page',
		'type'=> 'text'
	));

    //Social Icon Setting
    $wp_customize->add_section('jewellery_lite_social_icon_settings',array(
        'title' => __('Social Icons Settings','jewellery-lite'),
        'panel' => 'jewellery_lite_panel_id',
    )); 

    $wp_customize->add_setting('jewellery_lite_social_icon_font_size',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_social_icon_font_size',array(
        'label' => __('Icon Font Size','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_social_icon_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_social_icon_padding',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_social_icon_padding',array(
        'label' => __('Icon Padding','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_social_icon_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_social_icon_width',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_social_icon_width',array(
        'label' => __('Icon Width','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_social_icon_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_social_icon_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_social_icon_height',array(
        'label' => __('Icon Height','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_social_icon_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'jewellery_lite_social_icon_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'jewellery_lite_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'jewellery_lite_social_icon_border_radius', array(
        'label'       => esc_html__( 'Icon Border Radius','jewellery-lite' ),
        'section'     => 'jewellery_lite_social_icon_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

	//Responsive Media Settings
	$wp_customize->add_section('jewellery_lite_responsive_media',array(
		'title'	=> __('Responsive Media','jewellery-lite'),
		'panel' => 'jewellery_lite_panel_id',
	));

	$wp_customize->add_setting( 'jewellery_lite_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','jewellery-lite' ),
      'section' => 'jewellery_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'jewellery_lite_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','jewellery-lite' ),
      'section' => 'jewellery_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'jewellery_lite_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','jewellery-lite' ),
      'section' => 'jewellery_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'jewellery_lite_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','jewellery-lite' ),
      'section' => 'jewellery_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'jewellery_lite_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','jewellery-lite' ),
      'section' => 'jewellery_lite_responsive_media'
    )));

    $wp_customize->add_setting('jewellery_lite_res_open_menu_icon',array(
        'default'   => 'fas fa-bars',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Jewellery_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'jewellery_lite_res_open_menu_icon',array(
        'label' => __('Add Open Menu Icon','jewellery-lite'),
        'transport' => 'refresh',
        'section'   => 'jewellery_lite_responsive_media',
        'setting'   => 'jewellery_lite_res_open_menu_icon',
        'type'      => 'icon'
    )));

    $wp_customize->add_setting('jewellery_lite_res_close_menus_icon',array(
        'default'   => 'fas fa-times',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Jewellery_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'jewellery_lite_res_close_menus_icon',array(
        'label' => __('Add Close Menu Icon','jewellery-lite'),
        'transport' => 'refresh',
        'section'   => 'jewellery_lite_responsive_media',
        'setting'   => 'jewellery_lite_res_close_menus_icon',
        'type'      => 'icon'
    )));

	//Footer Text
	$wp_customize->add_section('jewellery_lite_footer',array(
		'title'	=> __('Footer Settings','jewellery-lite'),
		'panel' => 'jewellery_lite_panel_id',
	));	

    $wp_customize->add_setting('jewellery_lite_footer_background_color', array(
        'default'           => '#24272e',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'jewellery_lite_footer_background_color', array(
        'label'    => __('Footer Background Color', 'jewellery-lite'),
        'section'  => 'jewellery_lite_footer',
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('jewellery_lite_footer_text', array( 
        'selector' => '.copyright p', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_footer_text', 
    ));
	
	$wp_customize->add_setting('jewellery_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('jewellery_lite_footer_text',array(
		'label'	=> __('Copyright Text','jewellery-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'jewellery-lite' ),
        ),
		'section'=> 'jewellery_lite_footer',
		'type'=> 'text'
	));	

    $wp_customize->add_setting('jewellery_lite_copyright_font_size',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_copyright_font_size',array(
        'label' => __('Copyright Font Size','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_footer',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_copyright_padding_top_bottom',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_copyright_padding_top_bottom',array(
        'label' => __('Copyright Padding Top Bottom','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_footer',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
    ));
    $wp_customize->add_control(new Jewellery_Lite_Image_Radio_Control($wp_customize, 'jewellery_lite_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','jewellery-lite'),
        'section' => 'jewellery_lite_footer',
        'settings' => 'jewellery_lite_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'jewellery_lite_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','jewellery-lite' ),
      	'section' => 'jewellery_lite_footer'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('jewellery_lite_scroll_top_icon', array( 
        'selector' => '.scrollup i', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_scroll_top_icon', 
    ));

    $wp_customize->add_setting('jewellery_lite_scroll_top_icon',array(
        'default'   => 'fas fa-long-arrow-alt-up',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Jewellery_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'jewellery_lite_scroll_top_icon',array(
        'label' => __('Add Scroll to Top Icon','jewellery-lite'),
        'transport' => 'refresh',
        'section'   => 'jewellery_lite_footer',
        'setting'   => 'jewellery_lite_scroll_top_icon',
        'type'      => 'icon'
    )));

    $wp_customize->add_setting('jewellery_lite_scroll_to_top_font_size',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_scroll_to_top_font_size',array(
        'label' => __('Icon Font Size','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_footer',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_scroll_to_top_padding',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_scroll_to_top_padding',array(
        'label' => __('Icon Top Bottom Padding','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_footer',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_scroll_to_top_width',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_scroll_to_top_width',array(
        'label' => __('Icon Width','jewellery-lite'),
        'description'   => __('Enter a value in pixels Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_footer',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_scroll_to_top_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_scroll_to_top_height',array(
        'label' => __('Icon Height','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_footer',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'jewellery_lite_scroll_to_top_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'jewellery_lite_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'jewellery_lite_scroll_to_top_border_radius', array(
        'label'       => esc_html__( 'Icon Border Radius','jewellery-lite' ),
        'section'     => 'jewellery_lite_footer',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

	$wp_customize->add_setting('jewellery_lite_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Jewellery_Lite_Image_Radio_Control($wp_customize, 'jewellery_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','jewellery-lite'),
        'section' => 'jewellery_lite_footer',
        'settings' => 'jewellery_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
    $wp_customize->add_section('jewellery_lite_woocommerce_section', array(
        'title'    => __('WooCommerce Layout', 'jewellery-lite'),
        'priority' => null,
        'panel'    => 'woocommerce',
    ));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'jewellery_lite_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
    $wp_customize->add_setting( 'jewellery_lite_woocommerce_shop_page_sidebar',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_woocommerce_shop_page_sidebar',array(
        'label' => esc_html__( 'Shop Page Sidebar','jewellery-lite' ),
        'section' => 'jewellery_lite_woocommerce_section'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'jewellery_lite_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
        'render_callback' => 'jewellery_lite_customize_partial_jewellery_lite_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting( 'jewellery_lite_woocommerce_single_product_page_sidebar',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'jewellery_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Jewellery_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'jewellery_lite_woocommerce_single_product_page_sidebar',array(
        'label' => esc_html__( 'Single Product Sidebar','jewellery-lite' ),
        'section' => 'jewellery_lite_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('jewellery_lite_products_per_page',array(
        'default'=> '9',
        'sanitize_callback' => 'jewellery_lite_sanitize_float'
    ));
    $wp_customize->add_control('jewellery_lite_products_per_page',array(
        'label' => __('Products Per Page','jewellery-lite'),
        'description' => __('Display on shop page','jewellery-lite'),
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 0,
            'max'              => 50,
        ),
        'section'=> 'jewellery_lite_woocommerce_section',
        'type'=> 'number',
    ));

    //Products per row
    $wp_customize->add_setting('jewellery_lite_products_per_row',array(
        'default'=> '3',
        'sanitize_callback' => 'jewellery_lite_sanitize_choices'
    ));
    $wp_customize->add_control('jewellery_lite_products_per_row',array(
        'label' => __('Products Per Row','jewellery-lite'),
        'description' => __('Display on shop page','jewellery-lite'),
        'choices' => array(
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ),
        'section'=> 'jewellery_lite_woocommerce_section',
        'type'=> 'select',
    ));

    //Products padding
    $wp_customize->add_setting('jewellery_lite_products_padding_top_bottom',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_products_padding_top_bottom',array(
        'label' => __('Products Padding Top Bottom','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_woocommerce_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('jewellery_lite_products_padding_left_right',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('jewellery_lite_products_padding_left_right',array(
        'label' => __('Products Padding Left Right','jewellery-lite'),
        'description'   => __('Enter a value in pixels. Example:20px','jewellery-lite'),
        'input_attrs' => array(
            'placeholder' => __( '10px', 'jewellery-lite' ),
        ),
        'section'=> 'jewellery_lite_woocommerce_section',
        'type'=> 'text'
    ));

    //Products box shadow
    $wp_customize->add_setting( 'jewellery_lite_products_box_shadow', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'jewellery_lite_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'jewellery_lite_products_box_shadow', array(
        'label'       => esc_html__( 'Products Box Shadow','jewellery-lite' ),
        'section'     => 'jewellery_lite_woocommerce_section',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'jewellery_lite_products_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'jewellery_lite_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'jewellery_lite_products_border_radius', array(
        'label'       => esc_html__( 'Products Border Radius','jewellery-lite' ),
        'section'     => 'jewellery_lite_woocommerce_section',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Has to be at the top
    $wp_customize->register_panel_type( 'Jewellery_Lite_WP_Customize_Panel' );
    $wp_customize->register_section_type( 'Jewellery_Lite_WP_Customize_Section' );
}

add_action( 'customize_register', 'jewellery_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
    class Jewellery_Lite_WP_Customize_Panel extends WP_Customize_Panel {
        public $panel;
        public $type = 'jewellery_lite_panel';
        public function json() {

            $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
            $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
            $array['content'] = $this->get_content();
            $array['active'] = $this->active();
            $array['instanceNumber'] = $this->instance_number;
            return $array;
        }
    }
}

if ( class_exists( 'WP_Customize_Section' ) ) {
    class Jewellery_Lite_WP_Customize_Section extends WP_Customize_Section {
        public $section;
        public $type = 'jewellery_lite_section';
        public function json() {

            $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
            $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
            $array['content'] = $this->get_content();
            $array['active'] = $this->active();
            $array['instanceNumber'] = $this->instance_number;

            if ( $this->panel ) {
                $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
            } else {
                $array['customizeAction'] = 'Customizing';
            }
            return $array;
        }
    }
}

// Enqueue our scripts and styles
function jewellery_lite_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'jewellery_lite_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Jewellery_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Jewellery_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Jewellery_Lite_Customize_Section_Pro( $manager,'jewellery_lite_upgrade_pro_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW JEWELLERY PRO', 'jewellery-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'jewellery-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/jewellery-wordpress-theme/'),
		) )	);

		$manager->add_section(new Jewellery_Lite_Customize_Section_Pro($manager,'jewellery_lite_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'jewellery-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'jewellery-lite' ),
			'pro_url'  => admin_url('themes.php?page=jewellery_lite_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'jewellery-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'jewellery-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Jewellery_Lite_Customize::get_instance();