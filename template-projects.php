<?php
/*
Template Name: Projects Template
*/
$options = get_option('codestar');
get_header(); ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('<?php echo $options['breadcrumb_background_image']['url']; ?>');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>
        <?php echo wp_title('', true, 'left'); ?>
      </h2>
      <ol>
        <?php
        // $page_ids = get_all_page_ids();
        // echo '<h3>My Page List :</h3>';
        // foreach ($page_ids as $id) {
        //   echo $page_name = '<br />' . get_the_title($id) . ' ' . $id;
        // }
        // echo $page_name;
        ?>
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

  <!-- ======= Our Projects Section ======= -->
  <section id="projects" class="projects">
    <div class="container" data-aos="fade-up">

      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
        data-portfolio-sort="original-order">

        <?php
        $project_categories = get_terms(
          array(
            'taxonomy' => 'projects_filter',
            'hide_empty' => false
          )
        );
        // print_r($project_categories)
        ; ?>
        <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <?php foreach ($project_categories as $category): ?>
            <li data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
          <?php endforeach; ?>
          <!-- <li data-filter=".filter-construction">Construction</li>
          <li data-filter=".filter-repairs">Repairs</li>
          <li data-filter=".filter-design">Design</li> -->
        </ul><!-- End Projects Filters -->

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php
          $projects = new WP_Query(
            array(
              'post_type' => 'projects',
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
                <img src="<?php echo get_field('projects_image')['url'] ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>
                    <?php the_title(); ?>
                  </h4>
                  <p>
                    <?php echo wp_trim_words(get_the_content(), '10', '...'); ?>
                  </p>
                  <a href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" title="<?php the_title(); ?>"
                    data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="<?php the_permalink(); ?>" title="More Details" class="details-link"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->
          <?php endwhile; ?>

        </div><!-- End Projects Container -->

      </div>

    </div>
  </section><!-- End Our Projects Section -->

</main><!-- End #main -->

<?php get_footer(); ?>