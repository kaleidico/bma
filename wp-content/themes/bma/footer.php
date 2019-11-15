

<div class="container-full footer-container">
    <div class="container">
        <div class="row text-center">
            <!--div class="col-xs-12 offset-md-2">
                <?php //dynamic_sidebar( 'footer-col-1' ); ?>
            </div-->
            <div class="col-xs-12 col-md-6">
                <?php dynamic_sidebar( 'footer-col-2' ); ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="widget_text footer-col footer-col-3">
                    <h2 class="widgettitle">Follow</h2>
                    <div class="textwidget custom-html-widget">
                        <?php
                        if (get_field('facebook_link', 'options')) { ?>
                            <a href="<?php the_field('facebook_link', 'options'); ?>">
                                <i class="fab fa-facebook-square footer-social-icon icon-facebook" aria-hidden="true"></i>
                            </a>
                        <?php }

                        if (get_field('linkedin_link', 'options')) { ?>
                            <a href="<?php the_field('linkedin_link', 'options'); ?>">
                                <i class="fab fa-linkedin footer-social-icon icon-linkedin" aria-hidden="true"></i>
                            </a>
                        <?php }



                        if (get_field('twitter_link', 'options')) { ?>
                            <a href="<?php the_field('twitter_link', 'options'); ?>">
                                <i class="fab fa-twitter-square footer-social-icon icon-twitter" aria-hidden="true"></i>
                            </a>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="website-logo">
                    <?php
                    $website_logo = get_field('website_logo', 'options'); ?>
                    <a href="/"><img src="<?php echo $website_logo['url']; ?>"
                                     alt="<?php echo $website_logo['alt']; ?>"
                                     class="website-logo"/>
                    </a>
                </div>
                <p class="copyright">
                    Copyright &copy; <span class="copy">BMA INC<?php date('Y'); ?></span>
                </p>
            </div>
        </div>
    </div>
</div>



        </div><!-- #content -->
    </div><!-- #page -->
    <?php wp_footer(); ?>

<script>
	jQuery(".home-module-category-img").matchHeight();
	jQuery(".home-module-category-name").matchHeight();
    jQuery(".module-2-column-cta-img").matchHeight();
</script>

</body>
</html>
