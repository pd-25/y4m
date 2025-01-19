@extends('admin.layout.main')
@section('title', 'Create Program | ')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Create New Program</h5>

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form Start -->
                        <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Program Title" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Program Description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>

                            <!-- Dynamic FAQ Section -->
                            <div class="faq-section">
                                <h6>FAQs</h6>
                                <div id="faq-container">
                                    <div class="faq-item mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="faqs[0][question]" class="form-control" placeholder="Enter Question" required>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea name="faqs[0][answer]" class="form-control" rows="2" placeholder="Enter Answer" required></textarea>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-danger mt-2 remove-faq">Remove</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-success add-faq mt-3">Add FAQ</button>
                            </div>
                            <hr>

                            <div class="row mb-3">
                                <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_title" class="form-control">
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
                                    <textarea name="meta_description" class="form-control" rows="3"></textarea>
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
                                    <textarea name="hederscript" class="form-control" rows="3"></textarea>
                                    @error('hederscript')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save Program</button>
                                <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let faqIndex = 1; // Keep track of FAQ index for dynamic fields

            // Add FAQ
            document.querySelector('.add-faq').addEventListener('click', function () {
                const container = document.getElementById('faq-container');
                const newFaq = `
                    <div class="faq-item mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="faqs[${faqIndex}][question]" class="form-control" placeholder="Enter Question" required>
                            </div>
                            <div class="col-md-6">
                                <textarea name="faqs[${faqIndex}][answer]" class="form-control" rows="2" placeholder="Enter Answer" required></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger mt-2 remove-faq">Remove</button>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', newFaq);
                faqIndex++;

                // Add event listener to the new Remove button
                attachRemoveEvent();
            });

            // Remove FAQ
            function attachRemoveEvent() {
                document.querySelectorAll('.remove-faq').forEach(function (button) {
                    button.addEventListener('click', function () {
                        this.closest('.faq-item').remove();
                    });
                });
            }

            // Attach Remove Event to the initial button
            attachRemoveEvent();
        });
    </script>
@endsection
