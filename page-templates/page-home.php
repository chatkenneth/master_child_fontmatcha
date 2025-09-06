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
                                        
                                        <?php switch_to_blog($main_blog); ?>
                                        
                                          <?php $post_args  = array(
                                             'post_type' =>  array('all_websites',) ,
                                             'numberposts' => 5,
                                             // 'post__not_in' => array(get_the_ID()),
                                             // 'post__in' => array( 2, 5, 12, 14, 20 ),
                                             // 'category__in' => array(1),
                                             // 'category__not_in' => array(2),
                                             // 'orderby' => post__in,
                                             // 'post_status' => array('trash','publish','draft'),
                                             // 'fields'    => 'ids',
                                             // 'tax_query' => array(
                                             //  array(
                                             //    'taxonomy' => 'episodes',
                                             //    'field' => 'id',
                                             //    'terms' => 24,
                                             //    'include_children' => false,
                                             //  )),
                                          ); ?>
                                          
                                          <?php # https://developer.wordpress.org/reference/functions/get_posts/ ?>
                                          <?php $post_array = get_posts($post_args); ?>
                                          
                                          <?php // $post_data_id = $post_array[0]->ID; ?>
                                          <?php // $post_data_title = $post_array[0]->post_title; ?>
                                          <?php // $post_data_content = $post_array[0]->post_content; ?>
                                          
                                          <ul>
                                          <?php foreach($post_array as $item): ?>
                                             <li>
                                                <?php $acf_all_entries = get_field('all_entries', $item->ID); ?>
                                                <pre><?php var_dump($acf_all_entries); ?></pre>
                                             </li>
                                          <?php endforeach; ?>
                                          </ul>
                                          
    
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