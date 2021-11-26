<?php
namespace App\Graphql\Models;

class Region extends Model{
    protected $with = [
        'detail' => RegionDetail::class
    ];
}
