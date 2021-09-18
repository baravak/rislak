<?php

namespace App\Http\Controllers\Dashboard;

use App\AtomDetail;
use App\BalanceSheet;
use App\Bank;
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
    public function commissionUpdate(Request $request, $center)
    {
        $this->data->update = $update = Commission::apiChildUpdate($center, $request->all());
        return $update->response()->json();
    }

    public function balanceSheet(Request $request, $center){
        $this->data->rooms = $rooms = AtomDetail::apiChildIndex($center);
        $this->data->center = $rooms->parentModel;
        return $this->view($request, 'dashboard.centers.accounting.balanceSheets.index');

    }

    public function balanceSheetShow(Request $request, $room){
        $this->data->transactions = $transactions = BalanceSheet::apiChildIndex($room);
        $this->data->room = $room = $transactions->parentModel;
        $this->data->center = $center = $room->center;
        return $this->view($request, 'dashboard.centers.accounting.balanceSheets.reportAndSettlement.index');
    }

    public function balanceSheetStore(Request $request, $room){
        $store = BalanceSheet::apiChildPost($room, $request->all());
        return $store->response()->json([
            'redirect' => route('dashboard.center.balanceSheets.show', $room)
        ]);
    }

    public function bankShow(Request $request, $center){
        $this->data->bank = $bank = Bank::apiChildIndex($center, $request->all());
        $this->data->center = $bank->parentModel;
        return $this->view($request, 'dashboard.centers.accounting.bank.index');
    }
    public function bankStore(Request $request, $center){
        $this->data->item = Bank::apiChildPost($center, $request->all());
        return $this->view($request, 'dashboard.centers.accounting.bank.bankAccountsItems');
    }
}
