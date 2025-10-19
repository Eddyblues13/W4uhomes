@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-plus-circle mr-2"></i>Add New Property</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.properties.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Property Title *</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ old('title') }}" required>
                                            @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Property Type *</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="buy" {{ old('type')=='buy' ? 'selected' : '' }}>For Sale
                                                </option>
                                                <option value="rent" {{ old('type')=='rent' ? 'selected' : '' }}>For
                                                    Rent</option>
                                                <option value="sale" {{ old('type')=='sale' ? 'selected' : '' }}>Sold
                                                </option>
                                            </select>
                                            @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description *</label>
                                    <textarea class="form-control" id="description" name="description" rows="4"
                                        required>{{ old('description') }}</textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price ($) *</label>
                                            <input type="number" class="form-control" id="price" name="price"
                                                value="{{ old('price') }}" step="0.01" required>
                                            @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bedrooms">Bedrooms *</label>
                                            <input type="number" class="form-control" id="bedrooms" name="bedrooms"
                                                value="{{ old('bedrooms') }}" required>
                                            @error('bedrooms')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bathrooms">Bathrooms *</label>
                                            <input type="number" class="form-control" id="bathrooms" name="bathrooms"
                                                value="{{ old('bathrooms') }}" required>
                                            @error('bathrooms')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="square_feet">Square Feet *</label>
                                            <input type="number" class="form-control" id="square_feet"
                                                name="square_feet" value="{{ old('square_feet') }}" required>
                                            @error('square_feet')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="images">Property Images</label>
                                            <input type="file" class="form-control" id="images" name="images[]" multiple
                                                accept="image/*">
                                            <small class="form-text text-muted">You can select multiple images</small>
                                            @error('images')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address *</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ old('address') }}" required>
                                            @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City *</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="{{ old('city') }}" required>
                                            @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State *</label>
                                            <input type="text" class="form-control" id="state" name="state"
                                                value="{{ old('state') }}" required>
                                            @error('state')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip_code">ZIP Code *</label>
                                            <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                value="{{ old('zip_code') }}" required>
                                            @error('zip_code')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="featured"
                                                    name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="featured">
                                                    Featured Property
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Create Property
                                    </button>
                                    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')