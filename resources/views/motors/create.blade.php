@extends('template.admin')

@section('content')
<div class="row">
    <div class="col-12
     grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Stock Motorcycle</h4>
                <form action="{{ route('motor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="form-group">
                    <label for="motorName">Motor Name</label>
                    <input type="text" name="motorName" class="form-control" id="motorName" placeholder="Name Motorcycle"
                        value="{{ old('motorName') }}" required>
                    @error('motorName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" class="form-control" name="color" id="color" placeholder="Color"
                        value="{{ old('color') }}" required>
                    @error('color')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Category</label>
                    <select name="categoryId" class="form-control" id="exampleFormControlSelect2">
                        <option value=""></option>

                        @foreach ($dataCategory as $category)
                        <option value="{{ $category->categoryId }}" @if (old('categoryId')==$category->categoryId) selected @endif>{{ $category->categoryName }}</option>
                        @endforeach
                        </select></br>
                        @if ($errors->has('categoryId'))
                        <span class="label label-danger">{{ $errors->first('categoryId') }}</span>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Engine</label>
                    <select name="engineId" class="form-control" id="exampleFormControlSelect2">
                        <option value=""></option>

                        @foreach ($dataEngine as $engine)
                        <option value="{{ $engine->engineId }}" @if (old('engineId')==$engine->engineId) selected @endif>{{ $engine->cc }}</option>
                        @endforeach
                        </select></br>
                        @if ($errors->has('engineId'))
                        <span class="label label-danger">{{ $errors->first('engineId') }}</span>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Brand</label>
                    <select name="brandId" class="form-control" id="exampleFormControlSelect2">
                        <option value=""></option>

                        @foreach ($dataBrand as $brand)
                        <option value="{{ $brand->brandId }}" @if (old('brandId')==$brand->brandId) selected @endif>{{ $brand->brandName }}</option>
                        @endforeach
                        </select></br>
                        @if ($errors->has('brandId'))
                        <span class="label label-danger">{{ $errors->first('brandId') }}</span>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Conndition</label>
                    <select name="condition" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                        <option value="New">New</option>
                        <option value="Second">Second</option>
                        @error('condition')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
                <div class="form-group">
                    <label for="numberPlate">Number Plate</label>
                    <input type="text" name="numberPlate" class="form-control" id="numberPlate" placeholder="Number Plate"
                        value="{{ old('numberPlate') }}" required>
                    @error('numberPlate')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Price"
                        value="{{ old('price') }}" required>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock" placeholder="stock"
                        value="{{ old('stock') }}" required>
                    @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>File upload</label>
                    <input type="file" name="photo" class="form-control">
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('motor.index') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
