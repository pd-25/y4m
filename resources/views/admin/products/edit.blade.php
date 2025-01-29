@extends('admin.layout.main')
@section('title', 'Edit Product | ')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Product</h5>
                        <form action="{{ route('product-mamages.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <!-- Product Name -->
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ old('name', $product->name) }}" required>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Category and Type -->
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <select name="type" class="form-control" required>
                                        <option value="">Select Type</option>
                                        @foreach (\App\enum\ProductTypes::values() as $value)
                                            <option value="{{ $value }}" {{ old('type', $product->type) == $value ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control" cols="10" rows="10" placeholder="Enter Description" required>{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Variant Section -->
                            <div id="variant-container">
                                <label for="inputText" class="col-sm-2 col-form-label"><strong>Product Variants</strong></label>
                                
                                @foreach ($product->productVariants as $variant)
                                    <div class="row mb-3 variant">
                                        <div class="col-md-2">
                                            <select name="variant_name[]" class="form-control" required>
                                                @foreach (\App\enum\ProductVariant::values() as $value)

                                                    <option value="{{ $value }}" {{ $variant->variant_name == $value ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('variant_name.*')
                                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="measurement[]" class="form-control" placeholder="Color Name (e.g., Black)" value="{{ $variant->measurement }}" required>
                                            @error('measurement.*')
                                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-2">
                                            <input type="text" name="measurement_param[]" class="form-control" placeholder="Unit" value="{{ $variant->measurement_param }}" required>
                                            @error('measurement_param.*')
                                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div> --}}
                                        <div class="col-md-2">
                                            <input type="number" name="price[]" class="form-control" placeholder="Price" value="{{ $variant->price }}" required>
                                            @error('price.*')
                                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" value="{{ $variant->quantity }}" required>
                                            @error('quantity.*')
                                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-sm btn-danger remove-variant">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Add More Button -->
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-sm btn-secondary" id="add-variant">Add More</button>
                                </div>
                            </div>

                            <!-- Upload Product Images -->
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Upload Product Images</label>
                                <div class="col-sm-12">
                                    <input type="file" name="images[]" class="form-control" id="images" multiple>
                                    @error('images')
                                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div class="row mb-3">
                                <div id="image-preview" class="col-sm-12 d-flex flex-wrap gap-2">
                                    @foreach ($product->productImages as $image)
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="img-thumbnail m-1" style="width: 100px; height: 100px;">
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $product->meta_title) }}">
                                    @error('meta_title')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
                                <div class="col-sm-10">
                                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $product->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="hederscript" class="col-sm-2 col-form-label">Header Script</label>
                                <div class="col-sm-10">
                                    <textarea name="hederscript" class="form-control" rows="3">{{ old('hederscript', $product->hederscript) }}</textarea>
                                    @error('hederscript')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Submit and Cancel Buttons -->
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-sm btn-primary float-end m-2">Save Changes</button>
                                    <a href="{{ route('product-mamages.index') }}" class="btn btn-sm btn-danger float-end m-2">Cancel</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const variantContainer = document.getElementById("variant-container");
            const addVariantBtn = document.getElementById("add-variant");

            addVariantBtn.addEventListener("click", function() {
                const variantDiv = document.querySelector(".variant").cloneNode(true);
                variantDiv.querySelectorAll("input").forEach(input => input.value = "");
                variantContainer.appendChild(variantDiv);
            });

            variantContainer.addEventListener("click", function(e) {
                if (e.target.classList.contains("remove-variant")) {
                    e.target.closest(".variant").remove();
                }
            });
        });
    </script>
@endsection
