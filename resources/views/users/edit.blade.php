@extends('template.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin strecth-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create User</h4>
                    <form action="{{ route('users.update', $data->userId) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="userName">Name</label>
                            <input type="text" name="userName" class="form-control" value="{{ $data->userName }}">
                            <span class="text-danger">{{ $errors->first('userName') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $data->phone }}">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="Admin" {{ ($data->role == 'Admin') ? "selected" : ''}}>Admin</option>
                                <option value="Cashier" {{ ($data->role == 'Cashier') ? "selected" : ''}}>Cashier</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    @endsection
