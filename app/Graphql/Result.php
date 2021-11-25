<?php
namespace App\Graphql;

use App\Graphql\Models\Gift;
use Exception;
use Illuminate\Support\Str;

class Result{
    public function __construct($result)
    {
        foreach($result as $key => $model){
            $name  = Str::ucfirst($key);
            $modelName = '\App\Graphql\Models\\' . $name;
            $this->$key = $modelName::construct($model);
        }
    }
}
