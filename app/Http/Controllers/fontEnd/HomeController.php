<?php

namespace App\Http\Controllers\fontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterCustomerRequest;
use App\Http\Services\CustomerService;
use App\Http\Services\frontEnd\HomeService;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $homeService;
    protected $customerService;

    public function __construct(HomeService $homeService, CustomerService $customerService)
    {
        $this->homeService = $homeService;
        $this->customerService = $customerService;
    }

    function index()
    {
        $books = $this->homeService->newBooks();
        $booksOrderByName = $this->homeService->booksOrderByName();
        return view('frontEnd.books.home', compact('books', 'booksOrderByName'));
    }

    function loginCustomer()
    {
        return view('frontEnd.login');
    }

    function checkLogin(Request $request)
    {
//        dd($request->all());
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication was successful...
//            dd(Auth::guard('customer')->user());
            return redirect()->route('home.index')->with('message', 'Login successfully');
        } else {

            Session::flash('error', 'Email or password not correct');
            return redirect()->route('home.login')->with('error', 'Email or password not correct');
        }
    }

    function logout()
    {
        if (Auth::guard('customer')->user()) {
            Auth::guard('customer')->logout();
            return redirect()->route('home.login');
        } else {
            return redirect()->route('home.login');
        }
    }

    function showFormRegister()
    {
        return view('frontEnd.register');
    }

    function register(RegisterCustomerRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->customerService->store($request);
        return redirect()->route('home.index')->with('message', 'Register successfully');
    }

    function showFormCheckOut()
    {
        $customer = Auth::guard('customer')->user();
        $carts = Session::get('cart');
        if ($carts && $customer) {
            return view('frontEnd.carts.checkout', compact('carts', 'customer'));
        } else {
            toastInfo('Please! Login to checkout...');
            return redirect()->route('home.login');
        }
    }

    function checkout(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        $carts = Session::get('cart');
        if ($customer) {
            DB::beginTransaction();
            try {
                $order = new Order();
                $order->customer_id = $customer->id;
                $order->order_date = date('Y-m-d');
                $order->status_id = 7;
                $order->price = $carts->totalPrice;
                $order->save();
                foreach ($carts->items as $key => $item) {
                    $orderDetail = new Orderdetail();
                    $orderDetail->order_id = $order->id;
                    $orderDetail->book_id = $key;
                    $orderDetail->quantity = $item['totalQuantity'];
                    $orderDetail->price = $item['totalPrice'];
                    $orderDetail->save();
                }
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                dd($exception->getMessage());
            }
            Session::forget('cart');
        }
        toastSuccess('Checkout successfully, Your order is processing');
        return redirect()->route('home.index');
    }

    function searchBook(Request $request)
    {
        $books = $this->homeService->searchBooks($request);
        return view('frontEnd.books.search', compact('books'));
    }

    function bookDetail($id)
    {
        $book = $this->homeService->findById($id);
        return view('frontEnd.books.book-detail', compact('book'));
    }

    function viewAll()
    {
        $books = $this->homeService->getAll();
        return view('frontEnd.books.view-all', compact('books'));
    }

    function getBooksOfCategory($id)
    {
       $books = $this->homeService->getBooksOfCategory($id);
       if (!empty($books)){
           return view('frontEnd.books.view-all', compact('books'));
       }else{
           return redirect()->route('home.index');
       }
    }
}
