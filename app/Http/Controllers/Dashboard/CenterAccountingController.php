<?php

namespace App\Http\Controllers\Dashboard;

use App\Billing;
use Illuminate\Http\Request;

class CenterAccountingController extends Controller
{

    public function index(Request $request)
    {
        $this->data->billings = $billings = Billing::apiIndex($request->all());
        return $this->view($request, 'dashboard.centers.accounting.index');
    }
}
