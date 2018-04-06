<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Where to load modules from
    |--------------------------------------------------------------------------
    |
    | Here you may specify which folders to load modules from
    | Paths are relative to base path
    |
    */

    'module_paths' => [
        'modules',
    ],

    /*
    |--------------------------------------------------------------------------
    | Supported Languages
    |--------------------------------------------------------------------------
    |
    | An array of supported languages
    |
    */

    'languages' => [
        'en',
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    |
    | Configuration for pagination
    |
    */

    'pagination' => [
        'perpage' => 5,
    ],

    /*
    |--------------------------------------------------------------------------
    | Themes
    |--------------------------------------------------------------------------
    |
    | Configuration for themes
    | Paths are relative to the base path
    |
    */
    'themes' => [
        'theme_paths' => [
            'themes',
        ],
        'active_theme' => null,

    ],

    /*
    |--------------------------------------------------------------------------
    | Tweaks
    |--------------------------------------------------------------------------
    |
    | These are tweaks to fine tune the performance of Collejo
    |
    */
    'tweaks' => [
        /*
         * Collejo can check if module permissions are initialized
         * properly by checking the database during module init.
         * Setting this to false will load Collejo faster,
         * however permissions for newly installed modules must be
         * installed using the CLI or they will be ignored.
         */
        'check_module_permissions_on_module_init' => env('CHECK_MODULE_PERMISSION_ON_MODULE_INIT', true),

        /*
         * Every time a search query for a list of items is run in the database
         * Collejo caches the search results.
         */
        'criteria_cache_ttl' => env('COLLEJO_CRITERIA_CACHE_TTL', 0),

        /*
         * Collejo can cache permissions for each user, enabling this will
         * increase the performance by skipping the need to query the database on
         * each authorization check.
         */
        'user_permissions_cache_ttl' => env('COLLEJO_USER_PERMISSIONS_CACHE_TTL', 0),

        'languages_cache_ttl' => env('COLLEJO_LANG_CACHE_TTL', 0),
        'routes_cache_ttl'    => env('COLLEJO_ROUTE_CACHE_TTL', 0),
    ],
];
