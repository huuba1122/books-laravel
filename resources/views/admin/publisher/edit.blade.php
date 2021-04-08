
@extends('admin.master')

@section('title')
    Publisher manager
@endsection
@section('css')

@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
    @include('admin.layout.content-header',['name' => 'Publisher', 'key' => 'edit'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-5">
                                    <form action="{{route('publisher.update', $publisher->id)}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Status name</label>
                                            <input name="name" type="text" class="form-control" value="{{$publisher->name}}">
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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


