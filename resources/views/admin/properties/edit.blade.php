@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-edit mr-2"></i>Edit Property</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.properties.update', $property) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Property Title *</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $property->title) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Property Type *</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="buy" {{ old('type', $property->type) == 'buy' ? 'selected' : '' }}>For Sale</option>
                                                <option value="rent" {{ old('type', $property->type) == 'rent' ? 'selected' : '' }}>For Rent</option>
                                                <option value="sale" {{ old('type', $property->type) == 'sale' ? 'selected' : '' }}>Sold</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description *</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $property->description) }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price ($) *</label>
                                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $property->price) }}" step="0.01" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bedrooms">Bedrooms *</label>
                                            <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bathrooms">Bathrooms *</label>
                                            <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="square_feet">Square Feet *</label>
                                            <input type="number" class="form-control" id="square_feet" name="square_feet" value="{{ old('square_feet', $property->square_feet) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="images">Property Images</label>
                                            <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                                            <small class="form-text text-muted">Select new images to replace existing ones</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Current Images -->
                                @if($property->images && count($property->images) > 0)
                                <div class="form-group">
                                    <label>Current Images:</label>
                                    <div class="row">
                                        @foreach($property->images as $image)
                                        <div class="col-md-2 mb-2">
                                            <img src="{{ $image }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address *</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $property->address) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City *</label>
                                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $property->city) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State *</label>
                                            <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $property->state) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip_code">ZIP Code *</label>
                                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code', $property->zip_code) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" {{ old('featured', $property->featured) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="featured">
                                                    Featured Property
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Property
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