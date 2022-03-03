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
                                <img src="{{ url('uploads/category/' . $item->image) }}" style="max-width: 100px;" alt="img">
                            </td>
                            <td> {{ $item->status == '1' ? 'Hidden' : 'Shown' }} </td>
                            <td>
                                <button class="btn btn-primary edit-cat" value="{{$item->id}}" data-toggle="modal" data-target="#exampleModalCenter" id="{{$item->id}}">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </button>
                                <button class="btn btn-danger delete-cat" value="{{$item->id}}" id="deleteCat">
                                    <i class="fas fa-trash"></i>
                                    <span>Delete</span>
                                </button>
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

<!-- Edit modal start -->
<div class="fruit-modal">
    <div class="row justify-content-center">
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <form action="" method="POST" enctype="multipart/form-data" id="catUpdateForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="catId" name="catId" value="">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" name="catName" id="catName" placeholder="Enter Category Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="catDescription">Description</label>
                                        <textarea class="form-control" name="catDescription" id="catDescription" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="catSlug">Slug</label>
                                        <input type="text" class="form-control" name="catSlug" id="catSlug">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category Image</label>
                                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Category Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="metaTitle">Meta Title</label>
                                        <input type="text" class="form-control" name="metaTitle" id="metaTitle">
                                    </div>
                                    <div class="form-group">
                                        <label for="metaDescription">Meta Description</label>
                                        <textarea class="form-control" name="metaDescription" id="metaDescription" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Hidden</option>
                                            <option value="0">Shown</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="metaKeywords">Meta Keywords</label>
                                        <textarea class="form-control" name="metaKeywords" id="metaKeywords" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal end -->

<!-- Delete model start -->
<div class="fruit-modal">
    <div class="row justify-content-center">
        <!-- Modal -->
        <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="" method="POST" enctype="multipart/form-data" id="deleteCatForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="catId" name="catId" value="">
                                        <label for="">Are you sure you want to delete this category?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal end -->

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
@endsection
