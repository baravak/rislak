<?php

namespace App\Http\Controllers\Dashboard;

use App\Bank;
use App\Billing;
use App\BillingDashboard;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BankController extends Controller
{

    public function index(Request $request)
    {
        $this->data->banks = $banks = Bank::adminIndex($request->all());
        return $this->view($request, 'dashboard.banks.index');
    }

    public function update(Request $request, $bank){
        return Bank::adminUpdate($bank, $request->all())->response()->json();
    }
}
