<?php
namespace App\Graphql;

use App\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Client{
    public static function query(String $query, $variable = []): object
    {
        $json = json_encode([
            'operationName' => null,
            'query' => $query,
            'variables' => $variable
        ]);
        $response = Http::withOptions([
            'verify' => false
        ])
        ->withHeaders([
            'authorization' => 'Bearer '. User::token()
        ])->withBody($json, 'application/json')->post(env('GRAPH_URL'));
        $result = $response->object(false);
        if(isset($result->errors) || isset($result->exception)){
            if(isset($result->errors)){
                $first = $result->errors[0];
                if($first->extensions->category == 'authorization'){
                    abort(403, $first->message);
                }
                abort(500, $first->message);
            }
        }elseif(!$result){
            echo $response->body();
            exit();
        }
        $model = new Result($result->data);
        return $model;
    }
}
