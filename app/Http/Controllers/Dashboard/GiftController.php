<?php

namespace App\Http\Controllers\Dashboard;

use App\Graphql\Client;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index(Request $request, $center){
        $this->data->center = $center;
        $query = 'query ($page: Int, $region: RegionID!){
                gifts(page:$page, first: 10, region:$region){
                    paginatorInfo{
                        total, hasMorePages, count, currentPage
                    }
                    data{
                        id,title,code,disposable,type,value,threshold,started_at,expires_at,usage_count,user_count, status
                    }
                }
                region(id: $region){
                    id
                    type
                    detail{
                        title
                    }
                    acceptation{position}
                }
            }';
          $index = Client::query($query, [
            'region' => $center,
            'page' => (int) ($request->page ?: 1)
        ]);
        $this->data->query = $index;
        $this->data->region = $index->region;
        $this->data->gifts = $index->gifts;
        return $this->view($request, 'dashboard.gifts.index');
    }
    public function create(Request $request, $center){
        $this->data->center = $center;
        return $this->view($request, 'dashboard.gifts.create');
    }

    public function store(Request $request, $center){
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
