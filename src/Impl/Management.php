<?php
namespace ElasticSearchModel\Impl;

trait Management
{

    protected function getSettings()
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
    protected function getMappings()
    {
        $params = [
            'index' => $this->index
        ];
        return $this->client->indices()->getMapping($params);
    }
}