<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function create(Request $request, $center){
        $this->data->center = $center;
        return $this->view($request, 'dashboard.gift.create');
    }

    public function store(Request $request, $center){
        $inputs = [];
        $inputs['title'] = "\"{$request->title}\"";
        dd($inputs);
        $store = <<<MUTATION
        mutation{
            CreateGift(region:"$center", input: {
              title: "فصل بهار"
              type: NUMERAL
              value: 50000
              exclusive: true
              exclusive_users: ["GH96669SW", "GH96669GY"]
            }){
              id
              code
              users(first:10){
                paginatorInfo{
                  hasMorePages

                }
                data{
                  usage_count
                  status
                  used_at
                  ghost{
                    id
                    name
                    gender
                    mobile
                    position
                  }
                }
              }
            }
          }
        MUTATION;
    }
}
