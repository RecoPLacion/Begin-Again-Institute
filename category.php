<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TEMPLATENAME
 */

get_header();
$blog_cat_slug = get_queried_object()->slug;
$blog_cat_name = get_queried_object()->name;
?>

<section class="page-banner">
    <div class="container">
            <h1><?php echo $blog_cat_name; ?></h1>
            <div class="page-banner-img">
            <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2022/05/Reg-Img-Holder17.png" alt="">
            </div>
    </div>
</section>
<section class="page-breadcrumbs">
    <div class="container">
        <ul class="breadcrumbs">
            <li class="breadcrumbs-list">
                <a href="#" class="breadcrumbs-link"><i class="fa-solid fa-house"></i></a>
            </li>
            <li class="breadcrumbs-list">
                <a href="<?php bloginfo('url'); ?>/blog" class="breadcrumbs-link">Blog</a>
            </li>
            <li class="breadcrumbs-list">
                <a href="#" class="breadcrumbs-link"><?php echo $blog_cat_name; ?></a>
            </li>
        </ul>
    </div>
</section>

<section class="page-blog-category">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="page-blog-category-list">
                    <?php
                        global $post;
                        $args = array(
                            'paged' => $paged,
                            'posts_per_page' => 6, 
                            'orderby' => 'date', 
                            'order' => 'DESC', 
                            'post_type' => 'post',
                            'tax_query' => array(
                                array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => $blog_cat_slug
                                ),
                            ),
                        );
                        $my_query = new WP_Query($args);
                        $max_num_pages = $my_query->max_num_pages;
                    ?>
                    <?php if( $my_query -> have_posts() ) : while($my_query -> have_posts()) : $my_query -> the_post(); ?>
                        <li id="post-<?php the_ID(); ?>" class="page-blog-category-item">
                            <a href="<?php the_permalink(); ?>" class="page-blog-category-link">
                                <div class="page-blog-category-card">
                                    <div class="page-blog-category-img">
                                    <?php if(has_post_thumbnail()): ?>
                                        <?php
                                            $thumb_id = get_post_thumbnail_id(get_the_ID());
                                            $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                                        ?>
                                        <img title="<?php the_title(); ?>" alt="<?php echo $alt; ?>" class="wp-post-image is-wide" src="<?=wp_get_attachment_url( get_post_thumbnail_id() ); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/blog01.png" alt="">
                                    <?php endif; ?>
                                    </div>
                                    <h4 class="page-blog-category-title"><?php the_title(); ?></h4>
                                    <ul class="page-blog-single-cat">
                                        <li class="page-blog-single-item">
                                            <span>
                                                <?php
                                                    $terms = get_the_terms( $post->ID , 'category' );
                                                    if(is_array($terms) || is_object($terms)){
                                                        foreach ( $terms as $term ) {
                                                        echo $term->name;
                                                        }
                                                    }
                                                ?> 
                                            </span>
                                        </li>
                                        <li class="page-blog-single-item">
                                            By
                                            <span>
                                                <?php echo get_the_author(); ?>
                                            </span>
                                        </li>
                                        <li class="page-blog-single-item">
                                            <span>
                                                <?php the_date(); ?>
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="page-category-content">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; endif; ?>
                </ul>
                <div class="blog-list-pagination">
                    <?php wp_pagination(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>



<?php
get_footer(); ?>