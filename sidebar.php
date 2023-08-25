<div class="col-lg-4">

    <div class="sidebar">

        <div class="sidebar-item search-form">
            <h3 class="sidebar-title">Search</h3>

            <form action="http://localhost/wordpress/" method="get" class="mt-3">
                <input type="text" name="s" value="<?php the_search_query(); ?>">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <?php
            global $wp_query;
            $total_results = $wp_query->found_posts;
            ?>

        </div><!-- End sidebar search formn-->
        <?php dynamic_sidebar('blog_category'); ?>


        <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="mt-3">
                <?php

                // echo delicious_recent_posts(); 
                $recent_posts = new WP_Query(
                    array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                    )
                );
                while ($recent_posts->have_posts()):
                    $recent_posts->the_post();
                    ?>
                    <div class="post-item mt-3">
                        <?php the_post_thumbnail(); ?>
                        <div>
                            <h4><a href="<?php the_permalink(); ?>">
                                    <?php echo wp_trim_words(get_the_title(), 6, '') ?>
                                </a></h4>
                            <time datetime="2020-01-01">
                                <?php the_time('F j ,Y'); ?>
                            </time>
                        </div>
                    </div><!-- End recent post item-->
                <?php endwhile; ?>
            </div>

        </div><!-- End sidebar recent posts-->
    </div>
    <!-- End Blog Sidebar -->

</div>