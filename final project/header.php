<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <div class="container">

        <div class="site-branding">
            <a href="<?php echo home_url(); ?>">
                <h2><?php bloginfo('name'); ?></h2>
            </a>
            <p><?php bloginfo('description'); ?></p>
        </div>

        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
            ));
            ?>
        </nav>

    </div>
</header>