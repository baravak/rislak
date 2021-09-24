<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

class Billing extends API
{
    public $with = [
        'user' => User::class,
        'creditor' => Treasury::class,
        'debtor' => Treasury::class,
        'session' => Session::class,
    ];
    public $casts = [
        'settled_at' => 'datetime'
    ];
    public static function doFinal($id, array $params = [])
    {
        return (new static)->cache('billings/' . $id .'/final' , $params, 'POST');
    }

    public static function settled($id, array $params = [])
    {
        return (new static)->cache('billings/' . $id .'/settled' , $params, 'POST');
    }

    public static function _childPost($id, array $params = [])
    {
        return (new static)->execute('billings/' . $id  , $params, 'POST');
    }

    public function setRoutes($attributes){
        return null;
        foreach (['index', 'show'] as $value) {
            $route = 'dashboard.' . ($this->routeResource ?: $this->getTable()) . '.' . $value;

            if(Route::has($route)){
                $this->route[$value] = urldecode(route($route, !in_array($value, ['index', 'create', 'store']) ? [Str::singular($this->routeResource ?: $this->getTable()) => $attributes['id']] : null));
            }
        }
    }
    public static function room($room, array $params)
    {
        $store = new static;
        return $store->execute(sprintf("rooms/%s/billings", $room ?: '-'), $params, 'get');
    }

    public function parentClass($parent)
    {
        switch($parent){
            case 'room' : return Room::class;
        }
    }
}
