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
        $headers = array_merge(apache_request_headers(), ['authorization' => 'Bearer '. User::token()]);
        $headers = array_filter($headers, function($value, $key){
            $deny = ['host', 'content-type', 'content-length'];
            if(in_array(strtolower($key), $deny)){
                return false;
            }
            return true;
        },ARRAY_FILTER_USE_BOTH);
        $response = Http::withOptions([
            'verify' => false
        ])
        ->timeout(20)
        ->withHeaders(
            $headers
        )->withBody($json, 'application/json')->post(env('GRAPH_URL'));
        $result = $response->object(false);
        if(isset($result->errors) || isset($result->exception)){
            if(isset($result->errors)){
                $first = $result->errors[0];
                if($first->extensions->category == 'authorization'){
                    abort(403, $first->message);
                }
                if($first->extensions->category == 'custom'){
                    abort(422, $first->message);
                }
                dd($first);
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
