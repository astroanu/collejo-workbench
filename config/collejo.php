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
    	'modules'
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
		'en'
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
        'perpage' => 5
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
            'themes'
        ],
        'active_theme' => null

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
        'check_module_permissions_on_module_init' => true,

        /*
         * Every time a search query for a list of items is run in the database
         * Collejo caches the search results. Setting the TTL to 0 will turn
         * off caching while setting the TTL to a higher number will result
         * in faster loading of list views, but will cause inaccurate data to
         * be displayed.
         */
        'criteria_cache_ttl' => 0
    ]
];