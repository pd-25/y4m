@extends('admin.layout.main')
@section('title', 'Create Product | ')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Product</h5>
                        <form action="{{ route('product-mamages.store') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf

                            <!-- Product Name -->
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control" placeholder="Product Name" required>
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
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                            <option value="{{ $value }}"
                                                {{ old('type') == $value ? 'selected' : '' }}>
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
                                    <textarea name="description" class="form-control" cols="10" rows="10" placeholder="Enter Description" required></textarea>
                                    @error('description')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Variant Section -->
                            {{-- <div id="variant-container">
                                <label for="inputText" class="col-sm-2 col-form-label"><strong>Add Weight</strong></label>
                                <div class="row mb-3 variant">
                                    <div class="col-md-2">
                                        <select name="variant_name[]" class="form-control" required>
                                            @foreach (\App\enum\ProductVariant::values() as $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="measurement[]" class="form-control"
                                            placeholder="Measurement (e.g., 100)" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="measurement_param[]" class="form-control"
                                            placeholder="Unit (e.g., kg/gm)" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="price[]" class="form-control" placeholder="Price" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" required>
                                    </div>
                                </div>
                            </div> --}}

                            <div id="variant-container">
                                <label for="inputText" class="col-sm-2 col-form-label"><strong>Add Weight</strong></label>
                                <div class="row mb-3 variant">
                                    <div class="col-md-2">
                                        <select name="variant_name[]" class="form-control" required>
                                            @foreach (\App\enum\ProductVariant::values() as $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('variant_name.*')
                                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="measurement[]" class="form-control" placeholder="Color Name (e.g., Black)" required>
                                        @error('measurement.*')
                                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <input type="text" name="measurement_param[]" class="form-control" placeholder="Unit (e.g., kg/gm)" required>
                                        @error('measurement_param.*')
                                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div> --}}
                                    <div class="col-md-2">
                                        <input type="number" name="price[]" class="form-control" placeholder="Price" required>
                                        @error('price.*')
                                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" required>
                                        @error('quantity.*')
                                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <!-- Add More Button -->
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-sm btn-secondary" id="add-variant">Add
                                        More</button>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Upload Product Images</label>
                                <div class="col-sm-12">
                                    <input type="file" name="images[]" class="form-control" id="images" multiple required>
                                    @error('images')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($errors->get('images.*') as $index => $messages)
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $messages[0] }}</strong>
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div class="row mb-3">
                                <div id="image-preview" class="col-sm-12 d-flex flex-wrap gap-2"></div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-sm btn-primary float-end m-2">Save
                                        Product</button>
                                    <a href="{{ route('product-mamages.index') }}"
                                        class="btn btn-sm btn-danger float-end m-2">Cancel</a>
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
            const imageInput = document.getElementById("images");
            const imagePreview = document.getElementById("image-preview");

            addVariantBtn.addEventListener("click", function() {
                // Clone the variant div
                const variantDiv = document.querySelector(".variant").cloneNode(true);
                variantDiv.querySelectorAll("input").forEach(input => input.value =
                    ""); // Clear input values

                // Create a col-md-2 div for the remove button
                const removeButtonDiv = document.createElement("div");
                removeButtonDiv.classList.add("col-md-2");

                // Create the remove button
                const removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.classList.add("btn", "btn-sm", "btn-danger", "remove-variant");
                removeButton.textContent = "Remove";

                // Append the remove button to the col-md-2 div
                removeButtonDiv.appendChild(removeButton);

                // Append the col-md-2 div to the variant div
                variantDiv.appendChild(removeButtonDiv);

                // Append the variant div to the variant container
                variantContainer.appendChild(variantDiv);
            });

            // Event listener for dynamically added remove buttons
            variantContainer.addEventListener("click", function(e) {
                if (e.target.classList.contains("remove-variant")) {
                    e.target.closest(".variant").remove();
                }
            });

            imageInput.addEventListener("change", function() {
                imagePreview.innerHTML = ""; // Clear existing previews

                Array.from(this.files).forEach(file => {
                    if (file.type.startsWith("image/")) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement("img");
                            img.src = e.target.result;
                            img.alt = "Product Image";
                            img.classList.add("img-thumbnail", "m-1");
                            img.style.width = "100px";
                            img.style.height = "100px";
                            imagePreview.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        });
    </script>
@endsection
