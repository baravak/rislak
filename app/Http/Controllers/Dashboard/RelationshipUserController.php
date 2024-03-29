<?php

namespace App\Http\Controllers\Dashboard;

use App\Relationship;
use App\RelationshipUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RelationshipUserController extends Controller
{
    public function index(Request $request, $relationship)
    {
        $this->data->users = RelationshipUser::apiIndex($relationship, $request->all());
        $this->data->relationship = new Relationship((array) $this->data->users->response('relationship'));
        return $this->view($request, 'dashboard.relationship-users.index');
    }
    public function create(Request $request)
    {
        return $this->view($request, 'dashboard.relationship-users.create');
    }

    public function store(Request $request, $relationship)
    {
        return RelationshipUser::apiStore($relationship, $request->all())->response()->json();
    }

    public function update(Request $request, $relationshipUser)
    {
        $this->data->user = (new RelationshipUser)->execute('relationship-users/'. $relationshipUser, $request->all(), 'PUT');
        $this->data->relationship = new Relationship((array) $this->data->user->response('relationship'));
        return $this->view($request, 'dashboard.relationship-users.list');
    }
}
