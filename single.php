<?php
$options = get_option('codestar');
get_header(); ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumbs-bg.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center">

      <h2>Blog Details</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Blog Details</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container">

      <div class="row g-5">
        <div class="col-lg-8">
          <?php while (have_posts()):
            the_post(); ?>
            <article class="blog-details">
              <div class="post-img">
              <?php $post_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                <img src="<?php echo $post_image_url; ?>" alt="" class="img-fluid">
              </div>
              <h2 class="title">
                <?php the_title(); ?>
              </h2>
              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                    <a href="blog-details.html">
                      <?php the_author(); ?>
                    </a>
                  </li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                    <a href="blog-details.html"><time datetime="2020-01-01">
                        <?php the_time('F j, Y'); ?>
                      </time></a>
                  </li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                    <a href="blog-details.html">
                      <?php echo get_comments_number(); ?> Comments
                    </a>
                  </li>
                </ul>
              </div>
              <!-- End meta top -->
              <div class="content">
                <?php the_content(); ?>


              </div>
              <!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <?php $categories = get_the_category();
                  foreach ($categories as $category):
                    ?>
                    <li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">

                  <?php $tags = get_the_tags();
                  if ($tags == ''):
                    ?>
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  <?php else: ?>
                    <?php
                    foreach ($tags as $tag):
                      ; ?>
                      <li><a href="#">
                          <?php echo $tag->name; ?>
                        </a></li>
                    <?php endforeach; ?>
                  <?php endif; ?>

                </ul>
              </div><!-- End meta bottom -->

            </article><!-- End blog post -->
          <?php endwhile; ?>

          <div class="post-author d-flex align-items-center">
            <?php $user_id = wp_get_current_user();
            // print_r($photo) ;
            $user_image = get_avatar_url($user_id->ID);
            // echo $photo2;
            ?>
            <img src="<?php echo $user_image; ?>" class="rounded-circle flex-shrink-0" alt="">
            <div>
              <h4>
                <?php the_author(); ?>
              </h4>

              <div class="social-links">
                <?php $socials = $options['social'];
                foreach ($socials as $social):
                  ?>
                  <a href="<?php echo $social['social_link']; ?>"><i
                      class="<?php echo $social['social_icon']; ?>"></i></a>
                <?php endforeach; ?>
              </div>
              <p>
                <?php echo $options['about']; ?>
              </p>
            </div>

          </div><!-- End post author -->

          <div class="comments">

            <?php

            // If comments are open or there is at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
              comments_template();
            }
            ; ?>
            <h4 class="comments-count">
              <?php echo get_comments_number(); ?> Comments
            </h4>
            <?php wp_list_comments(); ?>

          </div><!-- End blog comments -->

        </div>
        <?php get_sidebar(); ?>
      </div>

    </div>
  </section><!-- End Blog Details Section -->

</main><!-- End #main -->

<?php get_footer(); ?>