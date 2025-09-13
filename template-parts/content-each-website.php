
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
