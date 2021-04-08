@extends('admin.master')

@section('title')
    Create book
@endsection
@section('scss')
    <link rel="stylesheet" href="{{asset('/backend/select2/css/css.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/select2/css/main.css')}}">
    <style>
        .ck-content{
            height: 200px;
        }
    </style>
    {{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Book', 'key' => 'add'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-primary">Book information</h1>
                            </div>
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <!-- form input -->
                                        <div class="col-sm-12">
                                            <form class="form-row" action="{{route('book.update', $book->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group col-12">
                                                    <label class="form-check-label text-primary">Name</label>
                                                    <input name="name" type="text" class="form-control" value="{{$book->name}}" >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary" >ISBN</label>
                                                    <input name="isbn" type="text" class="form-control"
                                                           value="{{$book->isbn}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Height</label>
                                                    <input name="height" type="text" class="form-control" value="{{$book->height}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Page number</label>
                                                    <input name="page_number" type="number" class="form-control" value="{{$book->page_number}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Price</label>
                                                    <input name="price" type="text" class="form-control" value="{{$book->price}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Category</label>
                                                    <select name="category_id" class="form-control" >
                                                        <option selected>Choose Category</option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                @if($category->id === $book->category_id)
                                                                    selected
                                                                @endif
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Publisher</label>
                                                    <select name="publisher_id" class="form-control" >
                                                        <option selected>Choose Publisher</option>
                                                        @foreach($publishers as $publisher)
                                                            <option
                                                                @if($publisher->id === $book->publisher_id)
                                                                selected
                                                                @endif
                                                                value="{{$publisher->id}}">{{$publisher->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Image</label>
                                                    <input name="image" type="file" class="form-control-file">
                                                </div>
                                                <div class="form-group col-6">
                                                    <img src="{{asset('/storage/'. $book->image)}}" alt="" width="50px" height="50px">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label class="form-check-label text-primary">Authors</label>
                                                    <select name="author_id[]"  multiple class="form-control select2_init" >
                                                        @foreach($authors as $author)
                                                            <option
                                                                {{ ($book->checkAuthor($author->id) ? 'selected' : '') }}
                                                                value="{{$author->id}}">{{$author->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label class="form-check-label text-primary">Description</label>
                                                    <textarea id="editor" name="des" class="form-control" rows="3">{!! $book->des !!}</textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary mb-2">submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
    <script src="{{asset('/backend/select2/js/js.js')}}"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
    <script>
        $('.select2_init').select2({
            'placeholder' : 'choose author'
        })
    </script>
@endsection

