<?php
require '../vendor/autoload.php';
// require 'Item.php';

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->build();

$item = new ElasticSearchModel\Tests\Item();

// $response = $item->index([
//     "id" => 12,
//     "body" => [
//         "name" => "red",
//         "count" => 23
//     ]
// ]);

// $response = $item->deleteDocument(12);

// $response = $item->indexDocument(14, ["name" => "blue", "count" => 22]);

$response = $item->getDocument(14);
$response = $item->searchDocument([
    'query' => [
        'match' => [
            'name' => 'red'
        ]
    ]
]);

print_r($response);
die();

// $params = [
// 'index' => 'users',
// 'type' => 'delivery-address',
// 'id' => '4'
// ];

// $response = $client->get($params);
// print_r($response);
// die;

$params = [
    'index' => 'users',
    'type' => 'delivery-address',
    'body' => [
        'query' => [
            'match' => [
                'name' => 'Erling VonRueden'
            ]
        ]
    ]
];

$response = $client->search($params);
print_r($response);
die();

foreach (range(0, 9) as $id) {

    $data = array(
        'name' => $faker->name,
        'address' => $faker->address,
        'description' => $faker->text
    );

    $response = $client->index(array(
        'index' => 'users',
        'type' => 'delivery-address',
        'id' => $id,
        'body' => $data
    ));

    echo json_encode($response);
    echo "\n";
}
