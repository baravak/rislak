<?php

namespace App\Policies;

use App\Room;
use App\User;
use App\Session;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
{
    use HandlesAuthorization;

    public function update(User $user, $session, $mode = null){
        if(isset($session->case->room)){
            $room = $session->case->room;
        }elseif(isset($session->parentModel) && $session->parentModel instanceof Room){
            $room = $session->parentModel;
        }else{
            $room = isset($session->parentModel) ? $session->parentModel->room : $session->room;
        }
        if($room->acceptation && $room->acceptation->position == 'manager'){
            return true;
        }
        if($mode == 'report'){
            if($room->acceptation && $room->acceptation->position == 'manager'){
                return true;
            }
            return false;
        }
        if($user->isAdmin()){
            return true;
        }
        if(isset($session->case)){
            if($room->manager->id == $user->id){
                return true;
            }
        }
        if($user->centers && $user->centers->where('id', $room->center->id)->whereIn('acceptation.position', ['operator', 'manager'])->count()){
            return true;
        }
        return false;
    }

    public function create(User $user)
    {
        if($user->isAdmin()){
            return true;
        }
        if($user->centers && $user->centers->whereIn('acceptation.position', ['operator', 'manager', 'psychologsit'])->count()){
            return true;
        }
    }

    public function addUser(User $user, Session $session){
        if($session->case){
            if($session->case->clients && $session->case->clients->count() && (!$session->clients || $session->clients->where('position', 'client')->count() != $session->case->clients->count())){
            }else{
                return false;
            }
        }
        if($user->isAdmin()){
            return true;
        }

        if(isset($session->case)){
            if($session->room->manager->user_id == $user->id){
                return true;
            }
        }
        if($user->centers && $user->centers->where('id', $session->room->center->id)->whereIn('acceptation.position', ['operator', 'manager'])->count()){
            return true;
        }
    }

    public function manager(User $user, $session, $mode = null){
        if(isset($session->case->room)){
            $room = $session->case->room;
        }elseif(isset($session->parentModel) && $session->parentModel instanceof Room){
            $room = $session->parentModel;
        }else{
            $room = isset($session->parentModel) ? $session->parentModel->room : $session->room;
        }

        if($user->isAdmin()){
            return true;
        }
        if($room->manager->id == $user->id){
            return true;
        }
        $center = $room->center ? $room->center : $room;
        if($user->centers && $user->centers->where('id', $center->id)->whereIn('acceptation.position', ['operator', 'manager'])->count()){
            return true;
        }
        return false;
    }

    public function booking(User $user, Session $session, $justUser = false){
        if($session->status != 'registration_awaiting'){
            return false;
        }
        if($justUser && $this->manager($user, $session)){
            return false;
        }
        return true;
    }

}
