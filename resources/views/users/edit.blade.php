<center>
    <form action="{{ route('users.update', $data->userId) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <table border="1" style="border-collapse: collapse;" cellPadding="10px">
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="userName" value="{{$data->userName }}">
                    <br>
                    <span>{{ $errors->first('userName') }}</span>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" value="{{ $data->email }}">
                    <br>
                    <span>{{ $errors->first('email') }}</span>
                </td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>
                    <input type="text" name="phone" value="{{ $data->phone }}">
                    <br>
                    <span>{{ $errors->first('phone') }}</span>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password">
                    <br>
                    <span>{{ $errors->first('password') }}</span>
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="role">
                        <option value="">Select Role</option>
                        <option value="Admin" {{ $data->role == 'Admin'}}>Admin</option>
                        <option value="Cashier" {{ $data->role == 'Cashier'}}>Cashier</option>
                    </select>
                    <br>
                    <span>{{ $errors->first('role') }}</span>
                </td>
            </tr>
            <tr>
                <td><a href="{{ route('users.index') }}"><button type="button">Back</button></a></td>
                <td><button type="submit">Submit</button> | <button type="reset">Reset</button></td>
            </tr>
        </table>
    </form>
</center>
