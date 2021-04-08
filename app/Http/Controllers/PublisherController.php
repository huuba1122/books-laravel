<?php

namespace App\Http\Controllers;

use App\Http\Services\PublisherService;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    protected $publisherService;
    public function __construct(PublisherService $publisherService)
    {
        $this->publisherService = $publisherService;
    }

    function index()
    {
        $publishers = $this->publisherService->getAll();
        return view('admin.publisher.index', compact('publishers'));
    }

    function create()
    {

    }

    function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->publisherService->store($request);
        return redirect()->route('publisher.index');
    }

    function edit($id)
    {
        $publisher = $this->publisherService->findById($id);
        return view('admin.publisher.edit', compact('publisher'));
    }

    function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->publisherService->update($id, $request);
        return redirect()->route('publisher.index');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $this->publisherService->delete($id);
        return redirect()->route('publisher.index');
    }
}
