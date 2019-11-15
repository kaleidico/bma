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
 <div class="container">
    <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-md-3">
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-md-9">
                <p><strong><?php the_title(); ?></strong></p>
                <p><a href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a></p>
                <p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                <p><?php the_content(); ?></p>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>