<?php


namespace App\Http\Services;


use App\Http\Repositories\PublisherRepository;

class PublisherService
{
    protected $PublisherRepo;
    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->PublisherRepo = $publisherRepository;
    }

    function getAll()
    {
        return $this->PublisherRepo->getAll();
    }

    function findById($id)
    {
        return $this->PublisherRepo->findById($id);
    }

    function store($request)
    {
        $publisher = $this->PublisherRepo->getInstance();
        $publisher->name = $request->name;
        $this->PublisherRepo->store($publisher);
    }

    function update($id, $request)
    {
        $publisher = $this->PublisherRepo->findById($id);
        $publisher->name = $request->name;
        $this->PublisherRepo->update($publisher);
    }

    function delete($id)
    {
        $publisher = $this->PublisherRepo->findById($id);
        $this->PublisherRepo->delete($publisher);
    }
}
