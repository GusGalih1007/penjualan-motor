@extends('template.admin')
@section('content')
<div class="row">
    <div class="col-12
     grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Category Name</h4>
                <form action="{{ route('category.update', $category->categoryId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                <div class="form-group">
                    <label for="categoryName">Edit Category Name</label>
                    <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="categoryName"
                        value="{{ old('categoryName', $category->categoryName) }}" required>
                    @error('categoryName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Update</button>
<a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
@endsection


