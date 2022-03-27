<?php
namespace App;

use GuzzleHttp\Psr7\Request;

class Sample extends API
{
    public $endpointPath = '$/samples';
    public $with = [
        'user' => User::class,
        'client' => User::class,
        'room' => Room::class,
        'case' => TherapyCase::class,
        'profiles' => File::class,
        'chain' => SampleChain::class
    ];

    public $filterWith = [
        'room' => Room::class
    ];
    public static function postItems($serial, $items)
    {
        return (new static)->execute("%s/$serial/items", $items, 'POST');
    }

    public static function close($serial)
    {
        return (new static)->execute("%s/$serial/close", [], 'PUT');
    }

    public static function open($serial)
    {
        return (new static)->execute("%s/$serial/open", [], 'PUT');
    }

    public static function scoring($serial)
    {
        return (new static)->execute("%s/$serial/scoring", [], 'POST');
    }

    public static function _form($serial)
    {
        return (new static)->execute("%s/$serial", [], 'GET');
    }

    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }

    public static function statusCheck(array $ids){
        return (new static)->execute("/live/samples-status-check", ['samples' => $ids], 'GET');
    }

    public static function purchase(String $id, array $params = []){
        return (new static)->execute("%s/$id/purchase", $params, 'POST');
    }
}
