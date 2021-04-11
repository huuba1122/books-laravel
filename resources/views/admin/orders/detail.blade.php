



@extends('admin.master')

@section('title')
    Order manager
@endsection
@section('search')
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Orders', 'key' => 'detail'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Books Shop
                                        <small class="float-right">{{$order->order_date}}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <hr>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-6 invoice-col">
                                    <h3>To</h3>
                                    <address>
                                        <strong>{{$order->customer->name}}</strong><br>
                                        Address: {{$order->customer->address}}<br>
                                        <br>
                                        Phone: {{$order->customer->phone}}<br>
                                        Email: {{$order->customer->email}}
                                    </address>
                                </div>

                                <div class="col-sm-6 invoice-col">
                                    <form action="{{route('orders.update', $order->id)}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <h3>Invoice</h3>
                                        </div>
                                        <div class="form-group">
                                                <label>Order ID</label>
                                            <p>{{$order->id}}</p>
{{--                                            <input type="hidden" name="order_id" value="{{$order->id}}">--}}
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="row">
                                                <div>
                                                    <select name="status_id" class="form-control form-control-sm" style="width: 100px">
                                                        @foreach($statuses as $status)
                                                            <option
                                                            @if($status->id == $order->status_id)
                                                                selected
                                                                @endif
                                                                value="{{$status->id}}"
                                                            >{{$status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div style="margin-left: 50px">
                                                    <button class="btn-sm btn-primary">update</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row mt-3">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Sub price</th>
                                            <th>Order date</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Sub price</th>
                                            <th>Order date</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($orderDetails as $key => $orderDetail)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$orderDetail->name}}</td>
                                            <td>{{$orderDetail->quantity}}</td>
                                            <td>{{number_format($orderDetail->price)}}</td>
                                            <td>{{$orderDetail->order_date}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
{{--                            <div class="row no-print">--}}
{{--                                <div class="col-12">--}}
{{--                                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>--}}
{{--                                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit--}}
{{--                                        Payment--}}
{{--                                    </button>--}}
{{--                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">--}}
{{--                                        <i class="fas fa-download"></i> Generate PDF--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <!-- /.invoice -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('js')
@endsection



