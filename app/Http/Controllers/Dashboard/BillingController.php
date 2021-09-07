<?php

namespace App\Http\Controllers\Dashboard;

use App\Billing;
use App\BillingDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BillingController extends Controller
{

    public function index(Request $request)
    {
        $this->data->billings = $billings = Billing::apiIndex($request->all());
        return $this->view($request, 'dashboard.billings.index');
    }

    public function show(Request $request, $billing){
        $this->data->items = $items = BillingDashboard::apiDashboard($billing, $request->all());
        $this->data->billing = $items->parentModel;
        return $this->view($request, 'dashboard.billings.items.index');
    }

    public function doFinal(Request $request, $billing){
        Billing::doFinal($billing, $request->all());
    }

    public function settled(Request $request, $billing){
        try{
            return Billing::settled($billing)->response()->json([
                'redirect' => route('dashboard.billings.show', $billing)
            ]);
        } catch (\App\Exceptions\APIException $th) {
            if($th->response()->message == 'POVERTY'){
                Cache::put($th->response()->payment->authorized_key, ['url' => route('dashboard.billings.show', $billing)], 300);
                return response()->json([
                    'is_ok' => true,
                    'message' => $th->response()->message,
                    'message_text' => $th->response()->message_text,
                    'redirect' => route('auth', ['authorized_key' => $th->response()->payment->authorized_key]),
                    'direct' => true
                    // 'window_open' => route('auth', ['authorized_key' => $th->response()->payment->authorized_key])
                ]);
            }else{
                throw $th;
            }
        }
    }
}
