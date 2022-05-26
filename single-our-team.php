<?php
/**
 * The main template file
 *
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
<section class="page-banner page-banner-single">
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

<section class="page-our-team-single">
    <div class="container">
        <h2 class="page-our-team-single-title">
            <?php the_title(); ?> <span><?php the_field('degree'); ?></span>
        </h2>
        <p class="page-our-team-single-pos">
            <?php the_field('position'); ?>
        </p>
        <div class="page-single-team-content">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>