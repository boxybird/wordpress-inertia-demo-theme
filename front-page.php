<?php

use BoxyBird\Inertia\Inertia;

return Inertia::render('FrontPage', [
    'page' => $wp_query->post,
]);
