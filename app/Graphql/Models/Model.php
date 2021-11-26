<?php
namespace App\Graphql\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel{
    protected $guarded = [];
    protected $casts = [
        'id' => 'string'
    ];
    public static function construct($model)
    {
        return new static((array) $model);
    }
}
