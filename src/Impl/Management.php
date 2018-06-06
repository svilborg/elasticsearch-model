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

    public function createIndex($body)
    {
        $params = [
            'index' => $this->index,
            'body' => $body
        ];

        $response = $this->client->indices()->create($params);

        return $response;
    }

    public function deleteIndex () {
        $params = [
            'index' => $this->index
        ];

        $response = $client->indices()->delete($params);

        return $response;
    }
}