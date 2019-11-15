<section class="module-manufacturing-consulting <?php the_sub_field('space_after'); ?>">
    <div class="container"  >
		<div class="row" >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 manufacturing_section" >				
					<h2><?php echo get_sub_field('heading'); ?></h2><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/h3-line.png" class="img-fluid" />
					<div class="consult_desc" ><?php echo get_sub_field('consulting_services_description'); ?></div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" >
				<div id="consult_form" class="consult_form" >
					<?php if(get_sub_field('form_title')){?>
						<h3><?php the_sub_field('form_title'); ?></h3>
					<?php } ?>
					<?php echo do_shortcode('[gravityform id="2" title="false" ajax="true" tabindex="10"]'); ?>
				</div>
			</div>
		</div>
    </div>
</section>