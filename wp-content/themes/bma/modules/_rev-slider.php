<section class="module-rev-slider <?php the_sub_field('space_after'); ?>">
    <?php
        $slider_alias = get_sub_field('slider_alias');
        echo do_shortcode( '[rev_slider alias="'.$slider_alias.'"]' );
    ?>
</section>