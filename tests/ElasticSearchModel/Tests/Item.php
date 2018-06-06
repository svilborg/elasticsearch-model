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

class Item extends ModelBase implements Gettable, Indexable, Updatable, Deletable, Searchable
{
    use Get, Index, Update, Delete, Search;

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
}