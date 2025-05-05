<center>
    <form action="{{ route('users.store') }}" method="POST">
        {{ csrf_field() }}
        <table border="1" style="border-collapse: collapse;" cellPadding="10px">
            <tr>
                <td>Name</td>
                <td><input type="text" name="userName" value="{{ old('userName') }}"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="{{ old('email') }}"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" value="{{ old('phone') }}"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><select name="role">
                        <option value="">Select Role</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Cashier" {{ old('role') == 'Cashier' ? 'selected' : '' }}>Cashier</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><a href="{{ route('users.index') }}"><button type="button">Back</button></a></td>
                <td><button type="submit">Submit</button> | <button type="reset">Reset</button></td>
            </tr>
        </table>
    </form>
</center>
