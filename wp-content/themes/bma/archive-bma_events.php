<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kaleidico_Master
 */

get_header();
?>
<div class="event-archive">
<div class="container">
<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array( 'posts_per_page' => 6,'paged' => $paged,'post_type' => 'bma_events','order' => 'DESC','orderby' => 'date' );
    //$postslist = new WP_Query( $args );
query_posts($args);
    ?>
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                    //the_archive_title( '<h1 class="page-title">', '</h1>' );
                    //the_archive_description( '<div class="taxonomy-description">', '</div>' );
                the_archive_description( '<h2 class="event-header-title">', '</h2>' );
                ?>
            </header><!-- .page-header -->
            <div class="row">
            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post(); ?>
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
             // Previous/next page navigation.
            // the_posts_pagination( array(
            //     'prev_text'          => __( 'Previous page', 'Kaleidico_Master' ),
            //     'next_text'          => __( 'Next page', 'Kaleidico_Master' ),
            //     'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'Kaleidico_Master' ) . ' </span>',
            // ) );
        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
            <div class="clearfix w-100"></div>
        <?php 
            pagination();
            wp_reset_postdata(); 
            wp_reset_query();
        ?>
            </div>

        </main><!-- .site-main -->
    </div><!-- .content-area -->
</div>
</div>
<?php get_footer(); ?>