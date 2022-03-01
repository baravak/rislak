<?php
namespace App\Graphql\Models;

use App\Graphql\Collection;

class AssessmentsByAtom  extends Collection{
    protected $model = AtomAssessment::class;
}
