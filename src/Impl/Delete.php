<?php
namespace ElasticSearchModel\Impl;

trait Delete  {

    /**
     *
     * @var \Elasticsearch\Client
     */
    protected $client;

    public function delete(array $params)
    {
        $params = $this->mergeParams($params);

        $response = $this->client->delete($params);

        return $response;
    }

    public function deleteDocument($id)
    {
        $params = [
            "id" => $id
        ];

        $response = $this->delete($params);

        return $response;
    }
}