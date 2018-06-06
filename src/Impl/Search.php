<?php
namespace ElasticSearchModel\Impl;

trait Search {

    /**
     *
     * @var \Elasticsearch\Client
     */
    protected $client;

    public function search(array $params)
    {
        $params = $this->mergeParams($params);

        $response = $this->client->search($params);

        return $response;
    }

    public function searchDocument(array $body)
    {
        $params = [
            "body" => $body
        ];

        $params = $this->mergeParams($params);

        $response = $this->client->search($params);

        return $response;
    }

    public function searchPaginate($body, $page, $perPage = 10)
    {
        $from = max(0, $perPage * ($page - 1));
        $size = $perPage;

        $params = [
            'from' => $from,
            'size' => $size,
            "body" => $body
        ];

        $params = $this->mergeParams($params);

        $response = $this->client->search($params);

        return $response;
    }

    public function count(array $params)
    {
        $params = $this->mergeParams($params);

        $response = $this->client->count($params);

        return $response;
    }
}