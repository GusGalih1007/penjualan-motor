@extends('template.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Brand </h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Brand Name</th>
                                <th>Action | <a href="{{ route('brand.create') }}">Add</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->brandName }}</td>
                                <td>
                                    <form action="{{ route('brand.destroy', $brand->brandId) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('brand.edit', $brand->brandId) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button type="submit" onclick="return confirm" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


