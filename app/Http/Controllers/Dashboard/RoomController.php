<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\CenterUser;
use App\Room;
use App\RoomDashboard;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = $this->data->rooms = Room::apiIndex($request->all());
        $this->data->center = $rooms->getFilter('center');
        switch($request->header('data-xhr-base')){
            case 'select2':
                $view = 'dashboard.rooms.select2';
                $this->data->global = $rooms->map(function($room){
                    return ['id' => $room->id, 'title' => $room->manager->name];
                });
                break;
            default : $view = 'dashboard.rooms.index';
        }
        return $this->view($request, $view);
    }

    public function create(Request $request)
    {
        $this->authorize('create', Room::class);
        if($request->user && $request->center)
        {
            $user = $this->data->user = CenterUser::apiShow($request->center, $request->user);
            $this->data->center = $user->parentModel;
        }
        elseif($request->center)
        {
            $this->data->center = Center::apiShow($request->center);
        }
        return $this->view($request, 'dashboard.rooms.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', Room::class);
        $response = Room::apiStore($request->counseling_center_id, $request->all(['psychologist_id']));
        return $response->response()->json([
            'redirect' => route('dashboard.rooms.index', ['center' => $response->center->id])
            ]);
    }

    public function show(Request $request, $room)
    {
        $cases = $this->data->cases = RoomDashboard::apiDashboard($room, $request->all());
        $room = $this->data->room = $cases->parentModel;
        if($room->type == 'personal_clinic'){
            return $request->ajax() ? ['redirect' => route('dashboard.centers.show', $room->id)] : redirect()->route('dashboard.centers.show', $room->id);
        }
        $center = $this->data->center = $room->center;
        return $this->view($request, $request->header('data-xhr-base') == 'quick_search'? 'dashboard.rooms.caseItems-xhr' : 'dashboard.rooms.show');
    }
}
