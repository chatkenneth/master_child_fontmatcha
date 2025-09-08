

<?php global $switched; ?>
<?php $current_blog = get_current_blog_id(); ?>
<?php $main_blog = 1; ?>
<?php $image_path = get_stylesheet_directory_uri().'/img/preview-font/font-'; ?>


<?php switch_to_blog($main_blog); ?>

   <?php $term_args  = array('taxonomy' => 'all_websites_font_family','hide_empty' => false,'parent' => 0 , 'exclude' => array('1'),'fields' => 'all'); ?>
   <?php # https://developer.wordpress.org/reference/functions/get_terms/ ?>
   <?php # fields options: 'names|ids|all' ?>
   <?php $term_array = get_terms($term_args); ?>
   
   <div class="row gy-3">
     <?php if($term_array): ?>
        <?php foreach($term_array as $all_items_ctr => $each_item): ?>
              <div class="col-12 col-lg-12">
                 <a href="javascript:void(0)" data-remodal-action="close"  class="d-block p-3 border">
                     <?php $image_placeholder = $image_path . $all_items_ctr.'.webp'; ?>
                     <!-- <img src="<?php echo $image_placeholder; ?>" title="800x800" alt="800x800" class="border"> -->
                     <span class="h3 text-center"><?php echo $each_item->name; ?> (<?php echo $each_item->count; ?>)</span>
                 </a>
                
             </div>
           
           
        <?php endforeach; ?>
     <?php endif; ?>
       
   </div>


<?php restore_current_blog();?>


