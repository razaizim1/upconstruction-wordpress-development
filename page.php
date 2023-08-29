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
    <?php while (have_posts()):
      the_post(); ?>
      <div class="container">

        <p>
          You can duplicate this sample page and create any number of inner pages you like!
        </p>

      </div>
    <?php endwhile; ?>
  </section>

</main><!-- End #main -->

<?php get_footer(); ?>