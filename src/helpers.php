<?php

if (!function_exists('get_menu_items_by_registered_slug')) {
    function get_menu_items_by_registered_slug($menu_slug)
    {
        $menu_items = [];

        if (($locations = get_nav_menu_locations()) && isset($locations[$menu_slug])) {
            $menu = get_term($locations[$menu_slug]);

            $menu_items = wp_get_nav_menu_items($menu->term_id);
        }

        return $menu_items;
    }
}
