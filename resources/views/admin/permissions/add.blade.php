

@extends('admin.master')

@section('title')
    Permissions manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Permissions', 'key' => 'add'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-5">
                                    <form action="{{route('permissions.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input name="des" type="text" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">submit</button>
                                    </form>
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


