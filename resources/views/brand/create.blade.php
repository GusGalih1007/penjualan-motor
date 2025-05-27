@extends('template.admin')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Brand</h4>
                <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="brandName">Brand Name</label>
                        <input type="text" name="brandName" class="form-control" id="brandName" placeholder="Brand Name"
                            value="{{ old('brandName') }}" required>
                        @error('brandName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ route('brand.index') }}" class="btn btn-light">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
