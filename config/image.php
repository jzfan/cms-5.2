<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    'article' => [
        'width'  => 500,
    ],

    'slider' => [
        'width' => 640,
        'height' => 360
    ],

    'avatar' => [
        'width' => 100,
    ]

);
