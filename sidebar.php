<div class="sidebar-wrapper">

    <div class="sidebar-box">
        <div class="sidebar-search">
            <form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text" class="search search-field" name="s" placeholder="Search Article" value="<?php echo get_search_query(); ?>">
                <input type="hidden" name="post_type[]" value="post" />
                <button class="icon-submit" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="sidebar-card">
            <h3 class="sidebar-card-title">Categories</h3>
            <ul class="sidebar-list sidebar-list--categories">
                <?php
                    $categories = get_categories();
                    foreach($categories as $category) {
                    echo '<li class="sidebar-list-item"><a class="sidebar-list-link" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                    }
                ?>
                <li class="sidebar-list-item">
                    <a href="<?php bloginfo('url'); ?>/christian" class="sidebar-list-link">Christian Topics</a>
                </li>
            </ul>
            
        </div>
    </div>

</div>