<?php
namespace App\Graphql\Models;

class Gift extends Model{
    protected $casts = [
        'started_at' => 'datetime'
    ];
}
