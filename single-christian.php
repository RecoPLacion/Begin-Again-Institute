<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TEMPLATENAME
 */

get_header();
?>

<section class="page-banner">
    <div class="container">
            <h1>Boulder Recovery Blog</h1>
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
                <a href="<?php bloginfo('url'); ?>/christian" class="breadcrumbs-link">Boulder Recovery Blog</a>
            </li>
            <li class="breadcrumbs-list">
                <a href="#" class="breadcrumbs-link"><?php the_title(); ?></a>
            </li>
        </ul>
    </div>
</section>

<section class="page-blog-single">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-blog-single-wrapper">
                    <div class="page-blog-single-img">
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
                    <div class="page-blog-single-content">
                        <?php the_content(); ?>
                    </div>
                    <ul class="page-blog-single-cat">
                        <li class="page-blog-single-item">
                            Category: 
                            <span>
                                <?php
                                    $terms = get_the_terms( $post->ID , 'christian-categories' );
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
                    <div class="page-blog-pagination-wrapper">
                        <div class="page-blog-text">
                            <p class="page-blog-pagi-text">Previous</p>
                            <p class="page-blog-pagi-text">Next</p>
                        </div>
                        <div class="page-blog-pagination">
                            <div class="page-blog-pagination-md">
                                <div class="page-blog-pagination-link">
                                    <h4 class="page-blog-pagi-title">
                                        <?php next_post_link('<i class="fa-solid fa-angle-left"></i> %link', '%title', false); ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="page-blog-pagination-md">
                                <div class="page-blog-pagination-link">
                                    <h4 class="page-blog-pagi-title">
                                        <?php previous_post_link('<i class="fa-solid fa-angle-right"></i> %link', '%title', false); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-blog-related">
                        <h4 class="page-blog-related-title">RELATED POSTS</h4>
                        <ul class="page-blog-related-list">
                            <?php
                                // Build basic custom query arguments
                                $custom_query = new WP_Query( array( 
                                    'posts_per_page' => 4, // Number of related posts to display
                                    'post__not_in' => array($post->ID), // Ensure that the current post is not displayed
                                    'orderby' => 'rand', // Randomize the results
                                    'post_type' => 'christian',
                                ));

                                // Run the loop and output data for the results
                                if ( $custom_query->have_posts() ) : ?>
                                    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                                        <li class="page-blog-related-item">
                                            <a href="<?php the_permalink(); ?>" class="page-blog-related-link">
                                                <div class="page-blog-related-card">
                                                    <div class="page-blog-related-img">
                                                        <?php if ( has_post_thumbnail() ) { ?> 
                                                            <?php the_post_thumbnail( 'full' ); ?>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="page-blog-related-content">
                                                        <h4 class="page-related-title"><?php the_title(); ?></h4>
                                                        <p class="page-related-date"><?php the_date(); ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <p>Sorry, no related articles to display.</p>
                                <?php endif;
                                // Reset postdata
                                    wp_reset_postdata();
                            ?>
                        </ul>
                        

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();