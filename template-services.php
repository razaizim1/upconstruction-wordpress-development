<?php
$options = get_option('codestar');
/*
Template Name: Services Template
*/
get_header();
; ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('<?php echo $options['breadcrumb_background_image']['url']; ?>');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>Services</h2>
      <ol>
        <li><a href="<?php home_url(); ?>">Home</a></li>
        <li>Services</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <?php
        $services = new WP_Query(
          array(
            'post_type' => 'services',
            'posts_per_page' => -1,
            'order' => 'ASC'
          )
        );
        while ($services->have_posts()):
          $services->the_post()
          ; ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
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
              <a href="service-details.html" class="readmore stretched-link">
                <?php the_field('service_item_button_text'); ?><i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Servie Cards Section ======= -->
  <section id="services-cards" class="services-cards">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <?php
        while (have_rows('services_cards')):
          the_row()
          ; ?>
          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <h3>
              <?php the_sub_field('services_card_title'); ?>
            </h3>
            <p>
              <?php the_sub_field('services_card_description'); ?>
            </p>
            <ul class="list-unstyled">
              <?php while (have_rows('card_items')):
                the_row(); ?>
                <li><i class="<?php the_sub_field('item_icon'); ?>"></i> <span>
                    <?php the_sub_field('item'); ?>
                  </span></li>
              <?php endwhile;
              wp_reset_postdata(); ?>
            </ul>
          </div><!-- End feature item-->
        <?php endwhile; wp_reset_postdata();?>
      </div>
    </div>
  </section><!-- End Servie Cards Section -->

  <!-- ======= Alt Services Section 2 ======= -->
  <section id="alt-services-2" class="alt-services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-around gy-4">
        <div class="col-lg-5 d-flex flex-column justify-content-center">
          <h3>
            <?php the_field('alt_services_2_title'); ?>
          </h3>
          <p>
            <?php the_field('alt_services_2_description'); ?>
          </p>

          <?php
          $alt_services = new WP_Query(
            array(
              'post_type' => 'alt_services',
              'posts_per_page' => '4',
              'order' => 'ASC'
            )
          );
          while ($alt_services->have_posts()):
            $alt_services->the_post()
            ; ?>
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
          <?php endwhile; wp_reset_postdata();?>
        </div>

        <div class="col-lg-6 img-bg" style="background-image: url(<?php echo get_field('alt_services_2_image')['url'] ;?>);" data-aos="zoom-in"
          data-aos-delay="100"></div>
      </div>

    </div>
  </section><!-- End Alt Services Section 2 -->

  <!-- ======= Alt Services Section ======= -->
  <section id="alt-services" class="alt-services">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-around gy-4">
        <div class="col-lg-6 img-bg" style="background-image: url(<?php echo get_field('alt_services_image')['url'] ;?>);" data-aos="zoom-in"
          data-aos-delay="100"></div>

        <div class="col-lg-5 d-flex flex-column justify-content-center">
          <h3>
            <?php the_field('alt_services_title'); ?>
          </h3>
          <p>
            <?php the_field('alt_services_description'); ?>
          </p>

          <?php
          $alt_services = new WP_Query(
            array(
              'post_type' => 'alt_services',
              'posts_per_page' => '4',
              'order' => 'ASC'
            )
          );
          while ($alt_services->have_posts()):
            $alt_services->the_post()
            ; ?>
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
          <?php endwhile; wp_reset_postdata();?>
        </div>
      </div>
    </div>
  </section><!-- End Alt Services Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>
          <?php the_field('testimonials_title'); ?>
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
                    <?php
                    $reviews = get_field('client_review');
                    if ($reviews == 1):
                      ?>
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
          <?php endwhile; wp_reset_postdata();?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->

<?php get_footer(); ?>