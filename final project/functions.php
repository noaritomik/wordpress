<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('mdps-style', get_stylesheet_uri());
});


add_action('after_setup_theme', function () {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'gallery',
        'caption'
    ));

    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));

    add_image_size('product_thumb', 500, 500, true);

    // Ensure page attributes are supported
    add_post_type_support('page', 'page-attributes');
});


add_action('init', function () {

    register_post_type('product', array(
        'labels' => array(
            'name' => 'Products',
            'singular_name' => 'Product',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'products'),
        'show_in_rest' => true,
    ));

    register_taxonomy('product_category', 'product', array(
        'label' => 'Product Categories',
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
});

?>

// Insert demo products on theme activation
add_action('after_switch_theme', function () {
    if (get_option('mdps_demo_products_inserted')) {
        return;
    }

    $demo_products = [
        [
            'post_title' => 'Ebook: Mastering WordPress',
            'post_content' => 'A comprehensive guide to mastering WordPress for beginners and pros.',
            'post_type' => 'product',
            'post_status' => 'publish',
        ],
        [
            'post_title' => 'UI Kit: Modern Web Elements',
            'post_content' => 'A collection of modern UI elements for your next web project.',
            'post_type' => 'product',
            'post_status' => 'publish',
        ],
        [
            'post_title' => 'Template: Portfolio Website',
            'post_content' => 'A clean and minimal portfolio website template for creatives.',
            'post_type' => 'product',
            'post_status' => 'publish',
        ],
    ];

    foreach ($demo_products as $product) {
        // Check if product already exists
        if (!post_exists($product['post_title'])) {
            wp_insert_post($product);
        }
    }

    update_option('mdps_demo_products_inserted', 1);
});