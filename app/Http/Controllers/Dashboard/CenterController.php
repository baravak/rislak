<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\CenterDashboard;
use Illuminate\Http\Request;
class CenterController extends Controller
{
    public function index(Request $request)
    {
        $this->data->centers = Center::apiIndex($request->all());
        return $this->view($request, $request->header('data-xhr-base') == 'quick_search'? 'dashboard.centers.list' : 'dashboard.centers.index');
    }

    public function show(Request $request, $center)
    {
        $rooms = $this->data->rooms = CenterDashboard::apiDashboard($center, $request->all());
        $center = $this->data->center = $rooms->parentModel;
        if($center->type == 'personal_clinic'){
                return $request->ajax() ? ['redirect' => route('dashboard.rooms.show', $center->id)] : redirect()->route('dashboard.rooms.show', $center->id);
            }
        $this->data->global->title = $center->detail->title;
        return $this->view($request, $request->header('data-xhr-base') == 'quick_search'? 'dashboard.centers.rooms-xhr' : 'dashboard.centers.show');
    }

    public function request(Request $request, $center)
    {
        $this->data->center = Center::request($center);
        return $this->view($request, 'dashboard.centers.acceptationCallback');
    }

    public function create(Request $request)
    {
        $this->data->global->title = __('Create new center');
        $this->authorize('dashboard.centers.create');
        return $this->view( $request, 'dashboard.centers.create');
    }

    public function store(Request $request){
        $this->authorize('dashboard.centers.create');
        $center =  Center::apiStore($request->all());
        return $center->response()->json([
            'redirect' => route('dashboard.centers.show', $center->id)
        ]);
    }

    public function edit(Request $request, $center)
    {
        $center = is_string($center) ?  $this->data->center = Center::apiShow($center, array_merge($request->all(), ['summary' => ''])) : $center;
        $this->data->global->title = __('Edit center');
        $this->authorize('dashboard.centers.update', [$center, $center]);
        return $this->view($request, 'dashboard.centers.' . ($center->type == 'personal_clinic' ? 'create' : 'edit'));
    }

    public function update(Request $request, $center)
    {
        return Center::apiUpdate($center, $request->all())->response()->json();
    }
    public function avatarStore(Request $request, $center)
    {
        $this->data->center = $center = (new Center)->execute("%s/$center/avatar", $request->all('avatar'), 'POST');
        return $this->edit($request, $center);
    }
}
