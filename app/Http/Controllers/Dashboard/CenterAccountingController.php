<?php

namespace App\Http\Controllers\Dashboard;

use App\Billing;
use App\Commission;
use Illuminate\Http\Request;

class CenterAccountingController extends Controller
{

    public function index(Request $request, $center)
    {
        $this->data->center = (object) ['id' => $center];
        return $this->view($request, 'dashboard.centers.accounting.index');
    }

    public function commission(Request $request, $center){
        $this->data->rooms = $rooms = Commission::apiChildIndex($center);
        $this->data->center = $rooms->parentModel;
        return $this->view($request, 'dashboard.centers.accounting.commission.index');
    }

    public function financialBalance(Request $request){
        return $this->view($request, 'dashboard.centers.accounting.financialBalance.index');

    }

    public function commissionUpdate(Request $request, $center)
    {
        $this->data->update = $update = Commission::apiChildUpdate($center, $request->all());
        return $update->response()->json();
    }
}
