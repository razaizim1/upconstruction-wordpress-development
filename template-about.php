<?php
$options = get_option('codestar');
/*
Template Name: About Template
*/
get_header(); ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo $options['breadcrumb_background_image']['url'] ;?>');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>About</h2>
      <ol>
        <li><a href="<?php echo home_url(); ?>">Home</a></li>
        <li>About</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">
      <div class="row position-relative">
        <div class="col-lg-7 about-img"
          style="background-image: url(<?php echo get_field('about_banner_image')['url']; ?>);"></div>
        <div class="col-lg-7">
          <h2>
            <?php the_field('about_banner_title'); ?>
          </h2>
          <div class="our-story">
            <?php the_field('our_history'); ?>
            <div class="watch-video d-flex align-items-center position-relative">
              <i class="<?php the_field('banner_button_icon'); ?>"></i>
              <a href="<?php the_field('banner_button_link'); ?>" class="glightbox stretched-link"><?php the_field('banner_button_text'); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- ======= Stats Counter Section ======= -->
  <section id="stats-counter" class="stats-counter section-bg">
    <div class="container">

      <div class="row gy-4">

        <?php while (have_rows('counters')):
          the_row(); ?>
          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="<?php the_sub_field('counter_icon'); ?>"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo get_sub_field('counter_amount'); ?>"
                  data-purecounter-duration="<?php the_sub_field('counter_duration'); ?>" class="purecounter"></span>
                <p>
                  <?php echo get_sub_field('counter_title'); ?>
                </p>
              </div>
            </div>
          </div><!-- End Stats Item -->
        <?php endwhile;
        wp_reset_postdata();
        ?>
      </div>

    </div>
  </section><!-- End Stats Counter Section -->

  <!-- ======= Alt Services Section ======= -->
  <section id="alt-services" class="alt-services">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-around gy-4">
        <div class="col-lg-6 img-bg"
          style="background-image: url(<?php echo get_field('alt_service_image')['url']; ?>);" data-aos="zoom-in"
          data-aos-delay="100"></div>

        <div class="col-lg-5 d-flex flex-column justify-content-center">
          <h3>
            <?php the_field('alt_service_title'); ?>
          </h3>
          <p>
            <?php the_field('alt_service_description'); ?>
          </p>

          <?php

          $alt_service_categories = get_terms(
            array(
              'taxonomy' => 'alt_service_category',
            ),
          );
          // print_r($alt_service_categories);
          // foreach ($alt_service_categories as $term_id) {
          //   $id = $term_id->term_id;
          // }
          // echo $id;
          
          $alt_services_items = new WP_Query(
            array(
              'post_type' => 'alt_services',
              'order' => 'ASC'
            )
          );

          // foreach ($alt_services_items as $category) {
          //   $category;
          // }
          // print_r($alt_services_items);
          // echo $category_slug;
          
          // if ($category_slug != 'alt-2'):
          while ($alt_services_items->have_posts()):
            $alt_services_items->the_post();
            // $terms = wp_get_post_terms(get_the_ID(), 'alt_service_category');
            // print_r($terms);
            // $category_slugs = get_the_terms($post->ID, 'alt_service_category');
            // print_r($category_slugs) ;
            ?>
            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <i class="<?php the_field('item_icon'); ?>"></i>
              <div>
                <h4><a href="" class="stretched-link">
                    <?php the_field('item_title'); ?>
                  </a></h4>
                <p>
                  <?php the_field('item_description'); ?>
                </p>
              </div>
            </div><!-- End Icon Box -->
            <div>
            </div>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </div>

      </div>
    </div>
  </section><!-- End Alt Services Section -->

  <!-- ======= Alt Services Section 2 ======= -->
  <section id="alt-services-2" class="alt-services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-around gy-4">
        <div class="col-lg-5 d-flex flex-column justify-content-center">
          <h3>Non quasi officia eum nobis et rerum epudiandae rem voluptatem</h3>
          <p>Maxime quia dolorum alias perspiciatis. Earum voluptatem sint at non. Ducimus maxime minima iste magni
            sit praesentium assumenda minus. Amet rerum saepe tempora vero.</p>

          <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
            <i class="bi bi-easel flex-shrink-0"></i>
            <div>
              <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate
                non provident</p>
            </div>
          </div><!-- End Icon Box -->

          <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-patch-check flex-shrink-0"></i>
            <div>
              <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                deleniti atque</p>
            </div>
          </div><!-- End Icon Box -->

          <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-brightness-high flex-shrink-0"></i>
            <div>
              <h4><a href="" class="stretched-link">Dine Pad</a></h4>
              <p>Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus
                aut eligendi omnis</p>
            </div>
          </div><!-- End Icon Box -->

          <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-brightness-high flex-shrink-0"></i>
            <div>
              <h4><a href="" class="stretched-link">Tride clov</a></h4>
              <p>Est voluptatem labore deleniti quis a delectus et. Saepe dolorem libero sit non aspernatur odit amet.
                Et eligendi</p>
            </div>
          </div><!-- End Icon Box -->
        </div>

        <div class="col-lg-6 img-bg" style="background-image: url(assets/img/alt-services-2.jpg);" data-aos="zoom-in"
          data-aos-delay="100"></div>
      </div>

    </div>
  </section><!-- End Alt Services Section 2 -->

  <!-- ======= Our Team Section ======= -->
  <section id="team" class="team">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>
          <?php the_field('our_team_title'); ?>
        </h2>
        <p>
          <?php the_field('our_team_description'); ?>
        </p>
      </div>

      <div class="row gy-5">


        <?php
        while (have_rows('team_members')):
          the_row()
          ; ?>
          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="<?php echo get_sub_field('team_member_image')['url']; ?>" class="img-fluid" alt="">
              <div class="social">
                <?php while (have_rows('team_member_socials')):
                  the_row(); ?>
                  <a href="<?php the_sub_field('social_link'); ?>"><i
                      class="<?php the_sub_field('social_icon'); ?>"></i></a>
                <?php endwhile; ?>
                <!-- <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a> -->
              </div>
            </div>
            <div class="member-info text-center">
              <h4>
                <?php the_sub_field('team_member_name'); ?>
              </h4>
              <span>
                <?php the_sub_field('team_member_title'); ?>
              </span>
              <p>
                <?php the_sub_field('team_member_description'); ?>
              </p>
            </div>
          </div><!-- End Team Member -->
        <?php endwhile; ?>

      </div>

    </div>
  </section><!-- End Our Team Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Testimonials</h2>
        <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia
          reprehenderit sunt deleniti</p>
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
                  <?php
                  $reviews = get_field('client_review');
                  ; ?>
                  <div class="stars">
                    <?php if ($reviews == 1): ?>
                      <?php echo '
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star"></i>
                      '; ?>
                    <?php elseif ($reviews == 2): ?>
                      <?php
                      echo
                        '
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                          '
                      ; ?>
                    <?php elseif ($reviews == 3): ?>
                      <?php echo
                        '<i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        '
                      ; ?>
                    <?php elseif ($reviews == 4): ?>
                      <?php
                      echo
                        '
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                        '
                      ; ?>
                    <?php elseif ($reviews == 5): ?>
                      <?php
                      echo
                        '
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        '
                      ; ?>
                    <?php endif; ?>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <?php the_field('review_quote'); ?>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
          <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->

<?php get_footer(); ?>