<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TEMPLATE NAME
 */

get_header();
?>

<section class="page-banner">
    <div class="container">
            <h1><?php echo esc_html( get_search_query( true ) ); ?></h1>
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
                <a href="#" class="breadcrumbs-link"><?php echo esc_html( get_search_query( true ) ); ?></a>
            </li>
        </ul>
    </div>
</section>

<section class="page-search-result">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="page-blog-category-list">
                    <?php if( have_posts() ) : ?>
                        <?php while( have_posts() ) : the_post(); ?>
                            <?php if( isset($_GET['post_type']) ){
                                $type = $_GET['post_type'];
                                if($type == 'posts') {?>
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
                            <?php } else { ?>
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
                                <?php } ?>
                            <?php } else { ?>
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
                                <?php } ?>
                        <?php endwhile; else: ?>
                        <h4 class="page-no-results">No Results Found for "<?php echo esc_html( get_search_query( false ) ); ?>"</h4>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>