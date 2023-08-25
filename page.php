<?php
$options = get_option('codestar');
get_header(); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>
                <?php echo $options['blog_title']; ?>
            </h2>
            <ol>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li>
                    <?php echo $options['blog_title']; ?>
                </li>
            </ol>

        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">
            <div class="row gy-4 posts-list">

                <?php
                while (have_posts()):
                    the_post();
                    ; ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
                <!-- End post list item -->

            </div><!-- End blog posts list -->

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

<?php get_footer(); ?>