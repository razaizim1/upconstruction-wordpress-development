<?php
/*
Template Name: Contact Page
*/
$options = get_option('codestar');
get_header(); ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('<?php echo $options['breadcrumb_background_image']['url']; ?>');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>Contact</h2>
      <ol>
        <li><a href="<?php echo home_url(); ?>"><?php
           $page_ids = get_all_page_ids();
           foreach ($page_ids as $id):
             if (get_the_title($id) == 'Home') {
               echo 'Home';
             }
           endforeach; ?></a></li>
        <li>
          <?php echo wp_title('', true, 'left'); ?>
        </li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">
        <?php while (have_rows('contact_details')):
          the_row(); ?>
          <div class="col-lg-<?php if (get_sub_field('column_width') == 'Large Column') {
            echo '6';
          } elseif (get_sub_field('column_width') == 'Small Column') {
            echo '3';
          }
          ; ?>">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="<?php the_sub_field('contact_icon'); ?>"></i>
              <h3>
                <?php the_sub_field('contact_title'); ?>
              </h3>
              <p>
                <?php the_sub_field('contact_info'); ?>
              </p>
            </div>
          </div><!-- End Info Item -->
        <?php endwhile; ?>
      </div>

      <div class="row gy-4 mt-1">

        <div class="col-lg-6 ">
          <?php echo get_field('google_map') ; ?>
          <iframe
            src="<?php the_field('google_map_src') ;?>"
            frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="col-lg-6">
          <?php echo do_shortcode('[contact-form-7 id="459" title="Upconstruction Contact Form"]') ; ?>
        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php get_footer(); ?>