<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalanceSheet extends API
{
    public $with = [
        'manager' => User::class,
        'acceptation' => RoomUser::class,
    ];
    protected $casts = [
        'settled_at' => 'datetime',
    ];

    public $parent = AtomDetail::class;

    public function _childIndex($id, array $params = [])
    {
        return (new static)->cache('rooms/' . $id .'/balance-sheets' , $params, 'get');
    }
}
