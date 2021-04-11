<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionUser('list_order');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_order');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_order');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_order');
    }


    public function restore(User $user, Order $order)
    {
        //
    }


    public function forceDelete(User $user, Order $order)
    {
        //
    }
}
