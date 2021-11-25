<?php
namespace App\Graphql;

use App\User;
use Illuminate\Support\Facades\Http;

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
        ])->withBody($json, 'application/json')->post('http://graph.local/graphql');
        $result = $response->object(false);
        if(isset($result->errors)){
            dd($result->errors);
        }
        return $result->data;
    }
}
