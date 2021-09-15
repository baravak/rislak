<?php

namespace App\Http\Controllers\Dashboard;

use App\Billing;
use App\BillingDashboard;
use App\Session;
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

    public function create(Request $request, $action){
        $model = null;
        $action = strtoupper($action);
        if(substr($action, 0, 2) == 'SE'){
            $model = Session::apiShow($action, ['fillAccounting' => 1]);
            $this->data->model = $this->data->session = $session = $model;
            $this->data->room = $room = $session->room;
            $this->data->center = $center = $room->center;
            $this->data->users = $session->clients;
            $this->data->treasuries = $center->treasuries;
        }

        return $this->view($request, 'dashboard.billings.create');
    }

    public function store(Request $request, $action){
        $billing = Billing::apiChildPost($action, $request->all());
        return $billing->response();
        return $billing->response()->json([
            'redirect' => route('dashboard.billings.show', $billing->id)
        ]);
    }
}
