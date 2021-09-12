<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBalance extends API
{
    public $with = [
        'manager' => User::class,
        'acceptation' => RoomUser::class,
    ];

    public $parent = Center::class;

    public function _childIndex($id, array $params = [])
    {
        return (new static)->cache('centers/' . $id .'/room-balances' , $params, 'get');
    }
}
