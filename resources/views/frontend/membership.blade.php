@extends('frontend.layout.main')
@section('content')
    <section class="membership-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 membership-order-2">
                    <div class="contact-form-div">
                        <h2 class="secondary-header tag-padding">Become a Member of
                            <span class="span-heading">Yes America</span> today!
                        </h2>
                        <p class="primary-p">Membership is the first step to partnering with Youth Education Services of
                            America (YES America). With your membership, you can enroll in any workshop of interest,
                            take part in our conferences and forums across the country, or remain an active Youth
                            Education Services of America member. Our one-time individual membership costs are $50. Any
                            group or family membership is $75. Your membership invites you to join youth forums and
                            conferences across the community and the entire nation. Please submit your information for
                            membership </p>
                        <form class="contact-form" method="POST" action="{{ route('lead-create') }}" id="member-ad-form">
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
                                    <label class="contact-label">Last Name <span
                                            class="contact-span-required">(required)</span></label>
                                    <input type="text" class="contact-input" name="last_name"
                                        value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Email <span
                                        class="contact-span-required">(required)</span></label>
                                <input type="text" class="contact-input" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="membership-checkbox-input" type="checkbox" id="email1"
                                    name="is_get_email_update" value="news"><label for="email1"
                                    class="membership-checkbox-label"> Sign up for news
                                    and updates</label>
                                @error('is_get_email_update')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                            </div>
                            <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Phone </label>
                                <input type="text" class="contact-input" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Subject <span
                                        class="contact-span-required">(required)</span></label>
                                <input type="text" class="contact-input" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Message <span
                                        class="contact-span-required">(required)</span></label>
                                <textarea type="text" rows="5" class="contact-textarea" name="message">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-orange-small" id="submitBtn">submit</button>

                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 h-100 membership-order-1">
                    <div class="membership-img-box">
                        {{-- <img src="{{ asset('fassets/images/makes-program.webp') }}" alt="group-image"
                            class="membership-img"> --}}
                            <img src="{{ asset('fassets/images/quaterly-5.webp') }}" alt="group-image"
                            class="membership-img">
                    </div>
                </div>
            </div>
        </div>
        {{-- @dd(auth()->check()) --}}
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


{{-- @section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.getElementById('submitBtn');

            const form = document.querySelector('#member-ad-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                handleFormSubmission();
            });

            function handleFormSubmission() {
                const form = document.querySelector('#member-ad-form');
                const formData = new FormData(form);
                formData.append('page', "{{ Route::currentRouteName() }}");
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
                submitBtn.disabled = true;
                const formAction = form.action;

                fetch(formAction, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw data;
                            });
                        }
                        return response.json(); // Handle success response
                    })
                    .then(data => {
                        if (data.status === 'success') {
                            swal(data.msg, "", "success")
                                .then(() => {
                                    window.location.href = data.toUrl;
                                });
                        } else {
                            swal("Error creating expenditure. Please try again.", "", "error");
                            submitBtn.innerHTML = 'Submit';
                            submitBtn.disabled = false;
                        }
                    })
                    .catch(error => {
                        if (error.errors) {
                            // Clear previous error messages before adding new ones
                            document.querySelectorAll('.text-danger').forEach(element => {
                                element.remove();
                            });

                            // Display validation errors next to the respective fields
                            for (const [key, messages] of Object.entries(error.errors)) {
                                const inputElement = document.querySelector(`[name="${key}"]`);
                                if (inputElement) {
                                    // Only create and append new error messages if they don't exist already
                                    let errorElement = inputElement.parentElement.querySelector('.text-danger');
                                    if (!errorElement) {
                                        errorElement = document.createElement('span');
                                        errorElement.classList.add('text-danger');
                                        inputElement.parentElement.appendChild(errorElement);
                                    }

                                    errorElement.innerHTML = `<strong>${messages.join(' ')}</strong>`;
                                }
                            }
                        } else {
                            swal("Some error occurred. Please try again.", "", "error");
                        }

                        // Re-enable the submit button
                        submitBtn.innerHTML = 'Submit';
                        submitBtn.disabled = false;
                    });
            }
        });
    </script>
@endsection --}}
