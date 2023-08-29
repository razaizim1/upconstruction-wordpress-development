<?php
/*
Template Name: Single Services
*/
$options = get_option('codestar');
get_header(); ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('<?php echo $options['breadcrumb_background_image']['url']; ?>');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>Service Details</h2>
      <ol>
        <li><a href="<?php home_url(); ?>"><?php
          $page_ids = get_all_page_ids();
          foreach ($page_ids as $id):
            if (get_the_title($id) == 'Home') {
              echo 'Home';
            }
          endforeach; ?></a></li>
        <li>
          Service Details
          <?php
          // echo get_the_id();
          // $page_ids = get_all_page_ids();
          // foreach ($page_ids as $id):
          //   $current_page_title = get_the_title($id). '/';
          //   echo $current_page_title;
          //   // if($current_page_title == )
          // endforeach;
          ?>
        </li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Service Details Section ======= -->
  <section id="service-details" class="service-details">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <?php
        while (have_posts()):
          the_post();
          $services_category = get_terms(
            array(
              'taxonomy' => 'services_category',
              'hide_empty' => false
            )
          );
          // print_r($services_category);
          ?>
          <div class="col-lg-4">
            <div class="services-list">
              <?php foreach ($services_category as $category): ?>
                <?php
                // $category_link = get_category_link($category->term_id);
                // print_r($category);
                ?>
                <a href="<?php echo get_term_link($category); ?>" class="active"><?php echo $category->name; ?></a>
              <?php endforeach; ?>
              <!-- <a href="#">Construction</a>
            <a href="#">Product Management</a>
            <a href="#">Repairs</a>
            <a href="#">Design</a> -->
            </div>

            <h4>
              <?php the_title(); ?>
            </h4>
            <p>
              <?php echo wp_trim_words(get_the_content(), '25', ''); ?>
            </p>
          </div>
          <div class="col-lg-8">
            <?php the_content(); ?>
          </div>

        </div>
      <?php endwhile; ?>

    </div>
  </section><!-- End Service Details Section -->

</main><!-- End #main -->

<?php get_footer(); ?>