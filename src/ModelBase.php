<?php
namespace ElasticSearchModel;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

abstract class ModelBase
{

    /**
     *
     * @var string
     */
    protected $index = "";

    /**
     *
     * @var string
     */
    protected $type = "";

    /**
     *
     * @var array
     */
    protected $settings = [];

    /**
     *
     * @var array
     */
    protected $mappings = [];

    /**
     *
     * @var Client
     */
    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?? ClientBuilder::create()->build();
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function getMappings()
    {
        return $this->mappings;
    }

    protected function mergeParams($params)
    {
        return array_merge($this->getDefaultParams(), $params);
    }

    protected function getDefaultParams()
    {
        $params = [
            'index' => $this->index,
            'type' => $this->type
        ];
        return $params;
    }
}