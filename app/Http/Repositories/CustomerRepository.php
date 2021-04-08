<?php


namespace App\Http\Repositories;


use App\Models\Customer;

class CustomerRepository
{
    function getAll()
    {
        return Customer::orderBy('name')->paginate(5);
    }

    function findById($id)
    {
        return Customer::findOrFail($id);
    }


}
