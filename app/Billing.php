<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends API
{
    public $with = [
        'user' => User::class,
        'creditor' => Treasury::class,
        'debtor' => Treasury::class,
    ];
    public static function doFinal($id, array $params = [])
    {
        return (new static)->cache('billings/' . $id .'/final' , $params, 'POST');
    }

    public static function settled($id, array $params = [])
    {
        return (new static)->cache('billings/' . $id .'/settled' , $params, 'POST');
    }
}
