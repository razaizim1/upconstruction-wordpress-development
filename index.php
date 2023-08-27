<?php
$options = get_option('codestar');
get_header(); ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('<?php echo $options['breadcrumb_background_image']['url'] ;?>');">
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
          <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100">
              <div class="post-img position-relative overflow-hidden">
                <?php $post_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                // echo $post_image_url;
                ?>
                <img src="<?php echo $post_image_url; ?>" class="img-fluid" alt="">
                <span class="post-date">
                  <?php the_time('F j'); ?>
                </span>
              </div>
              <div class="post-content d-flex flex-column">
                <h3 class="post-title">
                  <?php the_title(); ?>
                </h3>
                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2">
                      <?php the_author(); ?>
                    </span>
                  </div>
                  <span class="px-3 text-black-50">/</span>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i>
                    <?php $categories = get_the_category();
                    // print_r($category);
                    foreach ($categories as $category):
                      ?>
                      <span class="ps-2">
                        <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                      </span>
                    <?php endforeach; ?>
                  </div>
                </div>
                <p>
                  <?php echo wp_trim_words(get_the_content(), 10, '...'); ?>
                </p>
                <hr>
                <a href="<?php the_permalink(); ?>" class="readmore stretched-link"><span>Read
                    More</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <!-- End post list item -->

      </div><!-- End blog posts list -->

      <div class="blog-pagination">
        <ul class="justify-content-center">

          <?php the_posts_pagination(
            array(
              'mid_size' => 2,
              'prev_text' => '',
              'next_text' => ''
            )
          ); ?>
        </ul>
      </div><!-- End blog pagination -->

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->

<?php get_footer(); ?>