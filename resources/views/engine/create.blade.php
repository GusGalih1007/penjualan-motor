@extends('template.admin')
@section('content')
<div class="row">
    <div class="col-12
     grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create engine</h4>
            <form action="{{ route('engine.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="form-group">
                <label for="engineName"> Engine Name</label>
                <input type="text" name="cc" class="form-control" id="cc" placeholder="cc"
                    value="{{ old('cc') }}" required>
                @error('cc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('engine.index') }}" class="btn btn-light">Back</a>
            </div>
@endsection
