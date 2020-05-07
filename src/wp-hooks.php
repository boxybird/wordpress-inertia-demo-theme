<?php

use BoxyBird\Inertia\Inertia;

// WP enqueue
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
    wp_enqueue_style('bb_inertia', get_stylesheet_directory_uri() . '/dist/css/app.css');
    wp_enqueue_script('bb_inertia', get_stylesheet_directory_uri() . '/dist/js/app.js', ['jquery'], ['latest'], true);

    wp_localize_script('bb_inertia', 'bbInertia', [
        'nonce'         => wp_create_nonce('wp_rest'),
        'bb_ajax_nonce' => wp_create_nonce('bb_ajax_nonce'),
    ]);
});

// Set custom Inertia root view
// by default it's 'app.php'
add_action('init', function () {
    Inertia::setRootView('layout.php');
});

// Share globally with Inertia views
add_action('init', function () {
    Inertia::share([
        'site' => [
            'name'       => get_bloginfo('name'),
            'description'=> get_bloginfo('description'),
        ]
    ]);

    Inertia::share([
        'primary_menu' => array_map(function ($menu_item) {
            return [
                'id'   => $menu_item->ID,
                'link' => $menu_item->url,
                'name' => $menu_item->title,
            ];
        }, get_menu_items_by_registered_slug('primary-menu'))
    ]);
});

// Add Inertia verison
// Helps with cache busting
add_action('init', function () {
    $manifest = get_stylesheet_directory() . '/mix-manifest.json';

    Inertia::version(md5_file($manifest));
});

// General WP theme options
add_action('init', function () {
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary-menu' => 'Primary Menu',
    ]);
});
