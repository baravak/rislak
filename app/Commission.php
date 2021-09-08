<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends API
{
    public $with = [
        'manager' => User::class,
        'acceptation' => RoomUser::class,
    ];

    public $parent = Center::class;

    public function _childIndex($id, array $params = [])
    {
        return (new static)->cache('centers/' . $id .'/commissions' , $params, 'get');
    }
    public function _childUpdate($id, array $params = [])
    {
        return (new static)->execute('centers/' . $id .'/commissions' , $params, 'put');
    }
}
