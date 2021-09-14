<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtomDetail extends API
{
    public $with = [
        'manager' => User::class,
        'acceptation' => RoomUser::class,
        'center' => Center::class
    ];
    protected $casts = [
        'settled_at' => 'datetime',
    ];

    public $parent = Center::class;

    public function _childIndex($id, array $params = [])
    {
        return (new static)->cache('centers/' . $id .'/atoms' , $params, 'get');
    }
}
