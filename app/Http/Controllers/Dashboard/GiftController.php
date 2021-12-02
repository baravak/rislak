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
            gift(code:$code, region:$region, amount: $amount, check:true){title type value amount}
        }';
      $index = Client::query($query, [
        'code' => $code,
        'region' => $request->region,
        'amount' => (int) $request->amount,
    ]);
    return $index->gift->toArray();
    }

    public function show(Request $request, $center, $gift){
        $query = 'query ($id: GiftID!, $page:Int, $search: String){
            gift(id:$id){id title code description disposable threshold usage_count user_count type value started_at expires_at exclusive status renew_count last_renew_at
                region{id detail{title}}
                users(first:10, page:$page, search:$search){
                    paginatorInfo{ count currentPage total perPage}
                    data{
                        usage_count status used_at
                        ghost{
                            id name mobile
                        }
                    }
                }
            }
        }';
        $index = Client::query($query, [
            'id' => $gift,
            'page' => ctype_digit($request->page) ? (int) $request->page : 1,
            'search' => $request->q
        ]);
        $this->data->gift = $index->gift;
        if((ctype_digit($request->page) || $request->header('Data-xhr-base') == 'quick_search') && $request->ajax()){
            return $this->view($request, 'dashboard.gifts.listUsers');
        }
        $region = $index->gift->region->detail->title;
        $value = $index->gift->type == 'percent' ? '%'. $index->gift->value : number_format($index->gift->value) . 'تومانی';
        $link = [];
        $link[] = 'سلام';
        $link[] = "شما یک کد تخفیف $value از سمت $region دارید. با وارد کردن کد زیر در صفحه رزرواسیون جلسه، از تخفیف این کد بهره‌مند شوید";
        $link[] = $index->gift->code;
        $index->gift->whatsapp = join("\n", $link);
        $index->gift->whatsapp = urlencode($index->gift->whatsapp);
        $index->gift->telegram = urlencode($index->gift->whatsapp);
        return $this->view($request, 'dashboard.gifts.show');
    }

    public function renew(Request $request, $center, $gift){
        $mutation = "mutation(\$id:GiftID!){
            renewGift(id:\$id){
                id title code description type value status renew_count last_renew_at
            }
        }";
        $renew = Client::query($mutation, [
            'id' => $gift
        ]);
        $this->data->gift = $renew->renewGift;
        return $this->view($request, 'dashboard.gifts.renewResult');
    }

    public function appendUserForm(Request $request, $center, $gift){
        $query = 'query ($id: GiftID!){
            gift(id:$id){id title
                region{id detail{title}}
            }
        }';
        $index = Client::query($query, [
            'id' => $gift
        ]);
        $this->data->gift = $gift = $index->gift;
        $this->data->center = $gift->region;
        return $this->view($request, 'dashboard.gifts.addUser');
    }

    public function appendUser(Request $request, $center, $gift){
        $mutation = "mutation(\$id:GiftID!, \$ghosts:[GhostID!]!){
            appendUserGift(id:\$id, ghosts:\$ghosts){
                gift{
                    id
                }
            }
        }";
        $renew = Client::query($mutation, [
            'id' => $gift,
            'ghosts' => $request->user_id
        ]);
        $this->data->gift = $renew->renewGift;
        return $this->view($request, 'dashboard.gifts.renewResult');
    }

    public function edit(Request $request, $center, $gift){
        $query = 'query ($id: GiftID!){
            gift(id:$id){id title code description disposable threshold usage_count user_count type value started_at expires_at exclusive status renew_count last_renew_at
                region{id detail{title}}
            }
        }';
        $index = Client::query($query, [
            'id' => $gift,
        ]);
        $this->data->gift = $gift = $index->gift;
        $this->data->center = $gift->region;
        return $this->view($request, 'dashboard.gifts.create');
    }
}
