<?php

namespace App\Policies;

use App\Models\Publisher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublisherPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user)
    {
        return $user->checkPermissionUser('list_publisher');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_publisher');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_publisher');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_publisher');
    }


    public function restore(User $user, Publisher $publisher)
    {
        //
    }


    public function forceDelete(User $user, Publisher $publisher)
    {
        //
    }
}
