<?php


require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;


echo '<h1>PHP Stack - Elasticsearch</h1>';


$hosts = [
    [
        'host' => 'localhost',
        'port' => '9201',
        'scheme' => 'http',
    ],
    [
        'host' => 'localhost',    // Only host is required
    ]
];

$client = ClientBuilder::create()
                    ->setHosts($hosts)->build();  

echo "<pre>";

$params = [
    'index' => 'my_index',
    'body' => [
        'mappings' => [
            '_source' => [
                'enabled' => true
            ],
            'properties' => [
                'first_name' => [
                    'type' => 'keyword'
                ],
                'age' => [
                    'type' => 'integer'
                ]
            ]
        ]
    ]
];

// $response = $client->indices()->create($params);


$params = [
    'index' => 'hotels2',
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
