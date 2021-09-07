<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicTransaction extends API
{
    public $with = [
        'creditor' => Treasury::class,
        'debtor' => Treasury::class,
    ];
}
