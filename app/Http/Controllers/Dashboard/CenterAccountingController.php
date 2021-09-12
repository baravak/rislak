<?php

namespace App\Http\Controllers\Dashboard;

use App\AtomDetail;
use App\Center;
use App\Commission;
use App\RoomBalance;
use Illuminate\Http\Request;

class CenterAccountingController extends Controller
{

    public function index(Request $request, $center)
    {
        $this->data->center = Center::apiShow($center);
        return $this->view($request, 'dashboard.centers.accounting.index');
    }

    public function commission(Request $request, $center){
        $this->data->rooms = $rooms = AtomDetail::apiChildIndex($center);
        $this->data->center = $rooms->parentModel;
        return $this->view($request, 'dashboard.centers.accounting.commission.index');
    }

    public function roomBalance(Request $request, $center){
        $this->data->rooms = $rooms = AtomDetail::apiChildIndex($center);
        $this->data->center = $rooms->parentModel;
        return $this->view($request, 'dashboard.centers.accounting.financialBalance.index');

    }

    public function commissionUpdate(Request $request, $center)
    {
        $this->data->update = $update = AtomDetail::apiChildUpdate($center, $request->all());
        return $update->response()->json();
    }
}
