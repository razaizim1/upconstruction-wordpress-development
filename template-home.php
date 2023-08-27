<?php
/*
Template Name: Home Template
*/
get_header(); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
  <div class="info d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>
            <?php the_field('banner_title'); ?>
          </h2>
          <p>
            <?php the_field('banner_description'); ?>
          </p>
          <a href="<?php the_field('banner_button_link'); ?>" class="btn-get-started">
            <?php the_field('banner_button_text'); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <?php
    while (have_rows('banner_background_images')):
      the_row(); ?>
      <div class="carousel-item  <?php the_sub_field('active_background'); ?>"
        style="background-image: url(<?php the_sub_field('background_image'); ?>)"></div>
    <?php endwhile; ?>
    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>
  </div>
</section><!-- End Hero Section -->
<main id="main">

  <!-- ======= Get Started Section ======= -->
  <section id="get-started" class="get-started section-bg">
    <div class="container">
      <div class="row justify-content-between gy-4">
        <div class="col-lg-6 d-flex align-items-center">
          <div class="content">
            <h3>
              <?php the_field('get_started_title'); ?>
            </h3>
            <?php the_field('get_started_description'); ?>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-heading">
            <h3>
              <?php the_field('get_started_form_title'); ?>
            </h3>
            <p>
              <?php the_field('get_started_form_description'); ?>
            </p>
          </div>
          <?php echo do_shortcode('[contact-form-7 id="138" title="UpConstruction Form"]'); ?>
        </div><!-- End Quote Form -->
      </div>
    </div>
  </section><!-- End Get Started Section -->

  <!-- ======= Constructions Section ======= -->
  <section id="constructions" class="constructions">
    <div class="container">
      <div class="section-header">
        <h2>
          <?php the_field('construction_title'); ?>
        </h2>
        <p>
          <?php the_field('construction_description'); ?>
        </p>
      </div>
      <div class="row gy-4">
        <?php
        while (have_rows('construction_cards')):
          the_row();
          ; ?>
          <div class="col-lg-6">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg" style="background-image: url(<?php echo get_sub_field('card_image')['url']; ?>);">
                  </div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">
                      <?php the_sub_field('card_title'); ?>
                    </h4>
                    <p>
                      <?php the_sub_field('card_description'); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Card Item -->
        <?php endwhile; ?>
      </div>
    </div>
  </section><!-- End Constructions Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container">
      <?php
      $services = new WP_query(
        array(
          'post_type' => 'services',
          'posts_per_page' => -1,
          'order' => 'ASC'
        )
      )
      ; ?>
      <div class="section-header">
        <h2>
          <?php the_field('services_title'); ?>
        </h2>
        <p>
          <?php the_field('services_description'); ?>
        </p>
      </div>
      <div class="row gy-4">
        <?php
        while ($services->have_posts()):
          $services->the_post();
          ; ?>
          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="<?php the_field('service_item_icon'); ?>"></i>
              </div>
              <h3>
                <?php the_field('service_item_title'); ?>
              </h3>
              <p>
                <?php the_field('service_item_description'); ?>
              </p>
              <a href="" class="readmore stretched-link">
                <?php the_field('service_item_button_text'); ?> <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->
        <?php endwhile; ?>
      </div>
    </div>
  </section><!-- End Services Section -->

  <!-- ======= Alt Services Section ======= -->
  <?php
  while (have_posts()):
    the_post()
    ; ?>
    <?php the_content(); ?>
  <?php endwhile; ?>

  <!-- ======= Features Section ======= -->
  <section id="features" class="features section-bg">
    <div class="container">
      <ul class="nav nav-tabs row  g-2 d-flex">
        <?php
        $i = 1;
        while (have_rows('feature_tab_titles')):
          the_row(); ?>
          <li class="nav-item col-3">
            <a class="nav-link <?php if ($i == 1) {
              echo 'active show';
            }
            ; ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo $i; ?>">
              <h4>
                <?php the_sub_field('tab_title'); ?>
              </h4>
            </a>
          </li><!-- End tab nav item -->
          <?php $i++; endwhile; ?>
      </ul>
      <div class="tab-content">
        <?php
        $i = 1;
        while (have_rows('feature_tab_titles')):
          the_row(); ?>
          <div class="tab-pane <?php if ($i == 1) {
            echo 'active show';
          }
          ; ?>" id="tab-<?php echo $i; ?>">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>
                  <?php the_sub_field('item_title'); ?>
                </h3>
                <p class="fst-italic">
                  <?php the_sub_field('item_description'); ?>
                </p>
                <ul>
                  <?php while (have_rows('item_lists')):
                    the_row(); ?>
                    <li><i class="<?php the_sub_field('list_icon'); ?>"></i>
                      <?php the_sub_field('item_list'); ?>
                    </li>
                  <?php endwhile; ?>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?php echo get_sub_field('item_image')['url']; ?>" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->
          <?php $i++; endwhile; ?>
      </div>
    </div>
  </section><!-- End Features Section -->
  <!-- ======= Our Projects Section ======= -->
  <section id="projects" class="projects">
    <div class="container">
      <div class="section-header">
        <h2>
          <?php the_field('projects_title'); ?>
        </h2>
        <p>
          <?php the_field('projects_description'); ?>
        </p>
      </div>
      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
        data-portfolio-sort="original-order">
        <ul class="portfolio-flters">
          <?php
          $project_categories = get_terms(
            array(
              'taxonomy' => 'projects_filter',
              'hide_empty' => false
            )
          );
          ?>
          <li data-filter="*" class="filter-active">All</li>
          <?php foreach ($project_categories as $category): ?>
            <li data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
          <?php endforeach; ?>
        </ul><!-- End Projects Filters -->
        <div class="row gy-4 portfolio-container">
          <?php
          $projects = new WP_Query(
            array(
              'post_type' => 'our_projects',
              'posts_per_page' => -1
            )
          );
          while ($projects->have_posts()):
            $projects->the_post();
            $category_slugs = get_the_terms($post->ID, 'projects_filter');
            foreach ($category_slugs as $slug):
              ?>
              <div class="col-lg-4 col-md-6 portfolio-item <?php echo $slug->slug; ?>">
              <?php endforeach; ?>
              <div class="portfolio-content h-100">
                <?php
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ; ?>
                <img src="<?php echo $image_url; ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>
                    <?php the_title(); ?>
                  </h4>
                  <p>
                    <?php the_content(); ?>
                  </p>
                  <a href="<?php echo $image_url; ?>" title="<?php the_title(); ?>"
                    data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="<?php the_permalink(); ?>" title="More Details" class="details-link"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->
          <?php endwhile;
          wp_reset_postdata(); ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-design">
            <div class="portfolio-content h-100">
              <img src="assets/img/projects/design-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Design 3</h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
                <a href="assets/img/projects/design-3.jpg" title="Repairs 3" data-gallery="portfolio-gallery-book"
                  class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="project-details.html" title="More Details" class="details-link"><i
                    class="bi bi-link-45deg"></i></a>
              </div>
            </div>
          </div><!-- End Projects Items -->
        </div><!-- End Projects Container -->
      </div>
    </div>
  </section><!-- End Our Projects Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container">
      <div class="section-header">
        <h2>
          <?php the_field('testimonial_title'); ?>
        </h2>
        <p>
          <?php the_field('testimonials_description'); ?>
        </p>
      </div>
      <div class="slides-2 swiper">
        <div class="swiper-wrapper">
          <?php
          $testimonials = new WP_Query(
            array(
              'post_type' => 'testimonials',
              'posts_per_page' => -1,
              'order' => 'ASC'
            )
          );
          while ($testimonials->have_posts()):
            $testimonials->the_post()
            ; ?>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="<?php echo get_field('client_image')['url']; ?>" class="testimonial-img" alt="">
                  <h3>
                    <?php the_field('client_name'); ?>
                  </h3>
                  <h4>
                    <?php the_field('client_title'); ?>
                  </h4>
                  <div class="stars">
                    <?php $reviews = get_field('client_review'); ?>
                    <?php
                    if ($reviews == 1) {
                      echo '<i class="bi bi-star-fill"></i>';
                    } elseif ($reviews == 2) {
                      echo '<i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            ';
                    } elseif ($reviews == 3) {
                      echo '
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star"></i>
                      <i class="bi bi-star"></i>
                      ';
                    } elseif ($reviews == 4) {
                      echo '
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star"></i>
                      ';
                    } elseif ($reviews == 5) {
                      echo '
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      ';
                    }
                    ;
                    ?>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <?php the_field('review_quote'); ?>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
          <?php endwhile;
          wp_reset_postdata();
          ?>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

  <!-- ======= Recent Blog Posts Section ======= -->
  <section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container">
      <div class=" section-header">
        <h2>
          <?php the_field('recent_blog_title'); ?>
        </h2>
        <p>
          <?php the_field('recent_blog_description'); ?>
        </p>
      </div>
      <div class="row gy-5">

        <?php
        $recent_posts = new WP_Query(
          array(
            'post_type' => 'post',
            'posts_per_page' => '3',
          )
        );
        while ($recent_posts->have_posts()):
          $recent_posts->the_post()
          ; ?>
          <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100">

              <div class="post-img position-relative overflow-hidden">
                <?php $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                <img src="<?php echo $image_url; ?>" class="img-fluid" alt="">
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
                    <?php
                    $categories = get_the_category();
                    // print_r($categories);
                    foreach ($categories as $category):
                      ; ?>
                      <i class="bi bi-folder2"></i> <span class="ps-2">
                        <?php echo $category->name; ?>
                      </span>
                    <?php endforeach; ?>
                  </div>
                </div>

                <hr>

                <a href="<?php the_permalink(); ?>" class="readmore stretched-link"><span>Read More</span><i
                    class="bi bi-arrow-right"></i></a>

              </div>

            </div>
          </div><!-- End post item -->
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <!-- End Recent Blog Posts Section -->

</main><!-- End #main -->

<?php get_footer(); ?>