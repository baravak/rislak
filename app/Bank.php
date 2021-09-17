<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends API
{
    public $with = [
        'items' => Bank::class
    ];
    public $casts = [
        'expires_at' => 'datetime'
    ];

    public $parent = Center::class;

    public function _childIndex($region, array $params = []){
        return (new static)->execute('bank/' . $region , $params, 'get');
    }

    public function _childPost($region, array $params = []){
        return (new static)->execute('bank/' . $region , $params, 'post');
    }
}
