<?php
/**
 * TEMPLATENAME functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TEMPLATENAME
 */

/*
 * ----------------------------------------------------------------------------------------
 *  GET TEMPLATE DIRECTORY
 * ----------------------------------------------------------------------------------------
 */

require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/theme-options.php';
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/custom-post.php';
require get_template_directory() . '/inc/custom-taxonomy.php';
require get_template_directory() . '/inc/custom-fields.php';
require get_template_directory() . '/walker/bootstrap_5_wp_nav_menu_walker.php';