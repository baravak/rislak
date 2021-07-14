<?php

namespace App\Http\Controllers\Dashboard;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::apiIndex($request->all());
        if($request->header('data-xhr-base')){
            return $tags->map(function($tag){
                return [
                    'id' => $tag->id,
                    'title' => $tag->title
                ];
            });
        }
        return $tags;
    }

    public function roomSetting(Request $request, $room){
        $this->data->tags = $tags = Tag::apiRoomSettings($room, $request->all());
        $this->data->room = $room = $tags->parentModel;
        $this->data->center = $room->center;
        return $this->view($request, 'dashboard.rooms.settings.tags');
    }

    public function roomSettingUpdate(Request $request, $room){
        $tags = Tag::apiRoomSettingsUpdate($room, $request->all());
    }
}
