<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends API
{
    public $with = [
        'items' => Bank::class,
        'center' => Center::class,
        'user' => User::class,
        'creator' => User::class,
        'bank' => Bank::class
    ];
    public $casts = [
        'expires_at' => 'datetime'
    ];

    public $parent = Center::class;

    public function _childIndex($region, array $params = []){
        return (new static)->execute('bank/' . $region , $params, 'get');
    }

    public static function adminIndex(array $params = []){
        return (new static)->execute('admin/banks', $params, 'get');
    }

    public static function adminUpdate($bank, array $params = []){
        return (new static)->execute('admin/banks/' . $bank, $params, 'put');
    }

    public function _childPost($region, array $params = []){
        return (new static)->execute('bank/' . $region , $params, 'post');
    }

    public static function settledPost(array $params = []){
        return (new static)->execute('bank/settleds', $params, 'post');
    }

}
