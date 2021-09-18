<?php

namespace App\Http\Controllers\Dashboard;

use App\Bank;
use Illuminate\Http\Request;

class UserAccountingController extends Controller
{

    public function index(Request $request)
    {
        return $this->view($request, 'dashboard.users.accounting.index');
    }

    public function bank(Request $request)
    {
        $this->data->bank = $bank = Bank::apiChildIndex(auth()->id(), $request->all());
        $this->data->center = $bank->parentModel;
        return $this->view($request, 'dashboard.centers.accounting.bank.index');
    }

}
