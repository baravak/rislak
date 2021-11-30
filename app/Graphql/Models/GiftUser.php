<?php
namespace App\Graphql\Models;

class GiftUser extends Model{
    protected $casts = [
        'id' => 'string',
        'used_at' => 'datetime',
    ];
}
