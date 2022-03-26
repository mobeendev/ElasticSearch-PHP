<?php

include_once 'init.php';

echo '<h1>PHP Stack - Elasticsearch</h1>';

echo "<pre>";

try {
    $params = [
        'index' => 'books',
        'id'    => 'HXavxn8B4HqdRi9m9oCG'
    ];
    $response = $client->delete($params);
    print_r($response);

} catch (Exception $e) {
  echo "Error! Unable to delete record " . $e->getMessage() ;
}

