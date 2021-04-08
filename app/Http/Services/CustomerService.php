<?php


namespace App\Http\Services;


use App\Http\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepo;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

    function getAll()
    {
        return $this->customerRepo->getAll();
    }

    function findById($id)
    {
        return $this->customerRepo->findById($id);
    }
}
