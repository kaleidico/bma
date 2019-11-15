<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 offset-md-2 mbm text-center">
			<h1>Search Results for: <?php echo esc_html( get_search_query( false ) ); ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-8 offset-md-2">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row mbm">
					<div class="col-xs-12">
						<span class="search-post-title"><h2><?php the_title(); ?></h2></span>
						<span class="search-post-excerpt"><?php the_excerpt(); ?></span>
						<span class="search-post-link"><a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a></span>
					</div>
				</div>
            <?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>