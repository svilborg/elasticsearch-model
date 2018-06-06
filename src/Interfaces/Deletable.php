<?php
namespace ElasticSearchModel\Interfaces;

interface Deletable
{
    public function delete(array $params);

    public function deleteDocument($id);
}