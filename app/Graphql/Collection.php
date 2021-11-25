<?php
namespace App\Graphql;

use App\Graphql\Models\Paginator;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class Collection extends EloquentCollection{
    public $paginatorInfo;
    public static function construct($model)
    {
        $collection = new static();
        $collectionModel = $collection->model;
        $hydrate = $collectionModel::hydrate($model->data);
        $collection = $collection->replace($hydrate->items);
        $collection->paginatorInfo = new Paginator((array) $model->paginatorInfo);
        return $collection;
    }
}
