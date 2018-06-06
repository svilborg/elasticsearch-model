<?php
namespace ElasticSearchModel\Impl;

trait Index  {
    /**
     *
     * @var \Elasticsearch\Client
     */
    protected $client;

    public function index(array $params)
    {
        $params = $this->mergeParams($params);

        $response = $this->client->index($params);

        return $response;
    }

    public function indexDocument($id, array $body)
    {
        $params = [
            "id" => $id,
            "refresh" => true,
            "body" => $body
        ];

        $response = $this->index($params);

        return $response;
    }
}