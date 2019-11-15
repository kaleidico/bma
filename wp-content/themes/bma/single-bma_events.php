<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>   
<div style="height: 30px;"></div>
<div class="single-event">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <p class="event-title text-center"><strong><?php the_title(); ?></strong></p>
                    <div class="row">

                <div class="col-md-5">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('medium', array( 'class' => 'img-fluid' )); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-md-7">
                <?php
                    $starRawtDate = get_field('event_start_date',false,false);
                    $starRawtDate = new DateTime($starRawtDate);
                    $startDate = $starRawtDate->format('F j, Y');
                ?>
                    <p>When : <?php echo $startDate; ?><?php if(get_field('event_end_date')){
                        $endRawDate = get_field('event_end_date',false,false);
                        $endRawDate = new DateTime($endRawDate);
                        $endDate = $endRawDate->format('F j, Y');

                        if($startDate !=$endDate){
                            echo " - ".$endDate;}
                        }

                        ?></p>
                    <p>Time : <?php the_field('event_star_time'); ?> to <?php the_field('event_end_time'); ?></a></p>
                    <p style="margin: 0;">Where : <?php the_field('event_location'); ?></p>
                    <div class="social-icons"><span>Share This</span> <?php echo do_shortcode('[easy-social-share buttons="facebook,twitter,linkedin" counters=0 style="icon" template="33" point_type="simple"]'); ?></div>
                </div>
                </div>
                </div>
        </div>
            <?php
            if (have_rows('flexible_content_modules')) {
                        while (have_rows('flexible_content_modules')) : the_row();
                            require('modules/modules.php');
                        endwhile;
                    } ?>
        <?php endwhile; endif; ?>
    </div>






</div>
<?php get_footer(); ?>