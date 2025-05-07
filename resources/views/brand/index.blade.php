<center>
    <table border="1" style="border-collapse: collapse;" cellPadding="10px">
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

                            <a href="{{ route('brand.edit', $brand->brandId) }}">Edit</a>
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</center>
