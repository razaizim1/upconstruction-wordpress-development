<?php get_header(); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Sample Inner Page</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Sample Inner Page</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
    <div class="container">
            <div class="row gy-4 posts-list">
            <h2>Page Not Found</h2>
                <?php
                while (have_posts()):
                    the_post();
                    ; ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
                <!-- End post list item -->

            </div><!-- End blog posts list -->

        </div>
    </section>

</main><!-- End #main -->

<?php get_footer(); ?>