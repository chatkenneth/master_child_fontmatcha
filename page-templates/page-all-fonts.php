<?php
/**
* Template Name: Page: All Fonts
*/
?>

<?php get_header(); ?>

<!-- Main page -->
<div id="primary" class="content-area">
   <main id="main" class="site-main min-vh-100" role="main">
      <?php if( have_posts()):the_post(); ?>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">

                        <?php global $switched; ?>
                        <?php $current_blog = get_current_blog_id(); ?>
                        <?php $main_blog = 1; ?>
                        
                        <?php  $blog_url = trailingslashit( site_url() ); ?>

                        <?php switch_to_blog($main_blog); ?>
                        
                           <?php $all_fonts_args  = array('taxonomy' => 'all_websites_font_family','hide_empty' => false,'parent' => 0 , 'exclude' => array('1'),'fields' => 'all'); ?>
                           <?php # https://developer.wordpress.org/reference/functions/get_terms/ ?>
                           <?php # fields options: 'names|ids|all' ?>
                           <?php $all_fonts_array = get_terms($all_fonts_args); ?>
                           
                           <?php if($all_fonts_array): ?>
                              <div class="row g-2">

                                  <?php foreach($all_fonts_array as $ctr => $item): ?>
                                      <?php $active_category_class = (( get_queried_object_id() == $item->term_id ) ? 'active-category' : '') ?>
                                      <div class="col-12 col-lg-4">
                                          <h2 class="h3">
                                              <a href="<?php echo $blog_url ."font/?font=". $item->slug; ?>" class="p-3 border d-block bg-light">
                                                <?php echo $item->name; ?> 
                                              </a>
                                          </h2>
                                      </div>
                                  <?php endforeach; ?>
                                  
                              </div>    
                           <?php endif; ?>
                        <?php restore_current_blog();?>
                    </div>
                </div>
            </div>

      <?php endif; ?>
   </main>
</div>
<!-- Main page -->

<?php get_footer(); ?>