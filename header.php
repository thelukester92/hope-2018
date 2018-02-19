<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php wp_head(); ?>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo("stylesheet_url"); ?>" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato" />
        <meta name="viewport" content="width=device-width" />
    </head>
    <body <?php body_class(); ?>>
        <aside class="utility-links">
            <?php wp_nav_menu(array(
                "container"      => "nav",
                "theme_location" => "hope-2018-utility-menu",
                "fallback_cb"    => false
            )); ?>
        </aside>
        <header class="main-header">
            <div class="main-header-inner">
                <?php the_custom_logo(); ?>
                <div class="main-menu">
                    <?php wp_nav_menu(array(
                        "container"      => "nav",
                        "theme_location" => "hope-2018-main-menu"
                    )); ?>
                </div>
            </div>
        </header>
