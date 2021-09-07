<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillingPolicy
{
    use HandlesAuthorization;

    public function pay(User $user,$billing){
        if($billing->type == 'final') return false;

        if($user->treasuries->where('id', $billing->debtor->id)->first()){
            return true;
        }
        return false;
    }
}
