@extends('admin.layout.main')
@section('title', 'Create Program | ')
@section('content')
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<!-- jQuery (necessary for Summernote) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
        $(document).ready(function() {
            // Initialize Summernote for description
            $('#description').summernote({
                height: 200,
            });
    
            let faqIndex = 1; // Keep track of FAQ index
    
            // Add FAQ
            $('.add-faq').on('click', function () {
                const container = $('#faq-container');
                const newFaq = `
                    <div class="faq-item mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="faqs[${faqIndex}][question]" class="form-control" placeholder="Enter Question" required>
                            </div>
                            <div class="col-md-6">
                                <textarea name="faqs[${faqIndex}][answer]" class="faq-answer form-control" rows="2" placeholder="Enter Answer" required></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger mt-2 remove-faq">Remove</button>
                    </div>
                `;
                container.append(newFaq);
    
                // Initialize Summernote for the new answer field
                $(`textarea[name="faqs[${faqIndex}][answer]"]`).summernote({
                    height: 100,
                });
    
                faqIndex++;
            });
    
            // Remove FAQ
            $(document).on('click', '.remove-faq', function () {
                $(this).closest('.faq-item').remove();
            });
    
            // Initialize Summernote for the first FAQ answer field
            $('textarea[name="faqs[0][answer]"]').summernote({
                height: 50,
            });
        });
    </script>     
    
@endsection
