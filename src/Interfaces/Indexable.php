<?php
namespace ElasticSearchModel\Interfaces;

interface Indexable
{

    public function index(array $params);

    public function indexDocument($id, array $body);
}