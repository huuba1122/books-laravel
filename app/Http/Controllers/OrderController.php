<?php

namespace App\Http\Controllers;

use App\Http\Services\OrderService;
use App\Http\Services\StatusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderService;
    protected $statusService;
    public function __construct(OrderService $OrderService, StatusService $statusService)
    {
        $this->orderService = $OrderService;
        $this->statusService = $statusService;
    }

    function index()
    {
        $orders = $this->orderService->getAll();
        return view('admin.orders.list', compact('orders'));

    }

    function detail($id)
    {
        $order = $this->orderService->findById($id);
        $statuses = $this->statusService->getAll();
        $orderDetails = DB::table('orders')
            ->join('orderdetails', 'orders.id', '=', 'orderdetails.order_id')
            ->join('books', 'books.id', '=', 'orderdetails.book_id')
            ->where('orders.id','=',$id)
            ->select('orders.order_date', 'books.name', 'orderdetails.*')
            ->get();
//        dd($orderDetails);
        return view('admin.orders.detail', compact('order', 'statuses','orderDetails'));

    }

    function edit($id)
    {


    }

    function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->orderService->update($id, $request);
        toastSuccess('Update status order successfully');
        return back();
    }


    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $this->orderService->delete($id);

        return redirect()->route('orders.index');
    }
}
