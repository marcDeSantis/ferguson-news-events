<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- site-header -->
    <header class="site-header">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php

                        if (get_theme_mod('our_icon') != $null) { ?>
                            <img alt="Brand" src="<?php echo get_theme_mod('our_icon') ?>" class="hidden-xs hidden-sm">
                        <?php
                        } bloginfo('name'); ?></a>
                </div>

                <div id="primary-menu" class="navbar-collapse collapse">
                    <?php

                    $nav_args = array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'nav navbar-nav',
                        'depth'             => 2,
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker()
                    );

                    wp_nav_menu($nav_args);

                    ?>

                    <ul class="nav navbar-nav navbar-right social-icon-links">
                        <li><a href="https://twitter.com/OneFerguson" title="Visit us on Twitter"><i class="fa fa-twitter-square fa-lg"></i></a></li>
                        <li><a href="https://facebook.com/OneFerguson" title="Visit us on Facebook"><i class="fa fa-facebook-square fa-lg"></i></a></li>
                        <li><a href="<?php echo home_url(); ?>/email-list/" title="Join our Email List" data-toggle="tooltip"><i class="fa fa-envelope fa-lg"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav social-text-links">
                        <li><a href="https://twitter.com/OneFerguson"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                        <li><a href="https://facebook.com/OneFerguson"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                        <li><a href="<?php echo home_url(); ?>/email-list/"><i class="fa fa-envelope"></i> Email List</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>

            <div id="search-container">
                <label><?php bloginfo('description'); ?></label>
                <div id="search-form">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </nav>

    </header><!-- /site-header -->



    <div class="container">