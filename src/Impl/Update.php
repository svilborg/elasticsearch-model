<?php
namespace ElasticSearchModel\Impl;

trait Update {

    public function update($params)
    {
        $params = $this->mergeParams($params);

        $response = $this->client->update($params);

        return $response;
    }

    public function updateDocument($id, $doc)
    {
        $params = [
            "id" => $id,
            'body' => [
                'doc' => $doc
            ]
        ];

        $response = $this->update($params);
        return $response;
    }

    public function updateScripted($script, $params)
    {
        $params = [
            "script" => $script,
            'params' => $params
        ];

        $response = $this->update($params);
        return $response;
    }

/**
 * @TODO :
 * body' => [
 * 'script' => [
 * 'source' => 'ctx._source.counter += params.count',
 * 'params' => [
 * 'count' => 4
 * ],
 * ],
 * 'upsert' => [
 * 'counter' => 1
 * ],
 * ]
 */
}