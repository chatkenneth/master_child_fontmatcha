<?php
/**
* Template Name: Page: Home
*/
?>

<?php get_header(); ?>

<!-- Main page -->
<div id="primary" class="content-area min-vh-100"> 
   <main id="main" class="site-main py-0" role="main">
      <?php if( have_posts()):the_post(); ?>

            <!------- homepage-banner ------->
            <section id="homepage-banner" class="" >
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-8 mx-auto ">
                            <div class="row align-items-center gy-5">
                                <div class="col-12 col-lg-12">
                                    <div class="row  gy-3">
                                        <div class="col-12 col-lg-6 text-center text-center">
                                            <a href="javascript:void(0)"  data-remodal-target="remodal-primary-font" class="btn btn-primary w-100 text-white">Select Primary Font</a>
                                        </div>
                                        <div class="col-12 col-lg-6 text-center text-center">
                                            <a href="javascript:void(0)" data-remodal-target="remodal-secondary-font"  class="btn btn-primary w-100 text-white">Select Secondary Font</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="row align-items-center gy-5">
                                        <?php
                                        global $switched, $wp_query;

                                        // 0) Which blog to read posts from:
                                        $main_blog = 1;

                                        // 1) Figure out the current page number (works on normal archives AND static front pages)
                                        $paged = max(
                                            1,
                                            (int) get_query_var('paged'),
                                            (int) get_query_var('page')
                                        );

                                        switch_to_blog( $main_blog );

                                        // 2) Build the query and include 'paged'
                                        $all_websites_args = array(
                                            'post_type'      => array('all_websites'),
                                            'posts_per_page' => 15,
                                            'paged'          => $paged,          // <-- IMPORTANT
                                            'order'          => 'DESC',
                                            'orderby'        => 'modified',
                                            'meta_query'     => array(
                                                array(
                                                    'key'     => 'all_entries',
                                                    'value'   => 0,
                                                    'compare' => '>',
                                                    'type'    => 'NUMERIC',
                                                ),
                                            ),
                                        );

                                        $all_websites_query = new WP_Query( $all_websites_args );

                                        // (Optional) If your pagination template expects the global $wp_query:
                                        $prev_wp_query = $wp_query;
                                        $wp_query = $all_websites_query;
                                        ?>

                                        <?php if ( $all_websites_query->have_posts() ) : ?>
                                          <?php while ( $all_websites_query->have_posts() ) : $all_websites_query->the_post(); ?>
                                            <div class="col-12 col-lg-12">
                                              <?php if ( $acf_all_entries = get_field('all_entries') ) : ?>
                                                <?php foreach ( $acf_all_entries as $all_items_ctr => $each_entry ) :
                                                  $acf_share_details_video_thumbnail = $each_entry['image_url'];
                                                  $gallery_ids = 'image-' . get_the_ID(); // safer than get_permalink() for an HTML id
                                                ?>
                                                  <?php if ( $all_items_ctr === 0 ) : ?>
                                                    <a href="javascript:void(0)" data-fancybox="<?php echo esc_attr($gallery_ids); ?>" class="ratio border ratio-16x9 rounded-3 general-image general-image-type-image d-block lazy" data-src="<?php echo esc_url($acf_share_details_video_thumbnail); ?>" data-height="1080" data-bg="<?php echo esc_url($acf_share_details_video_thumbnail); ?>"></a>
                                                  <?php else : ?>
                                                    <a href="javascript:void(0)" data-fancybox="<?php echo esc_attr($gallery_ids); ?>" class="d-none" data-src="<?php echo esc_url($acf_share_details_video_thumbnail); ?>" data-height="1080" data-bg="<?php echo esc_url($acf_share_details_video_thumbnail); ?>"></a>
                                                  <?php endif; ?>
                                                <?php endforeach; ?>
                                              <?php endif; ?>

                                              <h2><?php the_title(); ?></h2>
                                              <p>Lorem ipsum…</p>
                                            </div>
                                          <?php endwhile; ?>

                                          <?php
                                          // 3) Output pagination BEFORE restoring blog.
                                          // If you have a template part, keep using it; otherwise, here’s a direct paginate_links() example:
                                          echo paginate_links( array(
                                              'total'   => (int) $all_websites_query->max_num_pages,
                                              'current' => (int) $paged,
                                              'base'    => trailingslashit( get_pagenum_link(1) ) . '%_%',
                                              'format'  => 'page/%#%/',
                                              'prev_text' => '« Prev',
                                              'next_text' => 'Next »',
                                          ) );

                                          // Or keep your template part:
                                          // get_template_part('template-parts/content-archive-pagination');
                                          ?>

                                        <?php else : ?>
                                          <?php get_template_part('template-parts/content-none'); ?>
                                        <?php endif; ?>

                                        <?php
                                        // 4) Clean up properly
                                        wp_reset_postdata();
                                        $wp_query = $prev_wp_query;   // restore global query so other parts of the page behave
                                        restore_current_blog();

                                    </div>
                                </div>
                            </div>


                        </div>
                        
                    </div>
                </div>
            </section>


      <?php endif; ?>
   </main>
