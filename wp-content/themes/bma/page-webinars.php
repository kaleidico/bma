<?php /* Template Name: Webinars */
get_header(); ?>

<div class="container pt-5 pb-5">
	<div class="row">
		<div class="col-12 col-md-6">
			<h1><?php the_title(); ?></h1>
			
			<?php the_content(); ?>
		</div>
		<div class="col-12 col-md-6">
			<div class="webinar-form-container">
				<?php echo do_shortcode('[gravityform id=4 ajax=true description=false title=false]'); ?>
			</div>
		</div>
	</div>	
</div>

<?php get_footer();
?>