<?php


namespace App\Http\Repositories;


use App\Models\Permission;

class PermissionRepository
{
    function getAll()
    {
        return Permission::all();
    }

    function getPermissionsParent()
    {
        return Permission::where('parent_id',0)->get();
    }

    function findById($id)
    {
        return Permission::findOrFail($id);
    }

    function getInstance(): Permission
    {
        return new Permission();
    }

    function store($permission)
    {
        $permission->save();
    }

    function update($permission)
    {
        $permission->update();
    }


    function delete($permission)
    {
        $permission->delete();
    }

}
