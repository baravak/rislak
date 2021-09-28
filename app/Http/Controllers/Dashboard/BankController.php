<?php

namespace App\Http\Controllers\Dashboard;

use App\Bank;
use Illuminate\Http\Request;

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

    public function indexSettlement(Request $request){
        $this->data->settlements = Bank::adminSettlement($request->all());
        return $this->view($request, 'dashboard.settlements.index');
    }

    public function updateSettlement(Request $request, $id){
        return Bank::adminSettlementUpdate($id, $request->all())->response()->json();
    }
}
