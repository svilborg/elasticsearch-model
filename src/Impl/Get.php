<?php
namespace ElasticSearchModel\Impl;

trait Get {

    public function get(array $params)
    {
        $params = $this->mergeParams($params);

        $response = $this->client->get($params);

        return $response;
    }

    public function getDocument($id)
    {
        $params = [
            "id" => $id
        ];

        $response = $this->get($params);

        return $response["_source"];
    }
}