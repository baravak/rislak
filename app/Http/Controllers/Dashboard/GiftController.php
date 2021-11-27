<?php

namespace App\Http\Controllers\Dashboard;

use App\Graphql\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class GiftController extends Controller
{
    public function index(Request $request, $center){
        $query = 'query ($page: Int, $region: RegionID!){
                gifts(page:$page, first: 15, region:$region){
                    paginatorInfo{
                        total, hasMorePages, count, currentPage, perPage
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
        $this->data->region = $this->data->center  = $index->region;
        $this->data->gifts = $index->gifts;
        return $this->view($request, 'dashboard.gifts.index');
    }
    public function create(Request $request, $center){
        $query = 'query($id: RegionID!){
            region(id: $id){
                id type detail{title}
            }
        }';
        $response = Client::query($query, [
            'id' => $center
        ]);
        $this->data->center = $response->region;
        return $this->view($request, 'dashboard.gifts.create');
    }

    public function store(Request $request, $center){
        $store = <<<Query
        mutation(\$center: RegionID!, \$title: String!, \$description : String, \$type:  GiftType!, \$value: Int!, \$started_at: Timestamp, \$expires_at: Timestamp, \$disposable: Boolean, \$threshold: Int){
            CreateGift(region:\$center, input: {
                title: \$title
                description: \$description
                type: \$type
                value: \$value
                started_at: \$started_at
                expires_at: \$expires_at
                disposable: \$disposable
                threshold: \$threshold
            }){
              id,code,started_at
            }
        }
        Query;
        $create = Client::query($store, [
            'center' => $center,
            'title' => $request->title,
            'type' => $request->type,
            'value' => (int) $request->value,
            'started_at' => $request->started_at,
            'expires_at' => $request->expires_at,
            'disposable' => (boolean) $request->disposable,
            'threshold' => ctype_digit($request->threshold) ? (int) $request->threshold : $request->threshold,
        ]);
        dd($create);
    }

    public function check(Request $request, $code){
        $query = 'query ($code: String!, $region: RegionID, $amount: Int){
            giftCheck(code:$code, region:$region, amount: $amount){title type value amount}
        }';
      $index = Client::query($query, [
        'code' => $code,
        'region' => $request->region,
        'amount' => (int) $request->amount,
    ]);
    return $index->giftCheck->toArray();
    }
}
