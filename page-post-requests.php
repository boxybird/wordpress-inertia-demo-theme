<?php

use BoxyBird\Inertia\Inertia;

// Traditional POST data
$message = isset($_POST['message'])
    ? sanitize_text_field($_POST['message']) . ' (heard via $_POST)'
    : '';

// Pass message to Inertia
Inertia::share([
    'toast_message' => $message,
]);

// Prepare title and content
$title = get_the_title(get_the_ID());

// Apply all registered 
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);

return Inertia::render('PagePostRequest', [
    'title'   => $title,
    'content' => $content,
]);
