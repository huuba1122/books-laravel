<?php


namespace App\Http\Services;


use App\Http\Repositories\BookRepository;
use Illuminate\Support\Facades\Storage;

class BookService extends BaseService
{
    protected $bookRepo;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepo = $bookRepository;
    }

    function getAll()
    {
        return $this->bookRepo->getAll();
    }

    function findById($id)
    {
        return $this->bookRepo->findById($id);
    }

    function store($request)
    {
        $book = $this->bookRepo->getInstance();
        if ($request->hasFile('image')) {
            $path =$this->updateLoadFile($request,'image','book-images');
            $book->image = $path;
        }
        $book->fill($request->all());
        $authorsId = $request->author_id;
        $this->bookRepo->store($book, $authorsId);
    }

    function update($id, $request)
    {
        $book = $this->bookRepo->findById($id);
        $oldImage = $book->image;
        if ($request->hasFile('image')) {
            $path =$this->updateLoadFile($request,'image','book-images');
            Storage::disk('public')->delete($oldImage);
            $book->image = $path;
        }
        $book->fill($request->all());
        $authorsId = $request->author_id;
        $this->bookRepo->update($book, $authorsId);
    }

    function delete($id)
    {
        $book = $this->bookRepo->findById($id);
        $this->bookRepo->delete($book);
    }

    function search($request)
    {
        $search = $request->search_book;
        return $this->bookRepo->search($search);
    }

}
