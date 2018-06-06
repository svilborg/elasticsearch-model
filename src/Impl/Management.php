<?php
namespace ElasticSearchModel\Impl;

trait Management
{

    /**
     *
     * @var \Elasticsearch\Client
     */
    protected $client;

    public function getSettings()
    {
        $params = [
            'index' => $this->index
        ];
        return $this->client->indices()->getSettings($params);
    }

    /**
     *
     * @param string $index
     * @return array
     */
    public function getMappings()
    {
        $params = [
            'index' => $this->index
        ];
        return $this->client->indices()->getMapping($params);
    }

    /**
     *
     * @param string $body
     * @return array|callable
     */
    public function initIndex()
    {
        $params = [
            'index' => $this->index,
            'body' => [
                'settings' => $this->settings,
                'mappings' => $this->mappings
            ]
        ];

        $response = $this->client->indices()->create($params);

        return $response;
    }

    /**
     *
     * @param string $body
     * @return array|callable
     */
    public function createIndex($body)
    {
        $params = [
            'index' => $this->index,
            'body' => $body
        ];

        $response = $this->client->indices()->create($params);

        return $response;
    }

    /**
     *
     * @return array|callable
     */
    public function deleteIndex()
    {
        $params = [
            'index' => $this->index
        ];

        $response = $this->client->indices()->delete($params);

        return $response;
    }

    /**
     *
     * @param string $index
     * @return boolean
     */
    public function existsIndex($index)
    {
        $params = [
            'index' => $this->index
        ];

        return $this->client->indices()->exists($params);
    }

    /**
     *
     * @param string $index
     */
    public function openIndex($index)
    {
        $params = [
            'index' => $this->index
        ];
        $this->client->indices()->open($params);
    }

    /**
     *
     * @param string $index
     */
    public function closeIndex($index)
    {
        $params = [
            'index' => $this->index
        ];
        $this->client->indices()->close($params);
    }
}