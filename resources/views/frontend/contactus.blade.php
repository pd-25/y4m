@extends('frontend.layout.main')
@section('content')
<section class="contact-us-area">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form-div">
                    <h2 class="secondary-header">Contact us</h2>
                    <form class="contact-form"  method="POST" action="{{ route('contact-data') }}" id="member-ad-form">
                        @csrf
                        <div class="contact-form-inner-div">
                            <div class="contact-inuput-w-50 contact-margin"><label class="contact-label">First
                                    Name <span class="contact-span-required">(required)</span></label>
                                <input type="text" class="contact-input" name="first_name"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="contact-inuput-w-50 contact-margin">
                                <label class="contact-label">Last Name <span class="contact-span-required">(required)</span></label>
                                <input type="text" class="contact-input" name="last_name"
                                value="{{ old('last_name') }}">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Email <span class="contact-span-required">(required)</span></label>
                            <input type="text" class="contact-input" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Phone </label>
                            <input type="text" class="contact-input" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="contact-inuput-w-100 contact-margin"><label
                                class="contact-label">Message <span class="contact-span-required">(required)</span></label>
                            <textarea type="text" rows="5" class="contact-textarea" name="message">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                       <button class="btn-orange-small" id="submitBtn" type="submit">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('#member-ad-form');
        const submitBtn = document.getElementById('submitBtn');
console.log(form.action);

        form.addEventListener('submit', function(event) {
            console.log("Form submission intercepted");
            // alert('ll')
            event.preventDefault(); // Prevent page reload
            handleFormSubmission();
        });

        function handleFormSubmission() {
            const formData = new FormData(form);
            formData.append('page', "{{ Route::currentRouteName() }}");

            // Disable button and show loading
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json',
                },
                body: formData,
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw data; // Pass error to catch
                    });
                }
                return response.json(); // Parse successful response
            })
            .then(data => {
                console.log('data--', data);
                
                if (data.status === 'success') {
                    swal(data.msg, "", "success").then(() => {
                        window.location.href = data.toUrl;
                    });
                } else {
                    swal("Error creating expenditure. Please try again.", "", "error");
                }
            })
            .catch(error => {
                if (error.errors) {
                    displayValidationErrors(error.errors);
                } else {
                    swal("Some error occurred. Please try again.", "", "error");
                }
            })
            .finally(() => {
                // Re-enable button
                submitBtn.innerHTML = 'Submit';
                submitBtn.disabled = false;
            });
        }

        function displayValidationErrors(errors) {
            // Clear old errors
            document.querySelectorAll('.text-danger').forEach(el => el.remove());

            for (const [field, messages] of Object.entries(errors)) {
                const input = form.querySelector(`[name="${field}"]`);
                if (input) {
                    let errorElement = input.parentElement.querySelector('.text-danger');
                    if (!errorElement) {
                        errorElement = document.createElement('span');
                        errorElement.classList.add('text-danger');
                        input.parentElement.appendChild(errorElement);
                    }
                    errorElement.innerHTML = `<strong>${messages.join(' ')}</strong>`;
                }
            }
        }
    });
</script>
@endsection
