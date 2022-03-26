<?php


require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;


echo '<h1>PHP Stack - Elasticsearch</h1>';

$faker = Faker\Factory::create();

echo "<pre>";


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
for($i = 0; $i < 10; $i++) {

    $params['body'][] = [
        'index' => [
            '_index' => 'my_data',
        ]
    ];

    $params['body'][] = [
        'author'     => $faker->title . ' ' . $faker->name,
        'book'     => $faker->name,
        'city' => $faker->city,
        'email' => $faker->email,
        'city' => $faker->city
    ];
}

$results = $client->bulk($params);
// print_r($params);
print_r($results);
