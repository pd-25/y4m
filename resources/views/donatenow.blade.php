@extends('frontend.layout.main')
@section('content')
<section class="contact-us-area">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form-div">
                    <h2 class="secondary-header">Donate</h2>
                    <form class="donate-form"  method="POST" action="{{ route('donatenowpost') }}" id="member-ad-form">
                        @csrf

                        <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Name <span class="contact-span-required">(required)</span></label>
                            <input type="text" class="contact-input" name="name" value="" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Email <span class="contact-span-required">(required)</span></label>
                            <input type="email" class="contact-input" name="email" value="" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Donate Amount <span class="contact-span-required">(required)</span></label>
                            <input type="number" class="contact-input" name="amount" value="" required>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        </div>
                       <button class="btn-orange-small" id="submitBtn" type="submit">Donate</button>

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

@endsection
