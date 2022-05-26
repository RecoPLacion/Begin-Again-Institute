<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TEMPLATE NAME
 */

function our_team_members_custom_posts() {
	$labels = array(
		'name'                => __( 'Team Members' ),
		'singular_name'       => __( 'Team Members'),
		'menu_name'           => __( 'Team Members'),
		'parent_item_colon'   => __( 'Parent Team Members'),
		'all_items'           => __( 'All Team Members'),
		'view_item'           => __( 'View Team Members'),
		'add_new_item'        => __( 'Add New Team Members'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Team Members'),
		'update_item'         => __( 'Update Team Members'),
		'search_items'        => __( 'Search Team Members'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'our-team'),
		'description'         => __( 'Best Team Members'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon' 		=> 'dashicons-groups',
		'has_archive'         => false,
		'can_export'          => true,
		'exclude_from_search' => false,
	        'yarpp_support'       => true,
		'taxonomies' 	      => array('our-team-tag', 'our-team-category'),
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array(
			'slug' => 'our-team',
			'with_front' => false
		)
);
	register_post_type( 'our-team', $args );
}
add_action( 'init', 'our_team_members_custom_posts', 0 );


function boulder_recovery_custom_posts() {
	$labels = array(
		'name'                => __( 'Boulder Recovery Blog' ),
		'singular_name'       => __( 'Boulder Recovery Blog'),
		'menu_name'           => __( 'Boulder Recovery Blog'),
		'parent_item_colon'   => __( 'Parent Boulder Recovery Blog'),
		'all_items'           => __( 'All Boulder Recovery Blog'),
		'view_item'           => __( 'View Boulder Recovery Blog'),
		'add_new_item'        => __( 'Add New Boulder Recovery Blog'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Boulder Recovery Blog'),
		'update_item'         => __( 'Update Boulder Recovery Blog'),
		'search_items'        => __( 'Search Boulder Recovery Blog'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'christian'),
		'description'         => __( 'Best Boulder Recovery Blog'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon' 		=> 'dashicons-groups',
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
	        'yarpp_support'       => true,
		'taxonomies' 	      => array('christian_tag', 'christian-categories'),
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array(
			'slug' => 'christian',
			'with_front' => false
		)
);
	register_post_type( 'christian', $args );
}
add_action( 'init', 'boulder_recovery_custom_posts', 0 );