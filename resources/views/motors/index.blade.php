<center>
    <table border="1" style="border-collapse: collapse;" cellPadding="10px">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Color</th>
                <th>Category</th>
                <th>Engine</th>
                <th>Brand</th>
                <th>Number Plate</th>
                <th>Condition</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Photo</th>
                <th>Action | <a href="{{ route('motor.create') }}">Add</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataMotors as $motor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $motor->motorName }}</td>
                    <td>{{ $motor->color }}</td>
                    <td>{{ $motor->categoryId }}</td>
                    <td>{{ $motor->engineId }}</td>
                    <td>{{ $motor->brandId }}</td>
                    <td>{{ $motor->numberPlate }}</td>
                    <td>{{ $motor->condition }}</td>
                    <td>{{ $motor->price }}</td>
                    <td>{{ $motor->stock }}</td>
                    <td>{{ $motor->photo }}</td>
                    <td>
                        <form action="{{ route('motor.destroy', $motor->motorId) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('motor.edit', $motor->motorId) }}">Edit</a>
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</center>y
