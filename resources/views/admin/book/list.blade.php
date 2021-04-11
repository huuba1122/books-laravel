@extends('admin.master')

@section('title')
    quản lý sách
@endsection
@section('search')
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        @error('search_book')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <form action="{{route('book.search')}}" class="form-inline" method="post">
            @csrf
            <input name="search_book" class="form-control @error('search_book') border-danger  @enderror" value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn-sidebar" type="submit">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
        @include('admin.layout.content-header',['name' => 'Books', 'key' => 'list'])

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
                                        <div class="col-sm-12 mb-2">
                                            <a href="{{route('book.create')}}" class="btn btn-primary float-right" >Add</a>
                                        </div>
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                <tr role="row">
                                                    <th >#</th>
                                                    <th >ISBN</th>
                                                    <th >Name</th>
                                                    <th >Author</th>
{{--                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Category</th>--}}
{{--                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Publisher</th>--}}
                                                    <th >Price</th>
                                                    <th >Image</th>
                                                    <th >Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($books as $key => $book)
                                                    <tr >
                                                        <td  class="dtr-control sorting_1" tabindex="0">{{ $key + $books->firstItem() }}</td>
                                                        <td>{{$book->isbn}}</td>
                                                        <td><a href="{{route('book.detail', $book->id)}}">{{$book->name}}</a></td>
                                                        <td>
                                                            @foreach($book->authors as $author)
                                                                {{$author->name . ', '}}
                                                            @endforeach
                                                        </td>
{{--                                                        <td>{{$book->category->name ?? ''}}</td>--}}
{{--                                                        <td>{{$book->publisher->name ?? ""}}</td>--}}
                                                        <td>{{number_format($book->price, 0, '.', ',')}}</td>
                                                        <td>
                                                            <img src="{{asset('/storage/'. $book->image)}}" alt="" width="40px" height="40px" style="border-radius: 50%">
                                                        </td>
                                                        <td>
                                                            <div  style="display: inline-flex">
                                                                <div style="margin: 0 10px">
                                                                    <a href="{{route('book.edit',$book->id)}}" >
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                <div style="margin: 0 10px">
                                                                    <a href="{{route('book.delete', $book->id)}}" onclick="return confirm('Are you sure delete Book :  {{$book->name}}  ?')" style="color: red">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item ">
                                                {{ $books->links() }}
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
