@extends('layouts.master')

@section('title', 'Add Category')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Add Category </h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="add-category" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" class="form-control" row="5" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea type="text" class="form-control" row="5" name="meta_description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta Keywords</label>
                        <textarea type="text" class="form-control" row="5" name="meta_keywords"></textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Navbar Status</label>
                            <input type="checkbox" name="navbar_status">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">
                                Save Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
