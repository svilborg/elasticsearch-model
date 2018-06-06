<?php
namespace ElasticSearchModel\Tests;

use ElasticSearchModel\ModelBase;
use ElasticSearchModel\Impl\Delete;
use ElasticSearchModel\Impl\Update;
use ElasticSearchModel\Impl\Index;
use ElasticSearchModel\Impl\Get;
use ElasticSearchModel\Impl\Search;
use ElasticSearchModel\Interfaces\Gettable;
use ElasticSearchModel\Interfaces\Indexable;
use ElasticSearchModel\Interfaces\Updatable;
use ElasticSearchModel\Interfaces\Deletable;
use ElasticSearchModel\Interfaces\Searchable;
use ElasticSearchModel\Impl\Management;

class Item extends ModelBase implements Gettable, Indexable, Updatable, Deletable, Searchable
{
    use Get, Index, Update, Delete, Search, Management;

    /**
     *
     * @var string
     */
    protected $index = "inventory";

    /**
     *
     * @var string
     */
    protected $type = "items";

    protected $settings = [
        'number_of_shards' => 1,
        'number_of_replicas' => 0
    ];

    protected $mappings = [
        '_default_' => [
            'properties' => [
                'name' => [
                    'type' => 'keyword',
                    'copy_to' => 'combined'
                ],
                'count' => [
                    'type' => 'keyword',
                    'copy_to' => 'combined'
                ],
                'combined' => [
                    'type' => 'keyword',
                ]
            ]
        ]
    ];
}