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
        $response = Http::withHeaders([
            'authorization' => 'Bearer '. User::token()
        ])->withBody($json, 'application/json')->post(env('GRAPH_URL'));
        $result = $response->object(false);
        if(isset($result->errors)){
            dd($result->errors);
        }
        $model = new Result($result->data);
        return $model;
    }
}