</div>
<!-- Main page -->

<?php # Remodal | https://github.com/vodkabears/Remodal ?>
<div class="remodal " data-remodal-id="remodal-primary-font" data-remodal-options="hashTracking: false,modifier: remodal-primary-font remodal-general  remodal-style-fullheight remodal-move-left-to-right,closeOnOutsideClick:true,closeOnEscape:true" >
     <!-- Column Container -->
     <div class="menu-container">
         <!-- Top Column -->
         <div class="menu-container-top ">
               <div class="container ">
                   <div class="row align-items-center justify-content-between gy-3">
                       <div class="col-auto">
                           <span class="h3">Primary Font</span>
                       </div>
                       <div class="col-auto">
                           
                           <a href="javascript:void(0)"  data-remodal-action="close" >
                              <i class="fa-regular fa-fw fa-xmark fa-2x"></i>
                           </a>
                           
                       </div>
                   </div>
                   
               </div>
         </div>
         <!-- Middle Column -->
         <div class="menu-container-middle">
            <div class="container h-100">
                <div class="row h-100">
                   <div class="col-12 my-auto ">
                      
                       <div class="row gy-2">
                            <?php for ($ctr_item  = 1; $ctr_item  <= 10; $ctr_item++): ?>
                                <div class="col-12 col-lg-12">
                                   <a href="javascript:void(0)" data-remodal-action="close"  class="d-block">
                                       <?php $image_placeholder = get_stylesheet_directory_uri().'/img/preview-font/font-'.$ctr_item.'.webp'; ?>
                                       <img src="<?php echo $image_placeholder; ?>" title="800x800" alt="800x800" class="border">
                                   </a>
                               </div>
                            <?php endfor; ?>
                       </div>
                   </div>
                </div>
            </div>
         </div>
         <!-- Bottom Column -->
         <div class="menu-container-bottom">
             <div class="container">
                 <div class="row">
                     <div class="col-12 col-md-12 text-center">
                          <?php echo '&copy; ' .  date("Y"); ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>

<?php # Remodal | https://github.com/vodkabears/Remodal ?>
<div class="remodal " data-remodal-id="remodal-secondary-font" data-remodal-options="hashTracking: false,modifier: remodal-secondary-font remodal-general  remodal-style-fullheight remodal-move-right-to-left,closeOnOutsideClick:true,closeOnEscape:true" >
     <!-- Column Container -->
     <div class="menu-container">
         <!-- Top Column -->
         <div class="menu-container-top ">
               <div class="container ">
                   <div class="row align-items-center justify-content-between gy-3">
                       <div class="col-auto">
                           <span class="h3">Secondary Font</span>
                       </div>
                       <div class="col-auto">
                           
                           <a href="javascript:void(0)" data-remodal-action="close"  >
                              <i class="fa-regular fa-fw fa-xmark fa-2x"></i>
                           </a>
                           
                       </div>
                   </div>
                   
               </div>
         </div>
         <!-- Middle Column -->
         <div class="menu-container-middle">
            <div class="container h-100">
                <div class="row h-100">
                   <div class="col-12 my-auto ">
                       
                       
                       <div class="row gy-2">
                            <?php for ($ctr_item  = 1; $ctr_item  <= 10; $ctr_item++): ?>
                                <div class="col-12 col-lg-12">
                                   <a href="javascript:void(0)" data-remodal-action="close"  class="d-block">
                                       <?php $image_placeholder = get_stylesheet_directory_uri().'/img/preview-font/font-'.$ctr_item.'.webp'; ?>
                                       <img src="<?php echo $image_placeholder; ?>" title="800x800" alt="800x800" class="border">
                                   </a>
                               </div>
                            <?php endfor; ?>
                       </div>
                       
                   </div>
                </div>
            </div>
         </div>
         <!-- Bottom Column -->
         <div class="menu-container-bottom">
             <div class="container">
                 <div class="row">
                     <div class="col-12 col-md-12 text-center">
                          <?php echo '&copy; ' .  date("Y"); ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>

<?php get_footer(); ?>