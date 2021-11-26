<?php
namespace App\Graphql;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Collection extends EloquentCollection{
    public $paginatorInfo;
    public static function construct($model)
    {

        $listModel = new static();
        $collectionModel = $listModel->model;
        $items = $collectionModel::hydrate($model->data);

        $collection = new LengthAwarePaginator($items, $model->paginatorInfo->total, $model->paginatorInfo->perPage, $model->paginatorInfo->currentPage, [
            'path' => url()->current()
        ]);
        // $collection->setPath();
        // dd($collection);
        return $collection;
    }
}
