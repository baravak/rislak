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
}
