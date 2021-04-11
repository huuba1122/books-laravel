@extends('admin.master')

@section('title')
    Books detail
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Book', 'key' => 'detail'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="row">
                                <aside class="col-sm-3" style="margin: auto">
                                    <article class="gallery-wrap" >
                                        <div class="img-big-wrap" >
                                            <div><img src="{{'/storage/'. $book->image}}" style="object-fit: cover" height="400px"></div>
                                        </div> <!-- slider-product.// -->
{{--                                        <div class="img-small-wrap">--}}
{{--                                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
{{--                                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
{{--                                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
{{--                                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
{{--                                        </div> <!-- slider-nav.// -->--}}
                                    </article> <!-- gallery-wrap .end// -->
                                </aside>
                                <aside class="col-sm-8 border-left">
                                    <article class="card-body p-5">
                                        <h3 class="title mb-3 text-primary">{{$book->name}}</h3>
                                        <dl class="item-property">
                                            <dt class="text-primary">ISBN</dt>
                                            <dd>{{$book->isbn}}</dd>
                                            <dt class="text-primary">Authors</dt>
                                            <dd>
                                                <p>
                                                    @foreach($book->authors as $author)
                                                        {{$author->name . ', '}}
                                                    @endforeach
                                                </p>
                                            </dd>
                                            <dt class="text-primary">Category</dt>
                                            <dd>{{$book->category->name ?? ''}}</dd>
                                            <dt class="text-primary">Publisher</dt>
                                            <dd>{{$book->publisher->name ?? ''}}</dd>
                                            <dt class="text-primary">Page number</dt>
                                            <dd>{{$book->page_number}}</dd>
                                            <dt class="text-primary">Height</dt>
                                            <dd>{{$book->height}}</dd>
                                            <dt class="text-primary">Price</dt>
                                            <dd>{{$book->price}}</dd>
                                        </dl>
                                    </article> <!-- card-body.// -->
                                </aside> <!-- col.// -->
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <h4 class="text-primary">Content</h4>
                                <div style=" margin-left: 25px">
                                    <p>
                                        {!! $book->des ?? ' ' !!}
                                    </p>
                                </div>
                            </div>
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
