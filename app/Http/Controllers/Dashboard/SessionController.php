<?php

namespace App\Http\Controllers\Dashboard;

use App\Session;
use App\ReserveCalendar;
use App\Room;
use App\TherapyCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        return $this->view($request, 'dashboard.sessions.index');
    }

    public function viewMode($request){
        $date = jdate();
        $current = new jDate($date->getYear(), $date->getMonth(), $date->getDay());
        $start = $current->subDays($current->getDayOfWeek());
        $end = $start->addDays(6)->addHours(23)->addMinutes(59)->addSeconds(59);
        $this->data->week = [$start, $end];
        if($request->case_id || $request->room_id){
            if($request->case_id)
            {
                $case = $this->data->case = $request->case_id ? TherapyCase::apiShow($request->case_id) : null;
                $room = $this->data->room = $case->room;
            }
            else
            {
                $room = $this->data->room = $request->room_id ? Room::apiShow($request->room_id) : null;
            }
            Gate::authorize('dashboard.rooms.admin', [$room]);
            $request->request->add(['mode' => 'week']);
            $sessions = $this->data->sessions = Session::apiIndex($request->all());
            $this->data->table = [];
            for ($i = 7; $i <= 22; $i++) {
                $this->data->table[] = $i;
            }
            if ($sessions->count()) {
                $table = new ReserveCalendar($sessions);
                $this->data->hours = $table->hours;
                $this->data->calendar = $table->calendar;
            }
        }
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $this->data->global->title = __('Create new sessions');
        $this->viewMode($request);
        return $this->view($request, 'dashboard.sessions.create');
    }

    public function edit(Request $request, Session $session)
    {
        $this->data->session = $session;
        $this->data->case = $session->case;
        $this->data->room = $session->case->room;
        $this->viewMode($request);
        return $this->view($request, 'dashboard.sessions.create');
    }
    public function store(Request $request)
    {
        Session::apiStore($request->room_id, $request->except('room_id'));
        $request->request->add(['time' => $request->started_at]);
        return $this->calendar($request);
    }
    public function calendar(Request $request){
        $this->viewMode($request);
        return $this->view($request, 'dashboard.sessions.calendar');
    }

    public function show(Request $request, $relationship)
    {
        return Session::apiShow($relationship);
    }

    public function update(Request $request, $session){
        return Session::apiUpdate($session, $request->all())->response()->json();
    }
}
