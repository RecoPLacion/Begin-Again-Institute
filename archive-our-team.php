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
            <li class="breadcrumbs-list">
                <a href="#" class="breadcrumbs-link"><i class="fa-solid fa-house"></i></a>
            </li>
            <li class="breadcrumbs-list">
                <a href="#" class="breadcrumbs-link">Test</a>
            </li>
            <li class="breadcrumbs-list">
                <a href="#" class="breadcrumbs-link">Test</a>
            </li>
        </ul>
    </div>
</section>

<section class="our-team">
    <div class="container">
        <h2 class="our-team-title">Our Team</h2>
        <ul class="our-team-list">
            <?php
                if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                $temp = $wp_query;
                $wp_query = null;
                $args = array( 'post_type' => 'our-team', 'order'=>'DESC', 'posts_per_page' => -1, 'paged' => $paged);
                $wp_query = new WP_Query();
                $wp_query->query( $args );
                while ($wp_query->have_posts()) : $wp_query->the_post();
                ?>

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
                                <?php the_title(); ?>,<br>
                                MPA, CAC III 
                            </h3>
                            <p class="our-team-list-pos">Partner Support Program Facilitator</p>
                            <p class="our-team-profile">View profile <i class="fa-solid fa-arrow-right"></i></p>
                        </div>
                    </a>
                </li>

            <?php endwhile; ?>
        </ul>
    </div>
</section>

<?php
get_footer();
?>