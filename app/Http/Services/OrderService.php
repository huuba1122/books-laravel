<?php


namespace App\Http\Services;


use App\Http\Repositories\OrderRepository;

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


}
