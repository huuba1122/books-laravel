<?php


namespace App\Http\Services;


use App\Http\Repositories\StatusRepository;

class StatusService
{
    protected $statusRepo;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepo = $statusRepository;
    }

    function getAll()
    {
        return $this->statusRepo->getAll();
    }

    function findById($id)
    {
        return $this->statusRepo->findById($id);
    }

    function store($request)
    {
        $status = $this->statusRepo->getIstance();
        $status->name = $request->name;
        $this->statusRepo->store($status);
    }

    function update($id , $request)
    {
        $status = $this->statusRepo->findById($id);
        $status->name = $request->name;
        $this->statusRepo->update($status);
    }

    function delete($id)
    {
        $status = $this->statusRepo->findById($id);
        $this->statusRepo->delete($status);
    }
}
