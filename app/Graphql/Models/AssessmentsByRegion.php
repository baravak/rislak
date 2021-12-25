<?php
namespace App\Graphql\Models;

use App\Graphql\Collection;

class AssessmentsByRegion  extends Collection{
    protected $model = RegionAssessment::class;
}
