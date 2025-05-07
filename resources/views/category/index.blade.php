<center>
    <table border="1" style="border-collapse: collapse;" cellPadding="10px">
        <thead>
            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Action | <a href="{{ route('category.create') }}">Add</a></th>
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

                            <a href="{{ route('category.edit', $category->categoryId) }}">Edit</a>
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</center>
