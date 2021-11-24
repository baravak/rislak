<?php

namespace App\Http\Controllers\Dashboard;

use App\Graphql\Client;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index(Request $request, $center){
        $this->data->center = $center;
        return $this->view($request, 'dashboard.gifts.index');
    }
    public function create(Request $request, $center){
        $this->data->center = $center;
        return $this->view($request, 'dashboard.gifts.create');
    }

    public function store(Request $request, $center){
        $inputs = [];
        $inputs['title'] = "\"{$request->title}\"";
        $inputs['description'] = "\"{$request->description}\"";
        $inputs['type'] = strtoupper($request->type);
        $inputs['value'] = $request->value;
        $inputs['started_at'] = $request->started_at;
        $inputs['expires_at'] = $request->expires_at;
        $inputs['disposable'] = $request->has('disposable');
        $inputs = array_map(function($value, $key){
            $value = $value === null ? 'null' : $value;
            if($value === false || $value === true){
                $value = $value ? 'true' : 'false';
            }
            return "$key: $value";
        }, $inputs, array_keys($inputs));
        $inputs = join(", ", $inputs);
        $store = <<<Query
        mutation(\$center: CenterID!, \$title: String!, \$description : String, \$type:  GiftType!, \$value: Int!, \$started_at: Timestamp, \$expires_at: Timestamp, \$disposable: Boolean){
            CreateGift(region:\$center, input: {
                title: \$title
                description: \$description
                type: \$type
                value: \$value
                started_at: \$started_at
                expires_at: \$expires_at
                disposable: \$disposable
            }){
              id,code,started_at
            }
        }
        Query;
        $create = Client::query($store, [
            'center' => $center,
            'title' => $request->title,
            'type' => strtoupper($request->type),
            'value' => (int) $request->value,
            'started_at' => $request->started_at
        ]);
        dd($create);
    }
}
