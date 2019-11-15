<?php
get_header(); ?>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();

    if (have_rows('flexible_content_modules')) {
        while (have_rows('flexible_content_modules')) : the_row();
            require('modules/modules.php');
        endwhile;
    }

endwhile; endif;

get_footer();
?>