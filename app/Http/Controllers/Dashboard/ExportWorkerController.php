<?php

namespace App\Http\Controllers\Dashboard;

use App\ExportWorker;
use Illuminate\Http\Request;

class ExportWorkerController extends Controller
{
    public function store(Request $request){
        return ExportWorker::apiStore($request->all())->response()->json();
    }
}
