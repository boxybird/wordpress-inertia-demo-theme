<?php

use BoxyBird\Inertia\Inertia;

// WP calls 404.php when
// no other route is found
return Inertia::render('404', [
    'message' => '404 - Not Found'
]);
