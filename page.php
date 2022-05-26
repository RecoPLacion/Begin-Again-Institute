<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TEMPLATENAME
 */

get_header();
?>

<?php
    if(!is_front_page()) {
        ?>
            <section class="page-banner">
                <div class="container">
                     <h1><?php the_title(); ?></h1>
                     <div class="page-banner-img">
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
                </div>
            </section>
            <section class="page-breadcrumbs">
                <div class="container">
                    <ul class="breadcrumbs">
                        <?php get_breadcrumb(); ?>
                    </ul>
                </div>
            </section>
        <?php
    }
?>

<?php the_content(); ?>

<?php
get_footer();