<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GiftPolicy
{
    use HandlesAuthorization;

    public function create(User $user, $region)
    {
        if($user->type == 'admin') return true;
        if($region->acceptation && in_array($region->acceptation->position, ['manager', 'operator'])) return true;
    }
}
