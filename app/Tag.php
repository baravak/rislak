<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends API
{
    public $with = [
        'user' => User::class,
        'center' => Center::class
    ];

    public static function _roomSettings($room, array $params = [])
    {
        $settings = new static;
        $settings->parent = Room::class;
        return $settings->execute(sprintf("rooms/%s/settings/pinned-tags", $room ?: '-'), $params, 'GET');
    }
    public static function _roomSettingsUpdate($room, array $params = [])
    {
        $settings = new static;
        $settings->parent = Room::class;
        return $settings->execute(sprintf("rooms/%s/settings/pinned-tags", $room ?: '-'), $params, 'PUT');
    }
}
