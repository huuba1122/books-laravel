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
    @include('admin.layout.content-header',['name' => 'Orders', 'key' => 'list'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                <tr role="row">
                                                    <th >#</th>
                                                    <th >Order code</th>
                                                    <th >Customer</th>
                                                    <th >Price</th>
                                                    <th >Status</th>
                                                    <th >Oder date</th>
                                                    @can('delete_order')
                                                    <th >Action</th>
                                                    @endcan
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $key => $order)
                                                    <tr >
                                                        <td  class="dtr-control sorting_1" tabindex="0">{{ $key + $orders->firstItem() }}</td>
                                                        <td><a href="{{route('orders.detail', $order->id)}}">OD - {{$order->id}}</a></td>
                                                        <td>{{$order->customer->name}}</td>
                                                        <td>{{number_format($order->price, 0, '.', ',')}}</td>
                                                        <td>{{$order->status->name}}</td>
                                                        <td>{{$order->order_date}}</td>
                                                       @can('delete_order')
                                                        <td>
                                                            <div  style="display: inline-flex">
                                                                <div style="margin: 0 10px">
                                                                    <a href="{{route('orders.delete', $order->id)}}" onclick="return confirm('Are you sure delete Order Id:  {{$order->id}}  ?')" style="color: red">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endcan
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item ">
                                                {{ $orders->links() }}
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
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

