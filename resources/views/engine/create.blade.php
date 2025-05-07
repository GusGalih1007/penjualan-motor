<form action="{{ route('engine.store') }}" method="POST">
    @csrf
    <label>Engine CC:</label>
    <input type="text" name="cc" value="{{ old('cc') }}" required>
    <button type="submit">Simpan</button>
</form>