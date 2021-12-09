<?php
/**
 * Jewellery Lite: Block Patterns
 *
 * @package Jewellery Lite
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'jewellery-lite',
		array( 'label' => __( 'Jewellery Lite', 'jewellery-lite' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'jewellery-lite/banner-section',
		array(
			'title'      => __( 'Banner Section', 'jewellery-lite' ),
			'categories' => array( 'jewellery-lite' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":6189,\"dimRatio\":0,\"align\":\"full\",\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover alignfull banner-section\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":4,\"style\":{\"color\":{\"text\":\"#24272e\"}}} -->\n<h4 class=\"has-text-align-left has-text-color\" style=\"color:#24272e\">Te obtinut ut adepto</h4>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"style\":{\"color\":{\"text\":\"#24272e\"}}} -->\n<h1 class=\"has-text-align-left has-text-color\" style=\"color:#24272e\">TE OBTINUIT UT ADEPTO</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"style\":{\"color\":{\"text\":\"#828790\"}}} -->\n<p class=\"has-text-align-left has-text-color\" style=\"color:#828790\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard. Lorem Ipsum</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"left\"} -->\n<div class=\"wp-block-buttons alignleft\"><!-- wp:button {\"borderRadius\":3,\"style\":{\"color\":{\"background\":\"#f8ae57\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background\" style=\"border-radius:3px;background-color:#f8ae57\">SHOP NOW</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'jewellery-lite/product-section',
		array(
			'title'      => __( 'Product Section', 'jewellery-lite' ),
			'categories' => array( 'jewellery-lite' ),
			'content'    => "<!-- wp:cover {\"customOverlayColor\":\"#fdfaf7\",\"align\":\"full\",\"className\":\"products-outer-box\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim products-outer-box\" style=\"background-color:#fdfaf7\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"products-container\"} -->\n<div class=\"wp-block-columns alignwide products-container\"><!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:image {\"align\":\"center\",\"id\":6223,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/sale-banner.png\" alt=\"\" class=\"wp-image-6223\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#f8ae57\"}},\"className\":\"sale-btn\"} -->\n<div class=\"wp-block-button sale-btn\"><a class=\"wp-block-button__link has-background\" style=\"border-radius:4px;background-color:#f8ae57\">SHOP NOW</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:image {\"id\":6210,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/title-image.png\" alt=\"\" class=\"wp-image-6210\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"style\":{\"color\":{\"text\":\"#24272e\"}}} -->\n<h2 class=\"has-text-align-left has-text-color\" style=\"color:#24272e\">FEATURED PRODUCT</h2>\n<!-- /wp:heading -->\n\n<!-- wp:woocommerce/product-category {\"rows\":1,\"categories\":[32],\"contentVisibility\":{\"title\":true,\"price\":true,\"rating\":false,\"button\":true}} /-->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Write title\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\"></p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->",
		)
	);
}