<?php

	$categoryDisplay = get_sub_field('lean_categories');
	$sectionTitle =  get_sub_field('section_title');	
?>

<section class="module-category-tag-posts-listing <?php the_sub_field('space_after'); ?>" >
    <div class="container category-tag-posts-container"  >
		<div class="row" >
		
			<div class="col-sm-12 category_lists" >

				<!--Checkbox butons-->
				<div class="dlk-radio btn-group">
				
				<?php
					
					if ( count($categoryDisplay) >0 ) {
						
						$catCount = 1;
						foreach($categoryDisplay as $category) {
							
							$checkedItem = ($catCount==1)?"checked":"";
				?>
							<label class="btn btn-category">
								<input name="leancategories" class="form-control leancategories" type="checkbox" value="<?php echo $category->term_id; ?>" >
								<i class="fa fa-check glyphicon glyphicon-ok"></i>
								<?php echo $category->name; ?>
						   </label>							
				<?php	
				
							$catCount++;
						}
					
					}										
				?>

				</div>				
				<!--Checkbox butons-->		

				 <div class="toggle-cat-all-chk form-check">					 	
					<input type="checkbox" class="form-check-input" id="toggleCategoryAllChk">
					<label class="form-check-label" for="toggleCategoryAllChk">Toggle All</label>			    
				 </div>				
					
			</div>		
			<div class="col-sm-12 section_heading" >
				<h2><?php echo $sectionTitle; ?></h2>
				
				<!--Checkbox butons-->
				<div>
					<div id="category_tags" class="dlk-radio btn-group"  >				

					</div>
					 <div class="toggle-tag-all-chk form-check">					 	
					    <input type="checkbox" class="form-check-input" id="toggleAllChk">
					    <label class="form-check-label" for="toggleAllChk">Toggle All</label>			    
				  	 </div>
				</div>
				<!--Checkbox butons-->					
				
			</div>
			<div class="col-sm-12" >
				<div class="row" id="category_posts" >
					<p>Sorry, there are no posts for this combination of category and tags</p>
				</div>
			</div>
		</div>
    </div>
</section>		

<script type="text/javascript" >
function filterPosts(){
	
	categoryIdStr = "";
	jQuery('.leancategories:checked').each(function(){	
		categoryIdStr  += jQuery(this).val()+",";
	});
	
	categoryIdStr = categoryIdStr.slice(0, -1);
	
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
		
		if(obj.posts !="" && jQuery('.toggle-tag-all-chk .form-check-input').is(':checked')) {
			
			jQuery("#category_posts").html(obj.posts);			
		}
		else {
			jQuery("#category_posts").html('<p>Sorry, there are no posts for this combination of category and tags</p>');
		}		
		
		jQuery("#category_tags").html(obj.tags);		
		
		if ( obj.tag_ids!="" ) {
			
			tagArr = obj.tag_ids.split(',');
			
			if (jQuery('.toggle-tag-all-chk .form-check-input').is(':checked')) {
				
				for(i=0; i < tagArr.length; i++) {
			
					jQuery('input.leancategorytags[value="'+ tagArr[i] +'"]').prop('checked', true);
					jQuery('input.leancategorytags[value="'+ tagArr[i] +'"]').parent().css({"background-color": "#FFFFFF","color":"#4166AA"});					
				}				
			}
		}
		
	});
}

	jQuery(document).ready(function() {

		//jQuery('.dlk-radio .btn-category:first-child .leancategories').prop("checked",true);	
		
		//jQuery('.toggle-tag-all-chk .form-check-input').prop("checked",false);
		//jQuery('.dlk-radio .btn-category:first-child').css({"background-color": "#72A95B","color":"#fff"});
		
		//filterPosts();
		jQuery('.leancategories').change(function() {
			
			if (jQuery(this).is(':checked')) {
				jQuery('.toggle-cat-all-chk .form-check-input').prop("checked",true);
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
				
				jQuery('.toggle-tag-all-chk .form-check-input').prop("checked",true);				
				jQuery(this).parent().css({"background-color": "#FFFFFF","color":"#4166AA"});
				
			}
			else
			{
				jQuery(this).parent().css({"background-color": "#ECECEC","color":"#000"});
			}
			filterPosts();
		
		});	
		
		jQuery('.toggle-tag-all-chk').on("change",".form-check-input", function() {
			
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
		
		jQuery('.toggle-cat-all-chk').on("change",".form-check-input", function() {
			
			if (jQuery(this).is(':checked')) {
					
				jQuery('.dlk-radio .btn-category .leancategories').each(function(){					
					jQuery(this).prop("checked",true);
					jQuery(this).parent().css({"background-color": "#72A95B","color":"#fff"});
				});
			}
			else
			{
				jQuery('.dlk-radio .btn-category .leancategories').each(function(){
					jQuery(this).prop("checked",false);
					jQuery(this).parent().css({"background-color": "#EFEFEF","color":"#000"});
				});				
			}
			filterPosts();
		
		});	
		
		jQuery('.toggle-cat-all-chk .form-check-input').prop("checked",true);
		jQuery('.toggle-cat-all-chk .form-check-input').change();
		
		jQuery('.toggle-tag-all-chk .form-check-input').prop("checked",true);
		jQuery('.toggle-tag-all-chk .form-check-input').change();
	
		
	});
	
</script>

