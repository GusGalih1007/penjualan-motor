<h2>Edit Engine</h2>
<form action="{{ route('engine.update', $engine->engineId) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="cc">Engine CC</label>
        <input type="text" name="cc" id="cc" class="form-control" 
               value="{{ old('cc', $engine->cc) }}" required>
        @error('cc')  <!-- Fixed error field name to match input name -->
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('engine.index') }}" class="btn btn-secondary">Back</a>
</form>