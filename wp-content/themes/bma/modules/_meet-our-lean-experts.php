<?php

	$leanExperts = get_sub_field('lean_experts');
	
?>

<section class="module-meet-our-lean-experts <?php the_sub_field('space_after'); ?>">
    <div class="container lean-experts-container"  >
		<div class="row" >
			<div class="col-sm-12 lean-experts-heading" >
				<h2><?php echo get_sub_field('title'); ?></h2>				
			</div>
			<div class="col-sm-12" >
				<div class="row" >
				<?php
					if ( count($leanExperts) >0 ) 
					{
						foreach($leanExperts as $expert) {
							
							$expertPosition = get_field('position',$expert->ID);
							$expertEmail = get_field('email',$expert->ID);
							$expertPhoneNum = get_field('phone_number',$expert->ID);
							$expertBookLink = get_field('buy_books', $expert->ID);
							$expertPhoto = wp_get_attachment_url( get_post_thumbnail_id($expert->ID) );
							$expertPageUrl = get_permalink($expert->ID);
							
				?>	
					<div class="col-xs-12 col-sm-12 col-md-4 expert_item" >
						<div class="expert_img" ><a href="<?php echo $expertPageUrl; ?>"  ><img src="<?php echo $expertPhoto; ?>"  class="img-fluid" /></a></div>
						<a href="<?php echo $expertPageUrl; ?>" class="expert_name" ><?php echo $expert->post_title; ?></a>
						<div class="expert_position" ><?php echo $expertPosition ?></div>
						<?php if($expertPhoneNum !="") { ?>
							<a href="tel:<?php echo $expertPhoneNum; ?>" class="expert_btn expert_call" >Call</a>
						<?php } ?>
						<?php if($expertEmail !="") { ?>
							<a href="mailto:<?php echo $expertEmail; ?>" class="expert_btn expert_email" >Mail</a>
						<?php } ?>
						<a href="<?php echo $expertPageUrl; ?>" class="expert_btn expert_bio">Bio</a>
						<?php if($expertBookLink !="") { ?>
							<a href="<?php echo $expertBookLink; ?>" target="_blank" class="expert_btn expert_buy_books">Buy Books</a>
						<?php } ?>
					</div>
				<?php	
						}
					}
				?>
				</div>
			</div>
		</div>
    </div>
</section>		