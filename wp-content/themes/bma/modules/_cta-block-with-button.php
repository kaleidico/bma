<?php

	$ctaBlockBgImage = get_sub_field('background_image');
	
	$IdDownloadable = get_sub_field('downloadable');
	
?>

<section class="module-cta-block-with-button <?php the_sub_field('space_after'); ?>">
    <div class="container cta-block-container" style="background-image: url(<?php echo $ctaBlockBgImage["url"] ?>);" >
		<div class="row" >
			<div class="col-md-12" >
				<h2 class="cta_heading" ><?php echo get_sub_field('cta_heading'); ?></h2>
				<div class="cta_content" ><p><?php echo get_sub_field('cta_content'); ?></p></div>
				<a href="<?php echo get_sub_field('cta_button_link'); ?>" class="download" <?php if( isset($IdDownloadable[0]) &&  $IdDownloadable[0] == "Yes") { echo "download"; } ?> ><?php echo get_sub_field('cta_button_label'); ?></a>
			</div>
		</div>
    </div>
</section>		