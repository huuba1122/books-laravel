<?php


namespace App\Http\Repositories;


use App\Models\Order;

class OrderRepository
{
    function getAll()
    {
        return Order::orderBy('id')->paginate(5);
    }

    function findById($id)
    {
        return Order::findOrFail($id);
    }


}
