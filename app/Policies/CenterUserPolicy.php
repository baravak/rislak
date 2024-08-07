<?php

namespace App\Policies;

use App\Center;
use App\CenterUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CenterUserPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user, Center $center)
    {
        return $user->isAdmin() || ($center->acceptation && in_array($center->acceptation->position, ['manager', 'operator']));
    }
    public function update(User $user, CenterUser $centerUser, $option = null){
        $center = $centerUser->parentModel;
        $acceptation = $center->acceptation;
        if($center->acceptation && !$user->isAdmin()){
            if($centerUser->id == $center->acceptation->id){
                return false;
            }
        }
        if ($center->manager->id == $centerUser->id) {
            return false;
        }

        if(!$user->isAdmin() && (!$acceptation || !in_array($acceptation->position, ['manager', 'operator'])))
        {
            return false;
        }
        if ($center->type == 'personal_clinic' && $option == 'position')
        {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }
        if($center->acceptation && $center->manager->id == $center->acceptation->id){
            return true;
        }

        if($centerUser->position == 'manager')
        {
            return false;
        }
        if ($centerUser->position != 'client' && $acceptation->position != 'manager') {
            return false;
        }
        if($option == 'position' && $acceptation->position != 'manager')
        {
            return false;
        }

        return true;
    }

    public function create(User $user, Center $center){
        if($user->isAdmin())
        {
            return true;
        }
        if(!$center->acceptation)
        {
            return false;
        }
        if(in_array($center->acceptation->position, ['manager', 'operator']))
        {
            return true;
        }
        return false;
    }
    public function accept(User $user, CenterUser $cUser, Center $center){
        if($user->isAdmin() || $user->centers->whereIn('acceptation.position', ['operator', 'manager'])->where('id', $center->id)->count()){
            if($cUser->kicked_at || !$cUser->accepted_at){
                return true;
            }
        }
        return false;
    }
    public function kick(User $user, CenterUser $cUser, Center $center){
        if($cUser->id == $center->manager->id) return false;
        if(!$cUser->kicked_at){
            if($user->isAdmin() || $center->manager->user_id == $user->id) return true;
            if($user->centers->where('acceptation.position', 'manager')->where('id', $center->id)->count() && $cUser->position != 'manager') return true;
            if($user->centers->where('acceptation.position', 'operator')->where('id', $center->id)->count() && $cUser->position == 'client') return true;
        }
        return false;
    }
}
