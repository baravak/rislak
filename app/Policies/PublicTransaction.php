<?php

namespace App\Policies;

use App\Transaction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class PublicTransaction
{
    use HandlesAuthorization;

    public function creditor(User $user, $transaction, $center){
        if($transaction->type != 'creditor') return;
        if(!$user->centers) return false;
        $center = $user->centers->where('id', $center->id)->first();
        if(!$center || !$center->treasuries) return;
        return $center->treasuries->where('id', $transaction->creditor->id)->first();
    }
}
