<?php


require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;


echo '<h1>PHP Stack - Elasticsearch</h1>';


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

echo "<pre>";


// search hotel records
$params = [
    'index' => 'hotels',
    'body'  => [
        'query' => [
            'match' => [
                'name' => 'hotel',
            ],
            'match' => [
                'stars' => '2',
            ]
        ]
    ]
];

$results = $client->search($params);
print_r($results);


// search book records
$params = [
    'index' => 'books',
    'body'  => [
        'query' => [
            'match' => [
                'author' => 'Nolan Considine',
            ],
        ]
    ]
];

$results = $client->search($params);
print_r($results);


