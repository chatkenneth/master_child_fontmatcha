<?php
/**
* Template Name: Page: Font Detail
*/
?>

<?php get_header(); ?>

<!-- Main page -->
<div id="primary" class="content-area">
   <main id="main" class="site-main min-vh-100 py-0" role="main">
      
        <?php  $field_font = $_GET["font"]; ?>

        <?php global $switched; ?>
        <?php $current_blog = get_current_blog_id(); ?>
        <?php $main_blog = 1; ?>
        
        <?php switch_to_blog($main_blog); ?>

           <?php $term = get_term_by( 'slug', $field_font, "all_websites_font_family" ); ?>
           <?php $term_name =  $term->name ; ?>
           <?php $term_slug =  $term->slug ; ?>
           <?php $term_description =  $term->description ; ?>

            
           <section>
               <div class="container">
                   <div class="row align-items-center gy-3">
                       <div class="col-12 col-lg-6">
                           <h2><?php echo $term_name; ?></h2>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                       </div>
                       <div class="col-12 col-lg-6">
                           <div class="ratio ratio-16x9 rounded-3 general-image"></div>
                       </div>
                   </div>
               </div>
           </section>

           <section>
               <div class="container">
                   <div class="row align-items-center gy-3">
                       <div class="col-12 col-lg-8 mx-auto">
                           <h2>Font Details</h2>
                           <div class="table-responsive">
                              <table class="table table-striped border mb-0">
                                 
                                 <tr>
                                   <th>Pair Fonts</th>
                                   <td>Content</td>
                                 </tr>
                                 <tr>
                                   <th>Is Google Font?</th>
                                   <td>Content</td>
                                 </tr>
                                 <tr>
                                   <th>Alternative Premium Fonts</th>
                                   <td>Content</td>
                                 </tr>
                                 <tr>
                                   <th>Alternative Free Fonts</th>
                                   <td>Content</td>
                                 </tr>
                                 <tr>
                                   <th>Header</th>
                                   <td>Content</td>
                                 </tr>
                              </table>
                           </div>
                       </div>
                   </div>
               </div>
           </section>


   
           <?php
           
           # Parameter
           $all_websites_args = array (
               'post_type' => array( 'all_websites', ),
               'posts_per_page'  => 20,  # -1 for all
               'order'   => 'DESC',  # Newest
               'orderby' => 'modified', // order by last modified date
               'tax_query' => array(
                  'relation' => 'OR', # ('AND','OR')

                  array(
                     'field'    => 'slug',           #  ('term_id', 'name', 'slug', 'term_taxonomy_id')
                     'taxonomy' => 'all_websites_font_family',     #  Taxonomy Name
                     'operator' => 'IN',                #  ('IN', 'NOT IN', 'AND', 'EXISTS' and 'NOT EXISTS')
                     'terms'    =>  array( $field_font,),        #  (int, string, array)
                  ),
               ),
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
           
           
               <section>
                   <div class="container">
                       <div class="row">
                           <div class="col-12 col-lg-8 mx-auto">
                                
                                 <h2>Website Using <strong><?php echo $term_name; ?></strong></h2>
                                 <div class="row align-items-center gy-3">
                                    <?php while ( $all_websites_query->have_posts() ) : $all_websites_query->the_post(); ?>
                                        <div class="col-12 col-lg-12">
                                             <?php $acf_all_entries = get_field('all_entries'); ?>
                                             <?php $acf_website_data_url = get_field('website_data_url'); ?>
                                             <?php $acf_website_font_description = get_field('font_options_font_description'); ?>
                                    

                                             <?php if($acf_all_entries): ?>
                                                <?php foreach($acf_all_entries as $all_items_ctr => $each_entry): ?>
                                                     <?php  $acf_share_details_video_thumbnail = $each_entry['image_url']; ?>
                                                     <?php  $gallery_ids = "image-" . get_the_id(); ?>

                                                     <?php if($all_items_ctr == 0): ?>
                                                          <a href="javascript:void(0)"   data-fancybox="<?php echo $gallery_ids; ?>"  data-height="800"  class="ratio border ratio-16x9 rounded-3 general-image general-image-type-image d-block lazy"  data-src="<?php echo $acf_share_details_video_thumbnail; ?>" data-height="1080"   data-bg="<?php echo $acf_share_details_video_thumbnail; ?>"></a>   
                                                       <?php else: ?>  

                                                         <a href="javascript:void(0)"   data-fancybox="<?php echo $gallery_ids; ?>"  data-height="800"  class="d-none"  data-src="<?php echo $acf_share_details_video_thumbnail; ?>" data-height="1080"   data-bg="<?php echo $acf_share_details_video_thumbnail; ?>"></a>   
                                                       <?php endif; ?>  

                                                <?php endforeach; ?>
                                             <?php endif; ?>

                                             <div class="mt-3">
                                                 <div class="row align-items-center justify-content-between gy-3 mb-2">
                                                     <div class="col-auto">
                                                         <h2 class="h3"><?php the_title(); ?></h2>
                                                     </div>
                                                     <div class="col-auto">
                                                         <a href="<?php echo $acf_website_data_url; ?>" target="_blank">Visit Site <i class="fa-regular fa-fw fa-arrow-right-long fa-f178"></i></a>
                                                     </div>
                                                 </div>
                                                 <?php echo wpautop($acf_website_font_description); ?>
                                             </div>
                                        </div>
                                    <?php endwhile; ?>

                                </div>
                                
                           </div>
                       </div>
                   </div>
               </section>


           
           <?php endif; ?>
           
           <?php wp_reset_query(); ?>
           
        
        <?php restore_current_blog();?>

   </main>
</div>
<!-- Main page -->

<?php get_footer(); ?>