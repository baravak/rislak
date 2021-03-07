<?php

namespace App\Http\Controllers\Dashboard;

use App\Session;
use App\Room;
use App\TherapyCase;
use App\Practice;
use App\SessionDashboard;
use Illuminate\Http\Request;
use jDate;
class SessionController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->data->module->singular = 'reserve';
    }
    public function index(Request $request)
    {
        $this->data->sessions = $sessions = Session::apiIndex($request->all());
        if($request->instance && $request->header('data-xhr-base')){
                $this->data->global = $sessions->map(function($session){
                    return ['id' => $session->id, 'title' => $session->id];
                });
            return $this->view($request, 'dashboard.sessions.select2');
        }
        return $this->view($request, 'dashboard.sessions.index');
    }

    public function viewMode($request){
        $date = jdate();
        $current = new jDate($date->getYear(), $date->getMonth(), $date->getDay());
        $start = $current->subDays($current->getDayOfWeek());
        $end = $start->addDays(6)->addHours(23)->addMinutes(59)->addSeconds(59);
        $this->data->week = [$start, $end];
        if($request->case || $request->room){
            if($request->case)
            {
                $case = $this->data->case = $request->case ? TherapyCase::apiShow($request->case) : null;
                $room = $this->data->room = $case->room;
            }
            else
            {
                $room = $this->data->room = $request->room ? Room::apiShow($request->room) : null;
            }
            $this->authorize('dashboard.sessions.create');
            if(!$room){
                $this->authorize('dashboard.rooms.admin', [$room]);
            }
            $request->request->add(['mode' => 'week']);
            $sessions = $this->data->sessions = Session::apiIndex($request->all());
            dd(10);
            $this->data->table = [];
            for ($i = 7; $i <= 22; $i++) {
                $this->data->table[] = $i;
            }
        }
    }

    public function create(Request $request)
    {
        $this->data->global->title = __('Create new sessions');
        $case = $this->data->case = TherapyCase::apiShow($request->case);
        $room = $this->data->room = $case->room;
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.sessions.create');
    }

    public function edit(Request $request, Session $session)
    {
        $this->authorize('dashboard.sessions.update', [$session]);
        $this->data->session = $session;
        $this->data->case = $session->case;
        $this->data->room = $session->case->room;
        $this->data->center = $this->data->room->center;
        $this->viewMode($request);
        return $this->view($request, 'dashboard.sessions.create');
    }
    public function store(Request $request, $case)
    {
        $session = Session::apiStore($case, $request->all());
        return $session->response()->json([
            'redirect' => route('dashboard.sessions.edit', $session->id)
        ]);
    }

    public function show(Request $request, $session)
    {
        $this->data->session = $session = SessionDashboard::apiDashboard($session);
        $practices = $this->data->practices = $session->practices;
        $samples = $this->data->samples = $session->samples;
        $case = $this->data->case = $session->parentModel;
        $room = $this->data->room = $case->room;
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.sessions.show');
    }

    public function update(Request $request, $session){
        $this->authorize('dashboard.sessions.update', [$session]);
        $bind = [];
        if($request->callback){
            $bind['redirect'] = urldecode($request->callback);
        }
        return Session::apiUpdate($session, $request->all())->response()
        ->json($bind);
    }

    public function sessionUpdate(Request $request, $session){
        $session = $this->data->session = Session::apiUpdate($session, $request->all());
        return $this->view($request, 'dashboard.sessions.show-header');
    }
}
