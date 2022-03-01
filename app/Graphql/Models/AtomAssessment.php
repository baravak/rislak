<?php
namespace App\Graphql\Models;

class AtomAssessment extends Model{
    protected $with = [
        'assessment' => Assessment::class,
    ];
}
