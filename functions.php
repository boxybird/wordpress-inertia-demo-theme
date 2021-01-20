<?php

// General function helpers
require get_stylesheet_directory() . '/src/helpers.php';

// WP actions and filters setup
require get_stylesheet_directory() . '/src/wp-hooks.php';

// Register 'movie' custom post type
require get_stylesheet_directory() . '/src/movie-cpt.php';

// Custom REST API endpoints
require get_stylesheet_directory() . '/src/rest-endpoints.php';
