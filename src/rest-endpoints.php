<?php

add_action('rest_api_init', function () {
    register_rest_route('inertia-theme/v1', '/toast', [
        'methods'  => 'POST',
        'callback' => function ($request) {
            $toast_message = sanitize_text_field(
                $request->get_param('toastMessage')
            );

            return [
              'toast_message' => "{$toast_message} (heard via REST API)"
            ];
        }
    ]);
});
