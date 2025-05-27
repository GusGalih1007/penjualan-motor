@extends('template.admin')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit brand</h4>
                <form action="{{ route('brand.update', $brand->brandId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="brandName">Edit Brand Name</label>
                        <input type="text" name="brandName" class="form-control" id="brandName" placeholder="brandName"
                            value="{{ old('brandName', $brand->brandName) }}" required>
                        @error('brandName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('brand.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
