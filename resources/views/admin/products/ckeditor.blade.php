@extends('admin.master')

@section('title')
    quản lý sách
@endsection

@section('scss')
    <link rel="stylesheet" href="">
@endsection
@section('search')
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        @error('search_book')
        <p class="text-danger"></p>
        @enderror
        <form class="form-inline" method="post">
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
                                        <div class="form-group col-10">
                                            <label class="form-check-label">Description</label>
                                            <textarea id="editor" name="des" class="form-control" rows="5"></textarea>
                                        </div>
{{--                                        <div id="editor">This is some sample content.</div>--}}
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
