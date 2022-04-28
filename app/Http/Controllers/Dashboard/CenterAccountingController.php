<?php

namespace App\Http\Controllers\Dashboard;

use App\AtomDetail;
use App\BalanceSheet;
use App\Bank;
use App\Center;
use App\Commission;
use App\Graphql\Client;
use App\RoomBalance;
use Illuminate\Http\Request;

class CenterAccountingController extends Controller
{

    public function index(Request $request, $center)
    {
        $this->data->center = Center::apiShow($center);
        return $this->view($request, 'dashboard.centers.accounting.index');
    }

    public function commission(Request $request, $region){
        $query = 'query ($region: RegionID!){
            region(id: $region){
                id type detail{title} commissions{topic value}
                atoms{id owner{name} commissions{topic value pinned}}
            }
        }';
        $index = Client::query($query, [
            'region' => $region
        ]);
        $this->data->center = $index->region;
        return $this->view($request, 'dashboard.centers.accounting.commission.index');
    }
    public function commissionUpdate(Request $request, $region)
    {
        $query = 'mutation($region: RegionID!, $topic: CommissionTopic!, $commission: Int!){
            updateRegionCommission(region:$region, topic: $topic, value: $commission)
          }';
        $index = Client::query($query, [
            'region' => $region,
            'topic' => strtoupper($request->topic),
            'commission' => (int) $request->commission
        ]);
        return ['is_ok' => true];
    }

    public function atomCommissionUpdate(Request $request)
    {
        if($request->has('pin')){
            $query = 'mutation($atom: AtomID!, $topic: CommissionTopic!){
                '.($request->pin ? 'pin' : 'unpin').'AtomCommission(atom:$atom, topic:$topic){
                    topic
                    value
                    pinned
                  }
              }';
            $index = Client::query($query, [
                'atom' => $request->atom,
                'topic' => strtoupper($request->topic),
            ]);
            return ['is_ok' => true, 'value' => $index->{$request->pin ? 'pinAtomCommission' : 'unpinAtomCommission'}->value];
        }else{
            $query = 'mutation($atom: AtomID!, $topic: CommissionTopic!, $value: Int!){
                updateAtomCommission(atom:$atom, topic:$topic, value:$value)
            }';
            $index = Client::query($query, [
                'atom' => $request->atom,
                'topic' => strtoupper($request->topic),
                'value' => (int) $request->value,
            ]);
            return ['is_ok' => true];
        }
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
