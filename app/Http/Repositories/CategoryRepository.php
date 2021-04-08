<?php


namespace App\Http\Repositories;


use App\Models\Category;

class CategoryRepository
{
    function getAll()
    {
        return Category::paginate(5);
    }

    function getInstance()
    {
        return new Category();
    }

    function findById($id)
    {
        return Category::findOrFail($id);
    }

    function store($category)
    {
        $category->save();
    }

    function update($category)
    {
        $category->update();
    }

    function delete($category)
    {
        $category->delete();
    }
}
