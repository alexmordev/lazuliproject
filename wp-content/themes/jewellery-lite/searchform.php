<?php
/**
 * The template for displaying search forms in jewellery-lite
 *
 * @package Jewellery Lite
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'jewellery-lite' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','jewellery-lite' ); ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_html_x( 'Search', 'submit button','jewellery-lite' ); ?>">
</form>