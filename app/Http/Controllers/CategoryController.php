<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    function index()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.categories.list', compact('categories'));
    }

    function create()
    {

    }

    function store(Request $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('category.index');
    }

    function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('admin.categories.edit', compact('category'));
    }

    function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->categoryService->update($id, $request);
        return redirect()->route('category.index');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $this->categoryService->delete($id);
        return redirect()->route('category.index');
    }
}
