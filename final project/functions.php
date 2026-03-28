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

// Insert demo products once.
function mdps_insert_demo_products_once()
{
    $seed_version = 2;
    if ((int) get_option('mdps_demo_products_seed_version', 0) >= $seed_version) {
        return;
    }

    if (!function_exists('post_exists')) {
        require_once ABSPATH . 'wp-admin/includes/post.php';
    }

    $demo_products = [
        [
            'post_title' => 'Ebook: Mastering WordPress',
            'post_content' => 'A comprehensive guide to mastering WordPress for beginners and pros.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Ebooks',
        ],
        [
            'post_title' => 'UI Kit: Modern Web Elements',
            'post_content' => 'A collection of modern UI elements for your next web project.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Design Assets',
        ],
        [
            'post_title' => 'Template: Portfolio Website',
            'post_content' => 'A clean and minimal portfolio website template for creatives.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Templates',
        ],
        [
            'post_title' => 'Template: Agency Landing Page',
            'post_content' => 'A conversion-focused landing page template for agencies and service businesses.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Templates',
        ],
        [
            'post_title' => 'Template: SaaS Starter Homepage',
            'post_content' => 'A modern SaaS homepage template with pricing, feature, and CTA sections.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Templates',
        ],
        [
            'post_title' => 'Icon Pack: Business Essentials',
            'post_content' => 'A curated icon set for dashboards, landing pages, and business websites.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Design Assets',
        ],
        [
            'post_title' => 'Social Media Banner Bundle',
            'post_content' => 'Ready-to-edit social media banner templates for marketing campaigns.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Design Assets',
        ],
        [
            'post_title' => 'Ebook: UX Writing for Beginners',
            'post_content' => 'Learn how to write clear, user-friendly interface copy for websites and apps.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Ebooks',
        ],
        [
            'post_title' => 'Checklist: Website Launch Kit',
            'post_content' => 'A practical checklist to plan, test, and launch your website with confidence.',
            'post_type' => 'product',
            'post_status' => 'publish',
            'category' => 'Guides',
        ],
    ];

    foreach ($demo_products as $product) {
        $category = $product['category'];
        unset($product['category']);

        // Check if product already exists
        $existing_product_id = post_exists($product['post_title']);
        if (!$existing_product_id) {
            $inserted_id = wp_insert_post($product);
            if (!is_wp_error($inserted_id)) {
                wp_set_object_terms($inserted_id, $category, 'product_category', false);
            }
            continue;
        }

        wp_set_object_terms((int) $existing_product_id, $category, 'product_category', false);
    }

    update_option('mdps_demo_products_inserted', 1);
    update_option('mdps_demo_products_seed_version', $seed_version);
}

add_action('after_switch_theme', 'mdps_insert_demo_products_once');

// Fallback for already-active themes where activation hook has already passed.
add_action('init', 'mdps_insert_demo_products_once', 20);

function mdps_get_page_template_map()
{
    return array(
        'page-about.php' => array('about', 'about-us'),
        'page-services.php' => array('services', 'service'),
        'page-contact.php' => array('contact', 'contact-us'),
        'page-blog.php' => array('blog', 'news', 'journal'),
    );
}

add_filter('template_include', function ($template) {
    if (!is_page()) {
        return $template;
    }

    $queried_page = get_queried_object();
    if (!$queried_page instanceof WP_Post) {
        return $template;
    }

    $page_slug = sanitize_title($queried_page->post_name);
    $page_title_slug = sanitize_title(get_the_title($queried_page));

    foreach (mdps_get_page_template_map() as $template_name => $page_slugs) {
        if (!in_array($page_slug, $page_slugs, true) && !in_array($page_title_slug, $page_slugs, true)) {
            continue;
        }

        $matched_template = locate_template($template_name);
        if ($matched_template) {
            return $matched_template;
        }
    }

    return $template;
});