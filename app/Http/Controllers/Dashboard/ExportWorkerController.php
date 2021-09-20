<?php

namespace App\Http\Controllers\Dashboard;

use App\ExportWorker;
use Illuminate\Http\Request;

class ExportWorkerController extends Controller
{
    public function store(Request $request){
        return ExportWorker::apiStore($request->all())->response()->json([
            'redirect' => route('dashboard.exportWorkers.index')
        ]);
    }

    public function index(Request $request){
        $this->data->exports = $exports = ExportWorker::apiIndex($request->all());
        return $this->view($request, 'dashboard.exports.index');
    }

    public function statuCheck(Request $request){
        $dones = $this->data->exports = ExportWorker::statusCheck((array) $request->workers)->whereIn('status', ['done', 'failed']);
        if(!$dones->count()){
            return [];
        }
        return $this->view($request, 'dashboard.exports.status-list');
    }
}
