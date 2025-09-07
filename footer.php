<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom-theme
 */

?>

  </div><!-- #content -->

  <footer id="colophon" class="site-footer ">
     <div class="footer-bottom  py-2" >
        <div class="container-fluid">
          <div class="row">
              <div class="col-12 col-lg-10 mx-auto text-center">
                  <ul class="menu-dots small-gap  white-menu-dash small ">
                      <li><span class="text-white"><i class="fa-light fa-copyright"></i> <span class="d-none d-lg-inline-block">copyright</span> <?php echo date("Y"); ?></span></li>
                      <?php $page_contact = get_bloginfo('url') . "/contact"; ?>
                      <li><a href="<?php echo $page_contact; ?>" >Contact</a></li>
                      <?php if(get_privacy_policy_url()): ?>
                          <li><a href="<?php echo get_privacy_policy_url(); ?>" >Privacy Policy</a></li>
                      <?php endif; ?> 
                      <li>
                        <?php # Shortcode | Buy me a Coffee
                        echo do_shortcode( '[display-bmc]' ); ?>
                      </li>
                  </ul>
              </div>
          </div>
        </div>
     </div>
  </footer>

 <!-- #colophon -->



</div>



   

</div><!-- #page -->



<?php wp_footer(); ?>

</body>
</html>