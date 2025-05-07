<center>
    <table border="1" style="border-collapse: collapse;" cellPadding="10px">
        <thead>
            <tr>
                <th>No</th>
                <th>Engine</th>
                <th>Action | <a href="{{ route('engine.create') }}">Add</a></th>
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

                            <a href="{{ route('engine.edit', $engine->engineId) }}">Edit</a>
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</center>
