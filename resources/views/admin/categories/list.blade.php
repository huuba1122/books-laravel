@extends('admin.master')

@section('title')
    Category manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Categories', 'key' => 'list'])

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

                                        {{--btn add--}}
                                        @can('add_category')
                                            <div class="col-sm-12 mb-2">

                                                <a type="button" class="btn btn-primary" data-toggle="modal"
                                                   data-target="#addCategoryModal">Add</a>
                                            </div>
                                        @endcan
                                        <div class="col-sm-6">
                                            <table id="authorTable"
                                                   class="table table-bordered table-striped dataTable dtr-inline"
                                                   role="grid" aria-describedby="example1_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        #
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Name
                                                    </th>
                                                    @canany(['edit_category', 'delete_category'])
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Action
                                                        </th>
                                                    @endcanany
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $key => $category)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1"
                                                            tabindex="0">{{ $key + $categories->firstItem() }}</td>
                                                        <td>{{$category->name}}</td>
                                                        @canany(['edit_category', 'delete_category'])
                                                            <td>
                                                                <div style="display: inline-flex">
                                                                    @can('edit_category')
                                                                        <div style="margin: 0 10px">
                                                                            <a href="{{route('category.edit', $category->id)}}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                        </div>
                                                                    @endcan
                                                                    @can('delete_category')
                                                                        <div style="margin: 0 10px">
                                                                            <a href="{{route('category.delete', $category->id)}}"
                                                                               onclick="return confirm('Are you sure delete Category : {{$category->name}}  ?')"
                                                                               style="color: red">
                                                                                <i class="far fa-trash-alt"></i>
                                                                            </a>
                                                                        </div>
                                                                    @endcan
                                                                </div>
                                                            </td>
                                                        @endcanany
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end">
                                                    <li class="page-item ">
                                                        {{ $categories->links() }}
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>

                                    <!-- form modal add -->
                                    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('category.store')}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="recipient-name"
                                                                   class="col-form-label">Name</label>
                                                            <input type="text" class="form-control" name="name">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Create
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
@endsection


