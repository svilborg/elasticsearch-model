# elasticsearch-model
Elasticsearch Models creation Library

#### Usage

```php

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

```

```php
$item = new Item();

 $response = $item->indexDocument(15, [
            "name" => "blue",
            "count" => 24
 ]);
```



