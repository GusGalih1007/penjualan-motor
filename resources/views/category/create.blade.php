@extends('template.admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Category</h4>
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="Category Name"
                            value="{{ old('categoryName') }}" required>
                        @error('categoryName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ route('category.index') }}" class="btn btn-light">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
