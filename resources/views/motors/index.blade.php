@extends('template.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            @if (session('success'))
            <span class="alert alert-success">{{ session('success') }}</span>
            @elseif (session('error'))
            <span class="alert alert-danger">{{ session('error') }}</span>
            @endif
            <div class="card-body">
                <h4 class="card-title">Stock Motorcycle</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Motor Name</th>
                                <th>Color</th>
                                <th>Category</th>
                                <th>Engine</th>
                                <th>Brand</th>
                                <th>Number Plate</th>
                                <th>Condition</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Photo</th>
                                <th>Action | <a href="{{ route('motor.create') }}" class="btn btn-success btn-sm">Add</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMotors as $motor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $motor->motorName }}</td>
                                    <td>{{ $motor->color }}</td>
                                    <td>{{ $motor->Category->categoryName }}</td>
                                    <td>{{ $motor->Engine->cc }}</td>
                                    <td>{{ $motor->Brand->brandName }}</td>
                                    <td>{{ $motor->numberPlate }}</td>
                                    <td>{{ $motor->condition }}</td>
                                    <td>{{ $motor->price }}</td>
                                    <td>{{ $motor->stock }}</td>
                                    <td>
                                        @if($motor->photo)
                                        <img src="{{ asset('storage/' . $motor->photo) }}" alt="{{ $motor->motorName }}" width="100">
                                        @else
                                        <img src="https://via.placeholder.com/100" alt="No Image" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('motor.destroy', $motor->motorId) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('motor.edit', $motor->motorId) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Delete</button>
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
