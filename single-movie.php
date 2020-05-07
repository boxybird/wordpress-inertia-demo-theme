<?php

use BoxyBird\Inertia\Inertia;

// Build $movies array
$movies = array_map(function ($movie) {
    return [
        'id'      => $movie->ID,
        'poster'  => get_the_post_thumbnail_url($movie->ID),
        'content' => get_the_content(null, false, $movie->ID),
        'title'   => html_entity_decode(get_the_title($movie->ID)),
        'meta'    => array_map(function ($meta) {
            return $meta[0];
        }, get_post_meta($movie->ID)),
    ];
}, $wp_query->posts);

return Inertia::render('Movies/Show', [
    'movie' => $movies[0]
]);
