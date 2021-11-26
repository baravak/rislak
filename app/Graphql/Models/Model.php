<?php
namespace App\Graphql\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel{
    protected $guarded = [];
    protected $casts = [
        'id' => 'string'
    ];
    protected $with = [];
    public static function construct($model)
    {
        return new static((array) $model);
    }
    public function fill($attributes){
        foreach($attributes as $key => $attribute){
            if(key_exists($key, $this->with)){
                $this->setRelation($key, $this->with[$key]::construct($attribute));
                unset($attributes[$key]);
            }
        }
        return parent::fill($attributes);
    }
}
