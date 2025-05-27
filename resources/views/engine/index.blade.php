@extends('template.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Engine cc</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Engine cc</th>
                                <th>Action | <a href="{{ route('engine.create') }}" class="btn btn-success btn-sm">Add</a></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($engine as $engine)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $engine->cc}}</td>
                                <td>
                                    <form action="{{ route('engine.destroy', $engine->engineId) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('engine.edit', $engine->engineId) }}" class="btn btn-warning btn-sm">Edit</a>
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

