<section class="module-content-with-video <?php the_sub_field('space_after'); ?>">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 left-content">
                <h3><?php the_sub_field('left_heading'); ?></h3>
                <img src="<?php echo get_stylesheet_directory_uri();?>/img/h3-line.png">
                <?php the_sub_field('left_content'); ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php if(is_front_page()) { ?>
                    <div class="home-video">
                <?php }?>
                <div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php the_sub_field('youtube_id'); ?>?rel=0"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
                <?php if(is_front_page()) { ?>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>