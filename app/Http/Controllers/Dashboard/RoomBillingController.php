<?php

namespace App\Http\Controllers\Dashboard;

use App\Billing;
use App\Room;
use Illuminate\Http\Request;

class RoomBillingController extends Controller
{

    public function index(Request $request, $room)
    {
        $this->data->billings = $billings = Billing::room($room, $request->all());
        $this->data->room = $room = $billings->parentModel;
        $this->data->center = $center = $room->center;
        return $this->view($request, 'dashboard.rooms.billings.index');
    }
    public function export(Request $request, $room){
        Billing::roomExport($room, $request->all());
        return [
            'redirect' => route('dashboard.exportWorkers.index')
        ];
    }
}
