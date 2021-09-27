<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\CenterUser;
use App\Room;
use App\RoomDashboard;
use App\Tag;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = $this->data->rooms = Room::apiIndex($request->all());
        if($request->instance && $request->header('data-xhr-base')){
            $view = 'dashboard.rooms.select2';
                $this->data->global = $rooms->map(function($room){
                    return ['id' => $room->id, 'title' => $room->name];
                });
        return $this->view($request, $view);
    }
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

    public function create(Request $request, $center)
    {
        $this->authorize('create', Room::class);
        if($request->user && $request->center)
        {
            $user = $this->data->user = CenterUser::apiShow($center, $request->user);
            $this->data->center = $user->parentModel;
        }
        else
        {
            $this->data->center = Center::apiShow($center);
        }
        return $this->view($request, 'dashboard.rooms.create');
    }
    public function store(Request $request, $center)
    {
        $this->authorize('create', Room::class);
        $response = Room::apiStore($center, $request->all(['psychologist_id']));
        return $response->response()->json([
            'redirect' => route('dashboard.centers.show', ['center' => $response->center->id])
            ]);
    }

    public function show(Request $request, $room)
    {
        if($request->tag){
            $request->request->add(['tag' => explode(',', str_replace(' ', '', $request->tag))]);
        }
        $cases = $this->data->cases = RoomDashboard::apiDashboard($room, $request->all());
        $this->data->TagFilter = $cases->getFilter('tag') ? Tag::hydrate($cases->getFilter('tag')) : null;
        $room = $this->data->room = $cases->parentModel;
        $center = $this->data->center = $room->center;
        $this->data->global->title = __("Therapy room of :user in :center", ['user' => $room->manager->name, 'center' => $center->detail->title]);
        return $this->view($request, $request->header('data-xhr-base') == 'quick_search'? 'dashboard.rooms.caseItems-xhr' : 'dashboard.rooms.show');
    }

    public function centerIndex(Request $request, $center){
        $this->data->rooms = $rooms = Room::apiIndex(['center' => $center]);
        $this->data->center = $rooms->filters()->center;
        return $this->view($request, 'dashboard.centers.rooms.index');
    }

    public function update(Request $request, $room){
        return Room::apiUpdate($room, $request->all())->response()->json();
    }
}
