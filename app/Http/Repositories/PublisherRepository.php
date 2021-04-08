<?php


namespace App\Http\Repositories;


use App\Models\Publisher;

class PublisherRepository
{
    function getAll()
    {
        return Publisher::all();
    }

    function getInstance(): Publisher
    {
        return new Publisher();
    }

    function findById($id)
    {
        return Publisher::findOrFail($id);
    }

    function store($publisher)
    {
        $publisher->save();
    }

    function update($publisher)
    {
        $publisher->update();
    }

    function delete($publisher)
    {
        $publisher->delete();
    }
}
