<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post(); ?>
    
    <div class="container" style="margin-top: 1em;">
	    <div class="row">
		    <div class="col-xs-12 col-md-8 offset-md-2">
				<h1><?php the_title(); ?></h1>
				
				<article>
					<?php the_content(); ?>
				</article>
    		</div>
    	</div>
    </div>
    
    <?php
        if (have_rows('flexible_content_modules')) {
            while (have_rows('flexible_content_modules')) : the_row();
                require('modules/modules.php');
            endwhile;
        }
        // End the loop.
    endwhile;
    ?>
<?php get_footer(); ?>