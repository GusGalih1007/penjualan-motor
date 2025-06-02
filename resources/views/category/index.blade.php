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
                <h4 class="card-title">Category</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>category Name</th>
                                <th>Action | <a href="{{ route('category.create') }}" class="btn btn-success btn-sm">Add</a></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($category as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->categoryName }}</td>
                                <td>
                                    <form action="{{ route('category.destroy', $category->categoryId) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('category.edit', $category->categoryId) }}" class="btn btn-warning btn-sm">Edit</a>
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


