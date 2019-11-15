<?php

	$youtubeId = get_sub_field('youtube_id');
	
?>

<section class="module-landing-full-width-video <?php the_sub_field('space_after'); ?>">
    <div class="container"  >
		<div class="row" >
			<div class="col-sm-12 landing-full-width-video" >
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $youtubeId; ?>?rel=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
    </div>
</section>		