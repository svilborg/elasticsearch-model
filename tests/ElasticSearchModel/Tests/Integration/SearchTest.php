<?php
namespace ElasticSearchModel\Tests\Integration;

use PHPUnit\Framework\TestCase;
use ElasticSearchModel\Tests\Item;
use Faker;

class SearchTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearch()
    {
        $item = new Item();

        $item->deleteIndex();

        // $response = $item->initIndex();

        // $this->assertTrue($response["acknowledged"]);

        $faker = Faker\Factory::create();

        foreach (range(0, 25) as $id) {

            $data = array(
                'name' => $faker->colorName,
                'count' => $faker->numberBetween(1, 1000)
            );

            $response = $item->indexDocument($id, $data);

            // echo json_encode($item->getDocument($id));
            // echo "\n";
        }

        $response = $item->search([
            "body" => [
                "query" => [
                    "match_all" => new \stdClass()
                ],
                'aggs' => [
                    'count_avg' => [
                        'avg' => [
                            'field' => 'count'
                        ]
                    ]
                ]
            ]
        ]);

        $this->assertGreaterThan(1, $response["aggregations"]["count_avg"]["value"]);
    }
}