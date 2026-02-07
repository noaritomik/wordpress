<!DOCTYPE html>
<html <?php language_attributes(); ?>>
        <head>
            <meta name = "viewport" content="width=device-width, inital-scale=1">
            <meta charset="<?php bloginfo('charset'); ?>">
            <?php wp_head();?>
        </head>

        <header class ='site-header'>
        <body id = "top"<?php body_class() ?>>
            <a class = "site-title" href="<?php echo esc_url(home_url('/'));?>">
                <?php bloginfo('name') ?>
            </a>
            
            <?php if(get_bloginfo('description')):?>
                <p class = "site-tagline"><?php bloginfo('description');?></p>
            <?php endif; ?>

            <nav class = 'site-nav'>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary'
                    'menu-class'=>'main-menu'
                ));
                ?>
            </nav>
        </header>

