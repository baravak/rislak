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
        $items = $collectionModel::hydrate(isset($model->data) ? $model->data : $model);
        if(isset($model->paginatorInfo)){
            $collection = new LengthAwarePaginator($items, $model->paginatorInfo->total, $model->paginatorInfo->perPage, $model->paginatorInfo->currentPage, [
                'path' => url()->current()
            ]);
            return $collection;
        }
        return $items;
    }
}
