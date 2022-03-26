<?php

require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$hosts = [
    [
        'host' => 'localhost',
        'port' => '9203',
        'scheme' => 'http',
    ],
    [
        'host' => 'localhost',    // Only host is required
    ]
];

$client = ClientBuilder::create()
                    ->setHosts($hosts)->build();  
