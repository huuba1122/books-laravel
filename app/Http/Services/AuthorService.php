<?php


namespace App\Http\Services;


use App\Http\Repositories\AuthorRepository;

class AuthorService
{
    protected $authorRepo;
    public function __construct(AuthorRepository $authorRepo)
    {
        $this->authorRepo = $authorRepo;
    }

    function getAll()
    {
        return $this->authorRepo->getAll();
    }

    function index()
    {
        return $this->authorRepo->index();
    }

    function findById($id)
    {
        return $this->authorRepo->findById($id);
    }

    function store($request)
    {
        $author = $this->authorRepo->getInstance();
        $author->name = $request->name;
        return $this->authorRepo->store($author);

    }

    function update($request, $id)
    {
        $author = $this->authorRepo->findById($id);
        $author->name = $request->name;
        return $this->authorRepo->update($author);
    }

    function delete($id)
    {       $author = $this->authorRepo->findById($id);
            $this->authorRepo->delete($author);
    }

    function search($request)
    {
        $search = $request->search_author;
        return $this->authorRepo->search($search);
    }
}
