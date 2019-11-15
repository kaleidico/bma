<?php 
	
	$args = array( 'numberposts' => 5, 'order'=> 'DESC', 'orderby' => 'post_date' );
	$postslist = get_posts( $args );
	
	$firstPost = array_shift($postslist);	
	
	$firstBlogImage = wp_get_attachment_url( get_post_thumbnail_id($firstPost->ID) );
	$firstBlogUrl = get_permalink($firstPost->ID);
	$firstBlogTitle = $firstPost->post_title;

?>
			
<section class="module-latest_blog_posts <?php the_sub_field('space_after'); ?>">
    <div class="container">
		<div class="row" >
		
			<div class="col-sm-6" >
				<div class="row" >	
					<div class="col-xs-12 col-sm-12 first_post" >
						<div><a href="<?php echo $firstBlogUrl; ?>"><img src="<?php  echo $firstBlogImage; ?>" class="img-fluid" /></a></div>
						<div class="first_post_title" ><?php  echo $firstBlogTitle; ?></div>
						<div><a href="<?php echo $firstBlogUrl; ?>"  class="learn_more" >Learn More</a></div>
					</div>				
				</div>	
			</div>		
			
			<div class="col-sm-6" >
				<div class="row" >
					<?php
						foreach ($postslist as $post) :  setup_postdata($post); 
						{
							$blogImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							$blogUrl = get_permalink($post->ID);
							$youtubeID = the_flexible_field('youtube_id', $post->ID);
									
					?>		
						<div class="col-xs-12 col-sm-6 latest_blog_item" > 
								<?php if($blogImage) { ?>
								<div><a href="<?php echo $blogUrl; ?>"  ><img src="<?php  echo $blogImage; ?>" class="img-fluid" /></a></div>
								<?php } ?>
						
							<div class="other_post_title" ><a href="<?php echo $blogUrl; ?>"><?php  echo $post->post_title; ?></a></div>
						</div>
						
						<?php
							
						}
						
						wp_reset_postdata();
						
						endforeach; 		
				
					?>
				</div>
			</div>				
		
		</div>
    </div>
</section>