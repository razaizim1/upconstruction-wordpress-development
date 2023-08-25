<?php $options = get_option('codestar'); ?>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content position-relative">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3>
                            <?php echo $options['footer_logo']; ?>
                        </h3>
                        <p>
                            <?php echo $options['footer_address']; ?>
                        </p>
                        <p>
                            <?php
                            $footer_contacts = $options['footer_contact'];
                            foreach ($footer_contacts as $fcontact):
                                ; ?>
                                <a href="<?php
                                if (is_numeric($fcontact['contact_info'])) {
                                    echo 'tel:' . $fcontact['contact_info'];
                                } else {
                                    echo 'mailto:' . $fcontact['contact_info'];
                                }
                                ; ?>"><strong>
                                        <?php echo $fcontact['contact_name']; ?>:
                                    </strong>
                                    <?php echo $fcontact['contact_info']; ?>
                                </a><br>
                            <?php endforeach; ?>
                        </p>
                        <div class="social-links d-flex mt-3">
                            <?php
                            $socials = $options['socials'];
                            foreach ($socials as $social):
                                ; ?>
                                <a href="<?php echo $social['social_link']; ?>"
                                    class="d-flex align-items-center justify-content-center"><i
                                        class="<?php echo $social['social_icon']; ?>"></i></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- End footer info column-->
                <?php dynamic_sidebar('footer_menus'); ?>

            </div>
        </div>
    </div>

    <div class="footer-legal text-center position-relative">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>UpConstruction</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://github.com/razaizim1">
                    <?php the_author(); ?>
                </a>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- <div id="preloader"></div> -->

<!-- Vendor JS Files -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/aos/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<?php wp_footer(); ?>
</body>

</html>