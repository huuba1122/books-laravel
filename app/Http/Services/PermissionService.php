<?php


namespace App\Http\Services;


use App\Http\Repositories\PermissionRepository;

class PermissionService
{
    protected $permissionRepo;
    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepo =$permissionRepo;
    }

    function getAll()
    {
        return $this->permissionRepo->getAll();
    }

    function getPermissionsParent()
    {
        return $this->permissionRepo->getPermissionsParent();
    }

    function findById($id)
    {
        return $this->permissionRepo->findById($id);
    }

    function store($request)
    {
        $permission = $this->permissionRepo->getInstance();
        $permission->fill($request->all());
        $this->permissionRepo->store($permission);
    }

    function update($id, $request)
    {
        $permission = $this->permissionRepo->findById($id);
        $permission->fill($request->all());
        $this->permissionRepo->update($permission);
    }

    function delete($id)
    {
        $permission = $this->permissionRepo->findById($id);
        $this->permissionRepo->delete($permission);
    }
}
