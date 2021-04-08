<?php


namespace App\Http\Repositories;


use App\Models\Status;

class StatusRepository
{
    function getAll()
    {
        return Status::all();
    }

    function getIstance(): Status
    {
        return new Status();
    }

    function findById($id)
    {
        return Status::findOrFail($id);
    }

    function store($status)
    {
        $status->save();
    }

    function update($status)
    {
        $status->update();
    }

    function delete($status)
    {
        $status->delete();
    }
}
