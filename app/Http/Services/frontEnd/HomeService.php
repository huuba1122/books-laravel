<?php


namespace App\Http\Services\frontEnd;


use App\Http\Repositories\frontEnd\HomeRepository;

class HomeService
{
    protected $homeRepo;
    public function __construct(HomeRepository $homeRepository)
    {
        $this->homeRepo = $homeRepository;
    }

    function getAll()
    {
        return $this->homeRepo->getAll();
    }
}
