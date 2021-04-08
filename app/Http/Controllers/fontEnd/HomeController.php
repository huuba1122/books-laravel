<?php

namespace App\Http\Controllers\fontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterCustomerRequest;
use App\Http\Services\frontEnd\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $homeService;
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    function index()
    {
//        return view('frontEnd.master');
        $books = $this->homeService->getAll();
        return view('frontEnd.books.home', compact('books'));
    }

    function loginCustomer()
    {
        return view('frontEnd.login');
    }

    function checkLogin(Request $request)
    {
        dd($request->all());
    }

    function showFormRegister()
    {
        return view('frontEnd.register');
    }
    function register(RegisterCustomerRequest $request)
    {
        dd($request->all());
    }
}
