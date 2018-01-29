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
        'perpage' => 20
    ],

    /*
    |--------------------------------------------------------------------------
    | Themes
    |--------------------------------------------------------------------------
    |
    | Configuration for themes
    | Paths are relative to base path
    |
    */
    'themes' => [
        'theme_paths' => [
            'themes'
        ],
        'active_theme' => null

    ]
];