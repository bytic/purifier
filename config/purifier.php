<?php

use ByTIC\Purifier\Config\Config;

return [
    'defaults' => [
        Config::CACHE_PATH => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cache',
        Config::CACHE_PERMISSIONS => 0755,
    ],
    'profiles' => [
        'custom' => [],
    ],
];