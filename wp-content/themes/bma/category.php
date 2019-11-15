<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CanineToFive
 */

get_header();


?>

	<!-- Section: boxes -->
	<section class="blog-category-listing">
		
		<div class="container"  >
			<div class="row" >
				<div class="col-sm-12 category_title" >
					<h2>
						<?php
							echo single_cat_title("", false);
							$cat_id = get_queried_object_id();
						?>	
						<input type="hidden" id="categoryID" value="<?php echo $cat_id; ?>">
					</h2>
				</div>
				<div id="category_tags" class="dlk-radio btn-group">				

				</div>
				<div class="toggle-all-chk form-check">					 	
				    <input type="checkbox" class="form-check-input" id="toggleAllChk">
				    <label class="form-check-label" for="toggleAllChk">Toggle All</label>			    
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-12" >
				<div class="row" id="category_posts" >
					
				</div>				
			</div>
			<?php

			// 	if ( have_posts() ) : 
			// 		while ( have_posts() ) :
			// 			the_post();						
			// 			$blogImage = wp_get_attachment_url( get_post_thumbnail_id() );
			// 			$blogUrl = get_permalink();						
			 ?>					
			 	<!--div class="col-sm-4 blog_item" >
			 		<div class="blog_img" ><a href="<?php //echo $blogUrl; ?>"  ><img src="<?php //echo $blogImage; ?>" class="img-fluid" /></a></div>
			 		<h2 class="blog_title" ><?php //echo get_the_title(); ?></h2>
			 		<div><a href="<?php //echo $blogUrl; ?>"  class="learn_more" >Learn More</a></div>
			 	</div-->				
			 <?php		
			
			// 		endwhile;
			// 		wp_reset_postdata();
			// 	endif;
			?>
			</div>		
		</div>

	</section>
	<!-- /Section: boxes -->
	<script type="text/javascript" >
function filterPosts(){
	categoryIdStr = jQuery("#categoryID").val();
	// jQuery('.leancategories:checked').each(function(){	
	// 	categoryIdStr  += jQuery(this).val()+",";
	// });
	
	// categoryIdStr = categoryIdStr.slice(0, -1);
	
	unCheckedTagIdStr = "";
	jQuery('.leancategorytags:not(:checked)').each(function(){					
		unCheckedTagIdStr  += jQuery(this).val()+",";
	});

	unCheckedTagIdStr = unCheckedTagIdStr.slice(0, -1);				
				
	var data = {
		action: 'get_category_posts_tags',
		category_ids:  categoryIdStr,
		exclude_tag_ids: unCheckedTagIdStr
	};
	
	var ajaxurl = "<?php echo site_url(); ?>" + '/wp-admin/admin-ajax.php';
	
	jQuery.post(ajaxurl, data, function(response) {
		var obj = jQuery.parseJSON( response );
		jQuery("#category_posts").html(obj.posts);
		jQuery("#category_tags").html(obj.tags);		

		
		tagArr = obj.tag_ids.split(',');
		for(i=0; i < tagArr.length; i++) {
			
			jQuery('input.leancategorytags[value="'+ tagArr[i] +'"]').prop('checked', true);
			jQuery('input.leancategorytags[value="'+ tagArr[i] +'"]').parent().css({"background-color": "#FFFFFF","color":"#4166AA"});					
		}
	});
}

	jQuery(document).ready(function() {

		jQuery('.dlk-radio .btn-category:first-child .leancategories').prop("checked",true);
		jQuery('.toggle-all-chk .form-check-input').prop("checked",true);
		jQuery('.dlk-radio .btn-category:first-child').css({"background-color": "#72A95B","color":"#fff"});
		filterPosts();
		jQuery('.leancategories').change(function() {
			
			if (jQuery(this).is(':checked')) {
				jQuery(this).parent().css({"background-color": "#72A95B","color":"#fff"});
			}
			else
			{
				jQuery(this).parent().css({"background-color": "#EFEFEF","color":"#000"});
			}
			
			filterPosts();
			
		});		

		jQuery('#category_tags').on("change",".leancategorytags", function() {
			if (jQuery(this).is(':checked')) {
				jQuery(this).parent().css({"background-color": "#FFFFFF","color":"#4166AA"});
			}
			else
			{
				jQuery(this).parent().css({"background-color": "#ECECEC","color":"#000"});
			}
			filterPosts();
		
		});	
		jQuery('.toggle-all-chk').on("change",".form-check-input", function() {
			if (jQuery(this).is(':checked')) {
				jQuery('#category_tags .leancategorytags').each(function(){					
					jQuery(this).prop("checked",true);
					jQuery(this).parent().css({"background-color": "#FFFFFF","color":"#4166AA"});
				});
			}
			else
			{
				jQuery('#category_tags .leancategorytags').each(function(){
					jQuery(this).prop("checked",false);
					jQuery(this).parent().css({"background-color": "#ECECEC","color":"#000"});
				});
			}
			filterPosts();
		
		});		
		
	});
	
</script>


<?php

get_footer();
?>
