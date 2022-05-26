<?php
/**
 * The main template file
 * Template Name: Christian Blog
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage TEMPLATENAME 
 * @since TEMPLATENAME 1.0
 */
get_header();
?>

<section class="page-banner">
    <div class="container">
            <h1>Boulder Recovery Blog</h1>
            <div class="page-banner-img">
            <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2022/05/Reg-Img-Holder16.png" alt="">
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
                <a href="#" class="breadcrumbs-link">Boulder Recovery Blog</a>
            </li>
            
        </ul>
    </div>
</section>

<section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <?php
                    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                    $temp = $wp_query;
                    $wp_query = null;
                    $args = array( 'post_type' => 'christian', 'order'=>'DESC', 'posts_per_page' => 1, 'paged' => $paged);
                    $wp_query = new WP_Query();
                    $wp_query->query( $args );
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                    ?>
                
                    <a href="<?php the_permalink(); ?>" class="blog-first-wrapper">
                        <div class="blog-first-img">
                            <?php if(has_post_thumbnail()): ?>
                                <?php
                                    $thumb_id = get_post_thumbnail_id(get_the_ID());
                                    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                                ?>
                                <img title="<?php the_title(); ?>" alt="<?php echo $alt; ?>" class="wp-post-image is-wide" src="<?=wp_get_attachment_url( get_post_thumbnail_id() ); ?>">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/blog01.png" alt="">
                            <?php endif; ?>
                            <div class="blog-first-title">
                                <h3><?php the_title(); ?></h3>
                            </div>
                        </div>
                        <div class="blog-first-box">
                            <ul class="blog-first-list-cat">
                                <li class="blog-first-list-cat-item">
                                    <?php
                                        $terms = get_the_terms( $post->ID , 'christian-categories' );
                                        if(is_array($terms) || is_object($terms)){
                                            foreach ( $terms as $term ) {
                                            echo $term->name;
                                            }
                                        }
                                    ?> 
                                </li>
                                <li class="blog-first-list-cat-item">
                                    By <?php echo get_the_author(); ?>
                                </li>
                                <li class="blog-first-list-cat-item">
                                    <?php the_date(); ?>
                                </li>
                            </ul>
                            <div class="blog-first-content">
                                <?php the_excerpt(); ?>
                            </div>
                            <p class="blog-first-detail">Details</p>
                        </div>
                    </a>

                <?php endwhile; ?>
            </div>
            <div class="col-md-8">
                <ul class="blog-list">
                    <?php
                        if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                        $temp = $wp_query;
                        $wp_query = null;
                        $args = array( 'post_type' => 'christian', 'order'=>'DESC', 'posts_per_page' => 11, 'paged' => $paged);
                        $wp_query = new WP_Query();
                        $wp_query->query( $args );
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                        ?>

                        <li class="blog-list-item">
                            <a href="<?php the_permalink(); ?>" class="blog-list-link">
                                <div class="blog-list-card">
                                    <div class="blog-list-img">
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
                                    <div class="blog-list-title">
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <ul class="blog-list-cat">
                                        <li class="blog-list-cat-item">
                                            <?php
                                                $terms = get_the_terms( $post->ID , 'christian-categories' );
                                                if(is_array($terms) || is_object($terms)){
                                                    foreach ( $terms as $term ) {
                                                    echo $term->name;
                                                    }
                                                }
                                            ?> 
                                        </li>
                                        <li class="blog-list-cat-item">
                                            By <?php echo get_the_author(); ?>
                                        </li>
                                        <li class="blog-list-cat-item">
                                            <?php the_date(); ?>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </li>

                    <?php endwhile; ?>
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
get_footer();
?>