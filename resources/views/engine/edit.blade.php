@extends('template.admin')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Engine Name</h4>
                <form action="{{ route('engine.update', $engine->engineId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="cc">Edit CC</label>
                        <input type="text" name="cc" class="form-control" id="cc" placeholder="CC"
                            value="{{ old('cc', $engine->cc) }}" required>
                        @error('cc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('engine.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
