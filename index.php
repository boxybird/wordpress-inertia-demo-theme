<?php

use BoxyBird\Inertia\Inertia;

// Fallback if no php file found
// matching WordPress template hierarchy
return Inertia::render('Default', [
    'page' => $wp_query->post,
]);
