<?php

use BoxyBird\Inertia\Inertia;

// Build movies
$movies = array_map(function ($movie) {
    return [
        'id'     => $movie->ID,
        'link'   => get_the_permalink($movie->ID),
        'poster' => get_the_post_thumbnail_url($movie->ID),
        'title'  => html_entity_decode(get_the_title($movie->ID)),
    ];
}, $wp_query->posts);

// Build pagination
$current_page = isset($wp_query->query['paged']) ? (int) $wp_query->query['paged'] : 1;
$prev_page    = $current_page > 1 ? $current_page - 1 : false;
$next_page    = $current_page + 1;

$pagination = [
    'prev_page'    => $prev_page,
    'next_page'    => $next_page,
    'current_page' => $current_page,
    'total_pages'  => $wp_query->max_num_pages,
    'total_movies' => (int) $wp_query->found_posts,
];

return Inertia::render('Movies/Index', [
    'movies'     => $movies,
    'pagination' => $pagination
]);
