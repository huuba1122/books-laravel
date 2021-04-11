<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionUser('list_product');
    }


    public function create(User $user)
    {
        return $user->checkPermissionUser('add_product');
    }


    public function update(User $user)
    {
        return $user->checkPermissionUser('edit_product');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionUser('delete_product');
    }


    public function restore(User $user, Book $book)
    {
        //
    }


    public function forceDelete(User $user, Book $book)
    {
        //
    }
}
