<section class="module-lean-services <?php the_sub_field('space_after'); ?>">
    <div class="container">
        <div class="row">
            <?php if(get_sub_field('column_block')): ?>
                <?php while(has_sub_field('column_block')): ?>                    
                <div class="col-xs-12 col-md-4 single-service-block">
                <?php $icon = get_sub_field('icon'); 
                    if($icon != ""){
                    ?>                    
                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                <?php } ?>
                    <h3><?php the_sub_field('heading'); ?></h3>
                    <?php the_sub_field('content'); ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
        </div>
    </div>
</section>