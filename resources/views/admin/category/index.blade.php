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
                                <tr class="itemT">
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td>
                                        <img src="{{ url('uploads/category/' . $item->image) }}" style="max-width: 100px;"
                                            alt="img">
                                    </td>
                                    <td> {{ $item->status == '1' ? 'Hidden' : 'Shown' }} </td>
                                    <td>
                                        <a href="http://" class="btn btn-primary edit-cat">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="http://" class="btn btn-danger del-cat">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </a>
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
    <style>
        thead tr {
            text-align: center;
        }

        .itemT td {
            vertical-align: middle;
            text-align: center;
            width: 0%;
        }

    </style>

    <script>
        $(document).ready(function() {
            $('.del-cat').click(function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = url;
                    }
                })
            });
        });


    </script>
@endsection
