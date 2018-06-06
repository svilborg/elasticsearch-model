<?php
namespace ElasticSearchModel\Interfaces;

interface Updatable
{

    public function update($params);

    public function updateDocument($id, $doc);

    public function updateScripted($script, $params);
}