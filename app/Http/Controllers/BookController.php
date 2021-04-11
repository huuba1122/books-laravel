<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Services\AuthorService;
use App\Http\Services\BookService;
use App\Http\Services\CategoryService;
use App\Http\Services\PublisherService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;
    protected $authorService;
    protected $categoryService;
    protected $publisherService;

    public function __construct(BookService $bookService, AuthorService $authorService, CategoryService $categoryService, PublisherService $publisherService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
        $this->categoryService = $categoryService;
        $this->publisherService = $publisherService;
    }

    function search(Request $request)
    {
        $books = $this->bookService->search($request);
        return view('admin.book.list', compact('books'));
    }

    function index()
    {
        $books = $this->bookService->getAll();

        return view('admin.book.list', compact('books'));
    }

    function create()
    {
        $authors = $this->authorService->index();
        $categories = $this->categoryService->getAll();
        $publishers =$this->publisherService->getAll();

        return view('admin.book.add', compact('authors', 'categories','publishers'));
    }

    function store(CreateBookRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->bookService->store($request);
        toastSuccess('add book successfully');
        return redirect()->route('book.index');
    }

    function edit($id)
    {
        $book = $this->bookService->findById($id);
        $authors = $this->authorService->index();
        $categories = $this->categoryService->getAll();
        $publishers =$this->publisherService->getAll();
        return view('admin.book.edit', compact('book', 'authors', 'categories', 'publishers'));
    }

    function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->bookService->update($id, $request);

        toastSuccess('Update successfully ');
        return redirect()->route('book.index');
    }

    function detail($id)
    {
        $book = $this->bookService->findById($id);
        return view('admin.book.detail' , compact('book'));
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $this->bookService->delete($id);

        toastWarning('Delete Successfully');
        return redirect()->route('book.index')->with('message','Delete Successfully');
    }

}
