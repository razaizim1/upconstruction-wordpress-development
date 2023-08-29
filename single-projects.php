<?php
$options = get_option('codestar');
get_header(); ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo $options['breadcrumb_background_image']['url']; ?>');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>Project Details</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Project Details</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Projet Details Section ======= -->
  <section id="project-details" class="project-details">
    <?php while (have_posts()):
      the_post(); ?>
      <div class="container" data-aos="fade-up" data-aos-delay="100">


        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">

                <?php the_post_thumbnail(); ?>

              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">

              <?php the_content(); ?>

            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>
                  <?php
                  $categories = get_the_terms($post->ID, 'projects_filter');
                  // print_r($categories);
                  foreach ($categories as $category):
                    ; ?>
                    <span>
                      <?php echo $category->name; ?>
                    </span>
                  <?php endforeach;
                  wp_reset_postdata() ?>

                </li>
                <li><strong>Client</strong> <span>
                    <?php echo $options['client_company']; ?>
                  </span></li>
                <li><strong>Project date</strong> <span>
                    <?php the_time('F j, Y'); ?>
                  </span></li>
                <li><strong>Project URL</strong> <a href="">
                    <?php echo $options['project_url']; ?>
                  </a></li>
                <li><a href="" class="btn-visit align-self-start">
                    <?php echo $options['visit_website']; ?>
                  </a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    <?php endwhile;
    wp_reset_postdata() ?>

  </section><!-- End Projet Details Section -->

</main><!-- End #main -->

<?php get_footer(); ?>