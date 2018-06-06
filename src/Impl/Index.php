<?php
namespace ElasticSearchModel\Impl;

trait Index  {

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
            "body" => $body
        ];

        $response = $this->index($params);

        return $response;
    }
}