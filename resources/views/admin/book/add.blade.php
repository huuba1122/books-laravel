@extends('admin.master')

@section('title')
    Create book
@endsection
@section('scss')
    <link rel="stylesheet" href="{{asset('/backend/select2/css/css.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/select2/css/main.css')}}">
    <style>
        .ck-content{
            height: 200px !important;
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
                                            <form class="form-row" action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group col-12">
                                                    <label class="form-check-label text-primary">Name</label>
                                                    <input name="name" type="text" class="form-control @error('name') border-danger  @enderror" >
                                                    @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary" >ISBN</label>
                                                    <input name="isbn" type="text" class="form-control"
                                                           value="{{rand(0,1).'-'.rand(100,999).'-'.rand(10000,99999).'-'.rand(1,9)}}">
                                                    @error('isbn')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Height</label>
                                                    <input name="height" type="text" class="form-control" >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Page number</label>
                                                    <input name="page_number" type="number" class="form-control" >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Price</label>
                                                    <input name="price" type="text" class="form-control @error('name') border-danger  @enderror" >
                                                    @error('price')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Category</label>
                                                    <select name="category_id" class="form-control @error('name') border-danger  @enderror" >
                                                        <option selected>Choose Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Publisher</label>
                                                    <select name="publisher_id" class="form-control @error('name') border-danger  @enderror" >
                                                        <option selected>Choose Publisher</option>
                                                        @foreach($publishers as $publisher)
                                                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('publisher_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-check-label text-primary">Image</label>
                                                    <input name="image" onchange="loadFile(event)" type="file" class="form-control-file @error('name') border-danger  @enderror">
                                                    @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6">
                                                    <img id="imageOutput" width="100px">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label class="form-check-label text-primary">Authors</label>
                                                    <select name="author_id[]"  multiple class="form-control select2_init" >
                                                        @foreach($authors as $author)
                                                            <option value="{{$author->id}}">{{$author->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('author_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label class="form-check-label text-primary">Description</label>
                                                    <textarea id="editor" name="des" class="form-control @error('name') border-danger  @enderror" rows="10"></textarea>
                                                    @error('des')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
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
    <script>
        $('.select2_init').select2({
            'placeholder' : 'choose author'
        })
    </script>
    <script>
        var loadFile = function(event) {
            var imageOutput = document.getElementById('imageOutput');
            imageOutput.src = URL.createObjectURL(event.target.files[0]);
            imageOutput.onload = function() {
                URL.revokeObjectURL(imageOutput.src) // free memory
            }
        };
    </script>
@endsection

