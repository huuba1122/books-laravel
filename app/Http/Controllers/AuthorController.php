<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\SearchAuthorRequest;
use App\Http\Services\AuthorService;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    protected $authorService;
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    function index()
    {
        $authors = $this->authorService->getAll();
       return view('admin.authors.index', compact('authors'));
    }

    function create()
    {

    }

    function store(CreateAuthorRequest $request): \Illuminate\Http\JsonResponse
    {
        $author = $this->authorService->store($request);
        if ($author){
            $authors = $this->authorService->getAll();
            $dataResponse = view('admin.authors.list',compact('authors'))->render();
            return Response::json($dataResponse);
        }else{

            return Response::json([
                'error'=>'them tac gia khong thanh cong'
            ]);
        }
    }

    function edit($id): \Illuminate\Http\JsonResponse
    {
        $author = $this->authorService->findById($id);
        return Response::json($author);
    }

    function update(CreateAuthorRequest $request, $id): \Illuminate\Http\JsonResponse
    {
//        dd([$request->all(), $id]);
        $author = $this->authorService->update($request, $id);
        if ($author){
//            $author = $this->authorService->findById($id);
//            return Response::json($author);
            $authors = $this->authorService->getAll();
            $dataResponse = view('admin.authors.list',compact('authors'))->render();
            return Response::json($dataResponse);
        }

    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $this->authorService->delete($id);
        return redirect()->route('author.index');
    }

    function search(SearchAuthorRequest $request)
    {
        $search =$request->search_author;
//        $authors = Author::where('name' , 'LIKE', "%$search%")->paginate(5);
        $authors = $this->authorService->search($request);
        return view('admin.authors.index', compact('authors','search'));
    }
}
