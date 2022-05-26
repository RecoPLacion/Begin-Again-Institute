<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TEMPLATE NAME
 */


 
/*
	=======================================
		REMOVE GENERATOR VERSION NUMBER
	=======================================
*/

// Remove version string from js and css
function premium_remove_wp_version_strings( $src ){
	global $wp_version;
	parse_str( parse_url( $src, PHP_URL_QUERY ), $query );
	if( !empty( $query['ver'] ) && $query['ver'] === $wp_version ){
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'script_loader_src', 'premium_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'premium_remove_wp_version_strings' );

// Remove meta tag generator
function premium_remover_meta_version(){
	return '';
}
add_filter( 'the_generator', 'premium_remover_meta_version' );