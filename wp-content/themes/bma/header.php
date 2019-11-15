<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WP5P5WS');</script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WP5P5WS"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site">
    <div id="content" class="site-content">
<!-- Top Nav bar -->
    <div class="container-full full-nav">
        <div class="top-nav-container">
            <div class="container">
                <div class="row">
                <div class="col-xs-12 col-md-6">
                    <?php
                        if (get_field('facebook_link', 'options')) { ?>
                            <a href="<?php the_field('facebook_link', 'options'); ?>">
                                <i class="fab fa-facebook-f header-social-icon" aria-hidden="true"></i>
                            </a>
                        <?php }

                        if (get_field('linkedin_link', 'options')) { ?>
                            <a href="<?php the_field('linkedin_link', 'options'); ?>">
                                <i class="fab fa-linkedin-in header-social-icon" aria-hidden="true"></i>
                            </a>
                        <?php }



                        if (get_field('twitter_link', 'options')) { ?>
                            <a href="<?php the_field('twitter_link', 'options'); ?>">
                                <i class="fab fa-twitter header-social-icon" aria-hidden="true"></i>
                            </a>
                        <?php }
                    ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <a href="mailto:<?php the_field('email_address', 'options'); ?>">
                        <i class="fas fa-envelope-open header-mail-icon"></i>
                        <?php the_field('email_address', 'options'); ?>
                    </a>
                    <a href="tel:<?php the_field('phone_number', 'options'); ?>"
                       class="header-phone-cta">
                        <i class="fas fa-phone-square header-phone-icon"></i>
                        <?php the_field('phone_number', 'options'); ?>
                    </a>
                </div>
            </div>
            </div>
        </div>
        <div class="bottom-nav-container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-2">
                        <?php
                            $website_logo = get_field('website_logo', 'options'); ?>
                        <a href="/">
                            <img src="<?php echo $website_logo['url']; ?>"
                             alt="<?php echo $website_logo['alt']; ?>"
                             class="website-logo"/>
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-10">
                        <nav>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            ) );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /Top Nav Bar -->