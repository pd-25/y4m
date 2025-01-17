@extends('admin.layout.main')
@section('title', 'Edit Program | ')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Edit Program</h5>

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
                        <form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" 
                                    value="{{ old('title', $program->title) }}" placeholder="Enter Program Title" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5" 
                                    placeholder="Enter Program Description">{{ old('description', $program->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($program->image)
                                    <img src="{{ asset('storage/' . $program->image) }}" alt="Program Image" 
                                        class="mt-2" height="100px" width="100px">
                                @endif
                            </div>

                            <!-- Dynamic FAQ Section -->
                            <div class="faq-section">
                                <h6>FAQs</h6>
                                <div id="faq-container">
                                    @forelse ($program->faqs as $index => $faq)
                                        <div class="faq-item mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="faqs[{{ $index }}][question]" class="form-control" 
                                                        value="{{ old("faqs.$index.question", $faq->question) }}" 
                                                        placeholder="Enter Question" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea name="faqs[{{ $index }}][answer]" class="form-control" rows="2" 
                                                        placeholder="Enter Answer" required>{{ old("faqs.$index.answer", $faq->answer) }}</textarea>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-danger mt-2 remove-faq">Remove</button>
                                        </div>
                                    @empty
                                        <p>No FAQs Found</p>
                                    @endforelse
                                </div>
                                <button type="button" class="btn btn-sm btn-success add-faq mt-3">Add FAQ</button>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update Program</button>
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
            let faqIndex = {{ $program->faqs->count() }}; // Start index from existing FAQs count

            // Add FAQ
            document.querySelector('.add-faq').addEventListener('click', function () {
                const container = document.getElementById('faq-container');
                const newFaq = `
                    <div class="faq-item mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="faqs[${faqIndex}][question]" class="form-control" 
                                    placeholder="Enter Question" required>
                            </div>
                            <div class="col-md-6">
                                <textarea name="faqs[${faqIndex}][answer]" class="form-control" rows="2" 
                                    placeholder="Enter Answer" required></textarea>
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

            // Attach Remove Event to the existing buttons
            attachRemoveEvent();
        });
    </script>
@endsection
