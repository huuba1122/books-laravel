<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionUser('list_customer');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_customer');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_customer');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_customer');
    }


    public function restore(User $user, Customer $customer)
    {
        //
    }


    public function forceDelete(User $user, Customer $customer)
    {
        //
    }
}
