<?php


namespace App\Http\Services;


use App\Http\Repositories\CategoryRepository;

class CategoryService
{
    protected $CategoryRepo;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->CategoryRepo = $categoryRepository;
    }

    function getAll()
    {
        return $this->CategoryRepo->getAll();
    }

    function findById($id)
    {
        return $this->CategoryRepo->findById($id);
    }

    function store($request)
    {
        $category = $this->CategoryRepo->getInstance();
        $category->name = $request->name;
        $this->CategoryRepo->store($category);
    }

    function update($id, $request)
    {
        $category = $this->CategoryRepo->findById($id);
        $category->name = $request->name;
        $this->CategoryRepo->update($category);
    }

    function delete($id)
    {
        $category = $this->CategoryRepo->findById($id);
        $this->CategoryRepo->delete($category);
    }
}
