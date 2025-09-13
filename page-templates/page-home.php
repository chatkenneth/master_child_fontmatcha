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


                        


                                        <?php global $switched; ?>
                                        <?php $current_blog = get_current_blog_id(); ?>
                                        <?php $main_blog = 1; ?>

                                        <?php $blog_url = get_bloginfo('url'); ?>
                                        
                                        <?php switch_to_blog($main_blog); ?>
                                        
                                            
                                 

                                           <?php
                                           # For Pagination (Optional)
                                           # Set the "paged" parameter (use 'page' if the query is on a static front page)
                                           $paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
                                           
                                           # Parameter
                                           $all_websites_args = array (
                                               'post_type' => array( 'all_websites', ),
                                               'posts_per_page'  => 15,  # -1 for all
                                               'order'   => 'DESC',  # Newest
                                               'orderby' => 'modified', // order by last modified date
                                               'paged'  => $paged,  # For Pagination
                                               'meta_query'     => array(
                                                       array(
                                                           'key'     => 'all_entries',   // ACF saves repeater row count here
                                                           'value'   => 0,
                                                           'compare' => '>',             // Must have more than 0 rows
                                                           'type'    => 'NUMERIC'
                                                       )
                                                   )
                                           );
                                           
                                           # Connect Loop to Parameter
                                           $all_websites_query = new WP_Query( $all_websites_args );
                                           
                                           # For Pagination Issue (Optional)
                                           $temp_query = $wp_query;
                                           $wp_query   = NULL;
                                           $wp_query   = $all_websites_query;
                                           ?>
                                           
                                           <?php
                                           # Loop
                                           if ( $all_websites_query->have_posts() ) : ?>
                                           
                                           
                                               <?php while ( $all_websites_query->have_posts() ) : $all_websites_query->the_post(); ?>
                                                   <div class="col-12 col-lg-12">
                                                       <?php # Template Part | Each Website
                                                       get_template_part('template-parts/content-each-website'); ?>
                                                   </div>
                                               <?php endwhile; ?>
                                     
                                            <?php if(get_the_posts_pagination()): ?>
                                                 <div class="pagination text-center">
                                                     <?php
                                                     $links = paginate_links( array(
                                                         'base'      => $blog_url . '/%_%',
                                                         'format'    => 'page/%#%',
                                                         'current'   => max( 1, get_query_var('paged') ),
                                                         'total'     => $all_websites_query->max_num_pages,
                                                         'mid_size'  => 3,
                                                         'prev_text' => '',   // empty prev text (like your sample)
                                                         'next_text' => '',   // empty next text (like your sample)
                                                         'type'      => 'plain', // default, returns <a> and <span> links
                                                     ) );

                                                     if ( $links ) {
                                                         echo '<div class="nav-links">';
                                                         echo $links;
                                                         echo '</div>';
                                                     }
                                                     ?>

                                                 </div>
                                             <?php endif; ?>


                                           
                                           <?php else : ?>
                                              <?php # Template Part | No Post Data
                                              get_template_part('template-parts/content-none'); ?>
                                           <?php endif; ?>
                                           
                                           <?php wp_reset_query(); ?>
                                        
                                        <?php restore_current_blog();?>

                                        
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
                           
                           <?php # Template Part | All
                           get_template_part('template-parts/content-all-fonts'); ?>
                           
                       </div>
                   </div>
                </div>
            </div>
         </div>
         <?php if(false): ?>
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
         <?php endif; ?>
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
                       <?php # Template Part | All
                       get_template_part('template-parts/content-all-fonts'); ?>
                   </div>
                </div>
            </div>
         </div>
         <?php if(false): ?>
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
         <?php endif; ?>
     </div>
</div>

<?php get_footer(); ?>