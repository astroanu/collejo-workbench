<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Settings
    |--------------------------------------------------------------------------
    |
    | reauth_ttl : living time of a re-authentication grant
    |
    */
    'auth' => [
        'reauth_ttl' => 3600,
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Setting
    |--------------------------------------------------------------------------
    |
    | new_user_password_create_request : sends an email to the given user asking
    | to create a password
    |
    */
    'emails' => [
        'new_user_password_create_request' => [
            'student'  => true,
            'guardian' => true,
            'admin'    => true,
            'employee' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global Pagination Configuration
    |--------------------------------------------------------------------------
    |
    | perpage : the number of items shown per page
    |
    */
    'pagination' => [
        'perpage' => 10,
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Caching
    |--------------------------------------------------------------------------
    |
    | user_permissions : TTL for caching user permissions
    | search_criteria : TTL for caching search criteria
    |
    */
    'caching' => [
        'user_permissions' => 30,
        'search_criteria'  => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Caching
    |--------------------------------------------------------------------------
    |
    | minified : load minified version of css and js
    | theme : define which theme to use for the application
    |
    */
    'assets' => [
        'minified' => true,
        'theme'    => null,
    ],

];
