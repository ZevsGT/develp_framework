<?php

return  [

    'home_title' => 'Warp',

    'http_home_url' => '//framework.ru',

    'theme' => 'themeDefoult',

    'charset' => 'utf-8',

    'host' => 'localhost',

    'dbname' => 'warp_db',

    'dbuser' => 'root',

    'dbpassword' => 'root',

    'twig_options' =>
    [
        'cache'       => 'engine/cache',
        //'auto_reload' => true
    ],

    'default_language' => null,

    'spa' => [
        'spa_mode' => true,
        'spa_load' => '/index.html'
    ]
];
