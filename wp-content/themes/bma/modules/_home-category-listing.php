<?php

	$homeCategories = get_sub_field('categories');
	
?>

<section class="module-home-category-listing <?php the_sub_field('space_after'); ?>">
    <div class="container home-category-container"  >
		<div class="row" >
			<div class="col-sm-12 category_heading" >
				<h2><?php echo get_sub_field('blog_categories_heading'); ?></h2>
				<div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blog_category_bottom_img.jpg" class="img-fluid" /></div>
			</div>
			<div class="col-sm-12" >
				<div class="row" >
				<?php
					if ( count($homeCategories) >0 ) 
					{
						foreach($homeCategories as $category) {
							
							$categoryImage = get_field('category_image', $category);
							$categoryUrl = get_category_link($category->term_id);
				?>	
					<div class="col-xs-12 col-sm-4" >
						<div class="category_img home-module-category-img" >
							<a href="<?php echo $categoryUrl; ?>"  ><img src="<?php echo $categoryImage["url"]; ?>" class="img-fluid" /></a>
						</div>
						<h2 class="category_name home-module-category-name">
							<?php echo $category->name; ?>
						</h2>
						<div class="home-module-learn-more-container">
							<a href="<?php echo $categoryUrl; ?>"  class="learn_more" >Learn More</a>
						</div>
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