<?php

	$ctaBlockBgImage = get_sub_field('background_image_email');
	$gravityformid = get_sub_field('gravity_form_id');
?>
<section class="module-cta-block-with-email-capture <?php the_sub_field('space_after'); ?>">
    <div class="cta-block-container" style="background-image: url(<?php echo $ctaBlockBgImage["url"] ?>);background-size: cover;">
		<div class="container" >			
			<h2 class="cta_heading" ><?php echo get_sub_field('cta_heading_email'); ?></h2>
			<div class="cta_content" ><p><?php echo get_sub_field('cta_content_email'); ?></p></div>
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="gform-container">
                        <?php
                        $formID = get_sub_field('gravity_form_id');
                        ?>
                        <?php echo do_shortcode('[gravityform id="'.$formID.'" title="false" ajax="true" tabindex="10"]'); ?>
					</div>
				</div>
			</div>	
		</div>
    </div>
</section>		