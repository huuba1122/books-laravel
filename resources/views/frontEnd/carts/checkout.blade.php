@extends('frontEnd.master')

@section('title')
    Checkout
@section('CSS')
    <style>
        .login__form:after{
            display: none;
        }
    </style>
@endsection
@section('search')
    <li>
        <div style="width: 200px"></div>
    </li>
@endsection
@section('content')

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{asset('/frontEnd/img/normal-breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Checkout</h2>
                        <p>Welcome to the official BooksShop.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Customer information</h3>
                        <form action="{{route('home.checkout')}}" method="post">
                            @csrf
                            <div class="input__item">
                                <input name="name" type="text" placeholder="Username" value="{{$customer->name}}"
                                       class="form-control">

                            </div>
                            <div class="input__item">
                                <input name="email" type="email" placeholder="Email address" value="{{$customer->email}}"
                                       class="form-control ">
                            </div>
                            <div class="input__item">
                                <input name="address" type="text" placeholder="address" value="{{$customer->address}}"
                                       class="form-control">
                            </div>
                            <div class="input__item">
                                <input name="phone" type="number" placeholder="phone" value="{{$customer->phone}}"
                                       class="form-control">
                            </div>
                            <button type="submit" class="site-btn">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Cart information</h3>
                        <table class="table table-bordered" style="background-color: white">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts->items as $key => $item)
                            <tr>
                                <th scope="row">{{$item['product']->name}}</th>
                                <td>{{$item['totalQuantity']}}</td>
                                <td>{{number_format($item['totalPrice'])}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th scope="row">Total Quantity</th>
                                <td colspan="2">{{number_format($carts->totalQuantity)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Total Price</th>
                                <td colspan="2">{{number_format($carts->totalPrice)}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
@endsection

@section('js')

@endsection

