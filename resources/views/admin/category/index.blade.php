@extends('layouts.master')

@section('title', 'Blog Categories')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">View Category
                    <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-right">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td>
                                        <img src="{{ public_path('uploads/category/'.$item->image) }}" width="50px" height="50px" alt="img">
                                    </td>
                                    <td> {{ $item->status == '1' ? 'Hidden':'Shown' }} </td>
                                    <td>
                                        <a href="http://" class="btn btn-success">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
