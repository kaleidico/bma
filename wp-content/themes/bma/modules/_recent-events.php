<section class="module-recent-events <?php the_sub_field('space_after'); ?>">
    <div class="container">
        <h2 class="event-header-title text-center">BMA Events</h2>
        <div class="row">

             <?php 

// get only first 3 results
        $ids = get_field('most_3_recent_events', false, false);
            ?>            
    <?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array( 'post__in' => $ids,'posts_per_page' => 3,'paged' => $paged,'post_type' => 'bma_events','order' => 'DESC','orderby' => 'date' );
    $postslist = new WP_Query( $args );
    ?>
        <?php if ( $postslist->have_posts() ) : ?>
           <?php while ( $postslist->have_posts() ) : $postslist->the_post(); ?>
                <div class="col-md-4">
                    <div class="event-archive-list">
                        <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('medium', array( 'class' => 'img-fluid' )); ?>
                    </a>
                <?php endif; ?>
                        <p class="event-title"><strong><?php  the_title(); ?></strong></p>
                        <?php 
                $starRawtDate = get_field('event_start_date',false,false);
                $starRawtDate = new DateTime($starRawtDate);
                $startDate = $starRawtDate->format('F j, Y');
            ?>           
                <p><?php echo $startDate; ?><?php if(get_field('event_end_date')){
                    $endRawDate = get_field('event_end_date',false,false);
                    $endRawDate = new DateTime($endRawDate);
                    $endDate = $endRawDate->format('F j, Y');

                    if($startDate !=$endDate){
                        echo " - ".$endDate;
                        }  
                    }
                    ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-event">See Details/Register</a>
                    </div>
                </div>
            <?php
            // End the loop.
            endwhile;
            
            ?>
            <?php else :
            get_template_part( 'template-parts/content', 'none' );

        endif; 
            wp_reset_query();
        ?>
           
        </div>
    </div>
</section>