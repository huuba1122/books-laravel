@extends('admin.master')

@section('title')
    Status manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Status', 'key' => 'list'])

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
                                            <a type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#addStatusModal" >Add</a>
                                        </div>
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
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($statuses as $key => $status)
                                                    <tr  class="odd">
                                                        <td  class="dtr-control sorting_1" tabindex="0">{{++$key}}</td>
                                                        <td >{{$status->name}}</td>
                                                        <td>
                                                            <div  style="display: inline-flex">
                                                                <div style="margin: 0 10px">
                                                                    <a href="{{route('status.edit', $status->id)}}">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                <div style="margin: 0 10px">
                                                                    <a href="{{route('status.delete', $status->id)}}"
                                                                       onclick="return confirm('Are you sure delete status : {{$status->name}}  ?')"  style="color: red">
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
                                    <div class="modal fade" id="addStatusModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm tác giả</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('status.store')}}" method="post"
                                                          name="addStatus" id="addStatus">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Name</label>
                                                            <input type="text" class="form-control" name="name">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                Close</button>
                                                            <button type="submit"  class="btn btn-primary">Create</button>
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


