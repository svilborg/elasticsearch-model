<?php
namespace ElasticSearchModel\Tests\Integration;

use PHPUnit\Framework\TestCase;
use ElasticSearchModel\Tests\Item;

class CrudTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $item = new Item();

        $response = $item->index([
            "id" => 14,
            "body" => [
                "name" => "red",
                "count" => 23
            ]
        ]);

        $this->assertEquals(1, $response["_shards"]["successful"]);
    }

    public function testRead()
    {
        $item = new Item();

        $response = $item->getDocument(14);

        $this->assertEquals([
            "name" => "red",
            "count" => 23
        ], $response);
    }


    public function testUpdate()
    {
        $item = new Item();

        $response = $item->updateDocument(14, ["count" => 24]);
        $response = $item->getDocument(14);

        $this->assertEquals([
            "name" => "red",
            "count" => 24
        ], $response);
    }

    public function testDelete()
    {
        $item = new Item();

        $response = $item->deleteDocument(14);

        $this->assertEquals([
            "name" => "red",
            "count" => 24
        ], $response);
    }
}
