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
                                        <?php for ($ctr_item  = 1; $ctr_item  <= 10; $ctr_item++): ?>
                                           <div class="col-12 col-lg-12">
                                               <div class="ratio ratio-16x9 general-image"></div>
                                               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat.</p>
                                           </div>
                                        <?php endfor; ?>
                                        
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