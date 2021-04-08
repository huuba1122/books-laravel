<?php

namespace App\Http\Controllers;

use App\Http\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    function index()
    {
        $permissions = $this->permissionService->getAll();
        return view('admin.permissions.list', compact('permissions'));
    }

    function create()
    {
        return view('admin.permissions.add');
    }

    function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->permissionService->store($request);
        return redirect()->route('permissions.list');
    }

    function edit($id)
    {
        $permissions = $this->permissionService->getAll();
        return view('admin.permissions.edit', compact( 'permissions'));
    }

    function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->permissionService->update($id, $request);
        return redirect()->route('permissions.list');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $this->permissionService->delete($id);
        return redirect()->route('permissions.list');
    }
}
