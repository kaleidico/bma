<?php

	$ctaBlockBgImage = get_sub_field('background_image');
	
	$buttonUrl = get_sub_field('button_link');
	
?>

<section class="module-fullwidth-cta-with-bg <?php the_sub_field('space_after'); ?>">
    <div class="container-fluid fullwidth-cta-container" style="background: url(<?php echo $ctaBlockBgImage["url"] ?>) no-repeat center center; background-size:cover;" >
		<!--div class="row" -->
			<!--div class="col-md-12" -->
				<h2 class="cta_heading" ><?php echo get_sub_field('primary_heading'); ?></h2>
				<div class="cta_content" ><p><?php echo get_sub_field('secondary_heading'); ?></p></div>
				<a href="<?php echo $buttonUrl["url"]; ?>" class="download" ><?php echo get_sub_field('button_label'); ?></a>
			<!--/div-->
		<!--/div-->
    </div>
</section>		