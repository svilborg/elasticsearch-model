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


}