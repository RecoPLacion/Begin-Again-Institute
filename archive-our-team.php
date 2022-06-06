<?php
/**
 * The main template file
 * Template Name: Our Team
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
            <h1>Our Team</h1>
            <div class="page-banner-img">
            <img src="http://localhost/wordpress/bai/wp-content/uploads/2022/05/Reg-Img-Holder14.png" alt="">
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

<section class="our-team">
    <div class="container">
        <h2 class="our-team-title">Our Team</h2>
        <h3 class="our-team-title-group">
            Integrative Life Network Executive Team
        </h3>
        <ul class="our-team-list">
            <?php
                global $post;
                $args = array(
                    'paged' => $paged,
                    'posts_per_page' => -1, 
                    'order' => 'ASC', 
                    'post_type' => 'our-team',
                    'tax_query' => array(
                        array(
                                'taxonomy' => 'our-team-category',
                                'field' => 'slug',
                                'terms' => 'integrated-life-network-executive-team'
                        ),
                    ),
                );
                $my_query = new WP_Query($args);
                $max_num_pages = $my_query->max_num_pages;
            ?>
            <?php if( $my_query -> have_posts() ) : while($my_query -> have_posts()) : $my_query -> the_post(); ?>
                <li class="our-team-list-item">
                    <a href="<?php the_permalink(); ?>" class="our-team-list-link">
                        <div class="our-team-list-content">
                            <div class="our-team-list-img">
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
                            <h3 class="our-team-list-name">
                                <?php the_title(); ?><br>
                                <span><?php the_field('degree'); ?></span>
                            </h3>
                            <p class="our-team-list-pos"><?php the_field('position'); ?></p>
                            <p class="our-team-profile">View profile <i class="fa-solid fa-arrow-right"></i></p>
                        </div>
                    </a>
                </li>
            <?php endwhile; endif; ?>
        </ul>
        <h3 class="our-team-title-group">
            Begin Again Institute Team
        </h3>
        <ul class="our-team-list">
            <?php
                global $post;
                $args = array(
                    'paged' => $paged,
                    'posts_per_page' => -1, 
                    'order' => 'ASC', 
                    'post_type' => 'our-team',
                    'tax_query' => array(
                        array(
                                'taxonomy' => 'our-team-category',
                                'field' => 'slug',
                                'terms' => 'begin-again-institute-team'
                        ),
                    ),
                );
                $my_query = new WP_Query($args);
                $max_num_pages = $my_query->max_num_pages;
            ?>
            <?php if( $my_query -> have_posts() ) : while($my_query -> have_posts()) : $my_query -> the_post(); ?>
                <li class="our-team-list-item">
                    <a href="<?php the_permalink(); ?>" class="our-team-list-link">
                        <div class="our-team-list-content">
                            <div class="our-team-list-img">
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
                            <h3 class="our-team-list-name">
                                <?php the_title(); ?><br>
                                <span><?php the_field('degree'); ?></span>
                            </h3>
                            <p class="our-team-list-pos"><?php the_field('position'); ?></p>
                            <p class="our-team-profile">View profile <i class="fa-solid fa-arrow-right"></i></p>
                        </div>
                    </a>
                </li>
            <?php endwhile; endif; ?>
        </ul>
        <h3 class="our-team-title-group">
            Specialty Services Team
        </h3>
        <ul class="our-team-list">
            <?php
                global $post;
                $args = array(
                    'paged' => $paged,
                    'posts_per_page' => -1, 
                    'order' => 'ASC', 
                    'post_type' => 'our-team',
                    'tax_query' => array(
                        array(
                                'taxonomy' => 'our-team-category',
                                'field' => 'slug',
                                'terms' => 'specialty-services-team'
                        ),
                    ),
                );
                $my_query = new WP_Query($args);
                $max_num_pages = $my_query->max_num_pages;
            ?>
            <?php if( $my_query -> have_posts() ) : while($my_query -> have_posts()) : $my_query -> the_post(); ?>
                <li class="our-team-list-item">
                    <a href="<?php the_permalink(); ?>" class="our-team-list-link">
                        <div class="our-team-list-content">
                            <div class="our-team-list-img">
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
                            <h3 class="our-team-list-name">
                                <?php the_title(); ?><br>
                                <span><?php the_field('degree'); ?></span>
                            </h3>
                            <p class="our-team-list-pos"><?php the_field('position'); ?></p>
                            <p class="our-team-profile">View profile <i class="fa-solid fa-arrow-right"></i></p>
                        </div>
                    </a>
                </li>
            <?php endwhile; endif; ?>
        </ul>
    </div>
</section>

<?php
get_footer();
?>