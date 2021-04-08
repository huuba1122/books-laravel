<?php

namespace App\Http\Controllers;

use App\Http\Services\StatusService;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    protected $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    function index()
    {
        $statuses = $this->statusService->getAll();
        return view('admin.status.index', compact('statuses'));
    }

    function create()
    {

    }

    function store(Request $request)
    {
        $this->statusService->store($request);
        return back();
    }

    function edit($id)
    {
        $status = $this->statusService->findById($id);
        return view('admin.status.edit', compact('status'));
    }

    function update($id, Request $request)
    {
        $this->statusService->update($id, $request);

        return redirect()->route('status.index');
    }

    function delete($id)
    {
        $this->statusService->delete($id);
        return redirect()->route('status.index');
    }
}
