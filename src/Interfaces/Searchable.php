<?php
namespace ElasticSearchModel\Interfaces;

interface Searchable
{

    public function search(array $params);

    public function searchDocument(array $query);

    public function searchPaginate(array $query, $page, $perPage = 10);
}