<?php
namespace App\Graphql\Models;

class RegionAssessment extends Model{
    protected $with = [
        'assessment' => Assessment::class,
    ];
}
