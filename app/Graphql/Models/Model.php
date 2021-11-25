<?php
namespace App\Graphql\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel{
    protected $guarded = [];
    public static function construct($model)
    {
        return new static((array) $model);
    }
}
