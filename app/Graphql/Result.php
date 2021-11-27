<?php
namespace App\Graphql;

use App\Graphql\Models\Gift;
use App\Graphql\Models\Model;
use Exception;
use Illuminate\Support\Str;

class Result{
    public function __construct($result)
    {
        foreach($result as $key => $model){
            $name  = Str::ucfirst($key);
            $modelName = '\App\Graphql\Models\\' . $name;
            $modelName = class_exists($modelName) ? $modelName : Model::class;
            $this->$key = $modelName::construct($model);
        }
    }
}
