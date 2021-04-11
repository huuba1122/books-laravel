<?php


namespace App\Http\Services;


use App\Http\Repositories\OrderRepository;
use App\Models\Order;

class OrderService
{
    protected $OrderRepo;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->OrderRepo = $orderRepository;
    }

    function getAll()
    {
        return $this->OrderRepo->getAll();
    }


    function findById($id)
    {
        return $this->OrderRepo->findById($id);
    }

    function update($id, $request)
    {
        $order = $this->OrderRepo->findById($id);
        $order->status_id = $request->status_id;
        $this->OrderRepo->update($order);
    }

    function delete($id)
    {
        $order = $this->OrderRepo->findById($id);
        $this->OrderRepo->delete($order);
    }

}
