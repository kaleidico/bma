<?php

	$buttonLabel = get_sub_field('button_label');
	$buttonLink = get_sub_field('button_link');
	
?>

<section class="module-landing-button-cta <?php the_sub_field('space_after'); ?>">
    <div class="container"  >
		<div class="row" >
			<div class="col-sm-12 landing-button-cta" >
				<div><a href="<?php echo $buttonLink; ?>"  class="learn_more" ><?php echo $buttonLabel; ?></a></div>
			</div>
		</div>
    </div>
</section>		