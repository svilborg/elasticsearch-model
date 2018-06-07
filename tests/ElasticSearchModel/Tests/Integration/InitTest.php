<?php
namespace ElasticSearchModel\Tests\Integration;

use PHPUnit\Framework\TestCase;
use ElasticSearchModel\Tests\Item;

class InitTest extends TestCase
{

    public function testInitState()
    {
        $item = new Item();

        $this->assertEquals("inventory", $item->getIndex());
        $this->assertEquals("items", $item->getType());

        $this->assertEquals([
            '_default_' => [
                'properties' => [
                    'name' => [
                        'type' => 'keyword',
                        'copy_to' => 'combined'
                    ],
                    'count' => [
                        'type' => 'integer',
                        'copy_to' => 'combined'
                    ],
                    'combined' => [
                        'type' => 'keyword'
                    ]
                ]
            ]
        ], $item->getDefaultMappings());

        $this->assertEquals([
            'number_of_shards' => 1,
            'number_of_replicas' => 0
        ], $item->getDefaultSettings());
    }

    /**
     *
     * @return void
     */
    public function testCreateIndex()
    {
        $item = new Item();

        $item->deleteIndex();

        $response = $item->initIndex();

        $this->assertTrue($response["acknowledged"]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMapping()
    {
        $item = new Item();

        $response = $item->getMapping();

        $this->assertTrue(is_array($response["inventory"]["mappings"]));
    }
}