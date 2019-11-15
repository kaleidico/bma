<section class="module-3-column-cta <?php the_sub_field('space_after'); ?>">
    <div class="container">
		<div class="row">
			<?php if( have_rows('cta_3_column_repeater') ): ?>		

			<?php while( have_rows('cta_3_column_repeater') ): the_row();
				// vars
				$title = get_sub_field('title_3_column');
				$image = get_sub_field('image_3_column');				
				$link = get_sub_field('button_link_3_column');
				?>
				<div class="col-md-4">	
					<div class="featured-img module-2-column-cta-img">
					<?php if( $link ): ?>
						<a href="<?php echo $link['url']; ?>">
							<?php endif; ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="img-fluid" />
							<?php if( $link ): ?>
						</a>
					<?php endif; ?>	
					</div>
					<h2 class="column_title"><?php echo $title; ?></h2>
					
					<?php if($link){ ?>
						<a href="<?php echo $link['url']; ?>" class="learn_more">Learn More</a>
					<?php } ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>			
		</div>
    </div>
</section>		