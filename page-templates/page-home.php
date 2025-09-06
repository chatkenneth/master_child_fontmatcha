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
                                        /**
                                         * List "all_websites" posts and render ACF repeater "all_entries"
                                         * (sub field: "image_url"), grouped per post with Fancybox.
                                         * - Works in Multisite via switch_to_blog()
                                         * - Uses proper ACF repeater API (have_rows / the_row / get_sub_field)
                                         * - Uses safe escaping and robust $paged handling
                                         */

                                        global $switched;

                                        // --- Multisite: switch to the main blog (adjust if needed)
                                        $main_blog_id = 1;
                                        switch_to_blog( $main_blog_id );

                                        // --- Pagination: supports normal archives and static front page
                                        $paged = max(
                                          1,
                                          (int) get_query_var('paged'),
                                          (int) get_query_var('page')
                                        );

                                        // --- Query args
                                        $all_websites_args = array(
                                          'post_type'      => array( 'all_websites' ),
                                          'posts_per_page' => 5,       // set to -1 for all
                                          'order'          => 'DESC',  // newest first
                                          'orderby'        => 'date',
                                          'paged'          => $paged,
                                        );

                                        // --- Run custom query
                                        $all_websites_query = new WP_Query( $all_websites_args );
                                        ?>

                                        <?php if ( $all_websites_query->have_posts() ) : ?>
                                          <div class="row">
                                            <?php while ( $all_websites_query->have_posts() ) : $all_websites_query->the_post(); ?>
                                              <div class="col-12 col-lg-12 mb-4">
                                                <?php
                                                // Use ACF repeater API — safer and more reliable than get_field() for repeaters
                                                $gallery_id = 'image-' . get_the_ID();
                                                $item_index = 0;

                                                if ( have_rows( 'all_entries', get_the_ID() ) ) :
                                                  while ( have_rows( 'all_entries', get_the_ID() ) ) : the_row();

                                                    // Sub field "image_url" can return URL or Array depending on ACF "Return Format"
                                                    $image_val = get_sub_field( 'image_url' );
                                                    $image_url = '';

                                                    if ( is_array( $image_val ) ) {
                                                      // Image field -> Array: expect 'url'
                                                      $image_url = isset( $image_val['url'] ) ? $image_val['url'] : '';
                                                    } else {
                                                      // Image field -> URL OR plain text
                                                      $image_url = (string) $image_val;
                                                    }

                                                    if ( ! $image_url ) {
                                                      // If subfield is an image ID, resolve it:
                                                      if ( is_numeric( $image_val ) ) {
                                                        $resolved = wp_get_attachment_image_url( (int) $image_val, 'full' );
                                                        if ( $resolved ) {
                                                          $image_url = $resolved;
                                                        }
                                                      }
                                                    }

                                                    // Build Fancybox anchors: first visible, rest hidden (d-none)
                                                    $is_first = ( $item_index === 0 );
                                                    $classes  = $is_first
                                                      ? 'ratio border ratio-16x9 rounded-3 general-image general-image-type-image d-block lazy'
                                                      : 'd-none';
                                                    ?>
                                                    <a
                                                      href="javascript:void(0)"
                                                      data-fancybox="<?php echo esc_attr( $gallery_id ); ?>"
                                                      class="<?php echo esc_attr( $classes ); ?>"
                                                      data-src="<?php echo esc_url( $image_url ); ?>"
                                                      data-height="1080"
                                                      data-bg="<?php echo esc_url( $image_url ); ?>">
                                                    </a>
                                                    <?php
                                                    $item_index++;
                                                  endwhile;
                                                endif;
                                                ?>

                                                <h2 class="h4 mt-3"><?php the_title(); ?></h2>
                                                <p>
                                                  <?php
                                                  // Replace with your real excerpt/content
                                                  echo esc_html__(
                                                    'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                                                    'your-text-domain'
                                                  );
                                                  ?>
                                                </p>
                                              </div>
                                            <?php endwhile; ?>
                                          </div>

                                          <?php
                                          // --- Pagination (basic example). Replace with your template part if preferred.
                                          $big = 999999999; // need an unlikely integer
                                          $links = paginate_links( array(
                                            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                            'format'    => '?paged=%#%',
                                            'current'   => max( 1, $paged ),
                                            'total'     => $all_websites_query->max_num_pages,
                                            'type'      => 'list',
                                            'prev_text' => '&laquo;',
                                            'next_text' => '&raquo;',
                                          ) );

                                          if ( $links ) :
                                            echo '<nav class="pagination-wrapper">' . $links . '</nav>';
                                          endif;
                                          ?>

                                        <?php else : ?>
                                          <?php
                                          // No posts template — swap for your theme partial if desired
                                          echo '<p>' . esc_html__( 'No entries found.', 'your-text-domain' ) . '</p>';
                                          ?>
                                        <?php endif; ?>

                                        <?php
                                        // --- Reset globals from custom query
                                        wp_reset_postdata();

                                        // --- Always restore blog after switch_to_blog()
                                        restore_current_blog();
                                        ?>
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
                           
                           <a href="javascript:void(0)"  >
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