<?php
namespace App\Graphql\Models;

class Assessment extends Model{
    protected $with = [
        'parent' => Assessment::class,
    ];
}
