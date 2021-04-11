<?php


namespace App\Http\Repositories;


use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    function getAll()
    {
        return Order::orderBy('id')->paginate(5);
    }

    function getInstance(): Order
    {
        return new Order();
    }

    function findById($id)
    {
        return Order::findOrFail($id);
    }

    function update($order)
    {
        $order->update();
    }

    function delete($order)
    {
        DB::beginTransaction();
        try {
            $order->books()->detach();
            $order->delete();
            DB::commit();
            toastWarning('Delete order successfully');
        }catch (\Exception $exception)
        {
            DB::rollBack();
            toastError('Delete order error');
            dd($exception->getMessage());
        }
    }

}
