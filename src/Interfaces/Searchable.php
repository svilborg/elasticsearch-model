<?php
namespace ElasticSearchModel\Interfaces;

interface Searchable
{

    public function search(array $params);

    public function searchDocument(array $body);

    public function searchPaginate($body, $page, $perPage = 10);
}