<?php


namespace App\Http\Repositories;


use App\Models\Author;

class AuthorRepository extends Repository
{
    function getAll()
    {
        return Author::orderBy('id', 'DESC')->paginate(10);
    }

    function index()
    {
        return Author::all();
    }

    function getInstance(): Author
    {
        return new Author();
    }

    function findById($id)
    {
        return Author::findOrFail($id);
    }

    function store($author)
    {
            return $author->save();
    }

    function update($author)
    {
        return $author->update();
    }

    function delete($author)
    {
        $author->delete();
    }

    function search($search)
    {
        return Author::where('name', 'LIKE', "%$search%")->paginate(5);
    }
}
