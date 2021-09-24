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
        return $this->view($request, 'dashboard.rooms.billings.index');
    }
}
