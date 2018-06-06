<?php
namespace ElasticSearchModel\Tests\Integration;

use PHPUnit\Framework\TestCase;
use ElasticSearchModel\Tests\Item;

class InitTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
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

        $response = $item->getMappings();

        $this->assertTrue(is_array($response["inventory"]["mappings"]));
    }
}