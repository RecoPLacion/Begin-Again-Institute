<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TEMPLATE NAME
 */

 /*
* ----------------------------------------------------------------------------------------
*  ADMIN ENQUEU FUNCTIONS 
* ----------------------------------------------------------------------------------------
*/
function theme_options_load_admin_scripts( $hook )
{
   if( 'toplevel_page_rbr-theme-options' == $hook ){

      wp_register_style('theme_options_admin', get_template_directory_uri() . '/assets/css/admin/styles.css', '1.0.0', 'all');
      wp_enqueue_style('theme_options_admin');

      wp_enqueue_media();

      
      wp_register_script('theme_options_admin_scripts', get_template_directory_uri() . '/assets/js/admin/script.js', array('jquery'), '1.0.0', true );
      wp_enqueue_script('theme_options_admin_scripts');

   } else if( 'theme-options_page_rbr-theme-options-css' == $hook ){

      wp_register_style('theme_options_admin', get_template_directory_uri() . '/assets/css/admin/styles.css', '1.0.0', 'all');
      wp_enqueue_style('theme_options_admin');
      wp_enqueue_style('ace-css', get_template_directory_uri() . '/assets/css/admin/ace.css', '1.0.0', 'all');
      wp_enqueue_script('ace-js', get_template_directory_uri() . '/assets/js/ace/ace.js', array('jquery'), true, true);
      wp_enqueue_script('theme-options-js', get_template_directory_uri() . '/assets/js/admin/custom.js', array('jquery'), '1.0.0', true);

   } else if( 'theme-options_page_rbr-theme-options-js' == $hook ){

      wp_register_style('theme_options_admin', get_template_directory_uri() . '/assets/css/admin/styles.css', '1.0.0', 'all');
      wp_enqueue_style('theme_options_admin');
      wp_enqueue_style('ace-css', get_template_directory_uri() . '/assets/css/admin/ace.css', '1.0.0', 'all');
      wp_enqueue_script('ace-js', get_template_directory_uri() . '/assets/js/ace/ace.js', array('jquery'), true, true);
      wp_enqueue_script('theme-options-js', get_template_directory_uri() . '/assets/js/admin/custom2.js', array('jquery'), '1.0.0', true);

   }
   else{
      return;
   }
}
add_action( 'admin_enqueue_scripts', 'theme_options_load_admin_scripts' );


/*
* ----------------------------------------------------------------------------------------
*  ENQUEU THE STYLE
* ----------------------------------------------------------------------------------------
*/
function zeroten_styles(){
   wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
   wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css' );
   wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css' );
   wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action ('wp_enqueue_scripts', 'zeroten_styles');


/*
* ----------------------------------------------------------------------------------------
*  ENQUEU THE SCRIPT
* ----------------------------------------------------------------------------------------
*/
function zeroten_scripts(){
   wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js' );
   wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js');
   wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), true, true );
}
add_action ('wp_enqueue_scripts', 'zeroten_scripts');