<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TEMPLATE NAME
 * 
 */


/*
 * ----------------------------------------------------------------------------------------
 *  THEME SUPPORT
 * ----------------------------------------------------------------------------------------
 */
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'qoute', 'status', 'video', 'audio', 'chat' ) );


/*
 * ----------------------------------------------------------------------------------------
 *  REGISTER THE NAV MENU
 * ----------------------------------------------------------------------------------------
 */
function nav_theme_setup() {
    add_theme_support('menus');

    register_nav_menu('primary', 'Header Navigation');
    register_nav_menu('secondary', 'Resources Navigation');
    register_nav_menu('third', 'Other Navigation');
}
add_action('init', 'nav_theme_setup');


//Numeric Pagination
function wp_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
        'prev_text' => __('<'),
        'next_text' => __('>'),
    ) );
    if( is_array($page_format) ) {
                $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                echo '<div class="blog-pagination"><ul>';
                foreach ( $page_format as $page ) {
                        echo "<li>$page</li>";
                }
                echo '</ul></div>';
    }
}

// add slug as body class
function addSlugBodyClass($slugclass) {
    global $post;

    if (isset($post)) 
        $slugclass[] = 'page-' . $post->post_name;

    return $slugclass;
}
add_filter('body_class', 'addSlugBodyClass');

// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES
 
function isacustom_excerpt_length($length) {
        global $post;
        if ($post->post_type == 'post')
        return 50;
        else if ($post->post_type == 'christian')
        return 30;
        else if ($post->post_type == 'our-team')
        return 30;
        else
        return 30;
    }
add_filter('excerpt_length', 'isacustom_excerpt_length');

/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function get_breadcrumb() {
    echo '<li class="breadcrumbs-list"><a class="breadcrumbs-link" href="'.home_url().'" rel="nofollow"><i class="fa-solid fa-house"></i></a></li>';
    if (is_category() || is_single()) {
        the_category(' &bull; ');
            if (is_single()) {
                echo '<li class="breadcrumbs-list">';
                the_title();
                echo '</li>';
            }
    } elseif (is_page()) {
        echo '<li class="breadcrumbs-list">';
        echo the_title();
        echo '</li>';
    } elseif (is_search()) {
        echo "Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}