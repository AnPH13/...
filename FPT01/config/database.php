<?php

return [
    'default' => 'FPT01',

    'connections' => [

        'FPT01' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'fpt01',
            'username'  => 'root',
            'password'  => '',
        ],

        'FPT02' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'fpt02',
            'username'  => 'root',
            'password'  => '',
        ],

        'content' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'content',
            'username'  => 'root',
            'password'  => '',
        ],

    ],
    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],

        'cache' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],

    ],
];
?>
