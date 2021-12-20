<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
class CenterAssessmentController extends Controller
{
    public function index(Request $request)
    {
        return $this->view($request, 'dashboard.centers.accounting.assessments.index');
    }
}
