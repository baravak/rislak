<?php
namespace App\Graphql\Models;

class Gift extends Model{
    protected $casts = [
        'id' => 'string',
        'started_at' => 'datetime',
        'expires_at' => 'datetime',
        'last_renew_at' => 'datetime',
    ];
    protected $with = [
        'users' => GiftUsers::class
    ];

}
