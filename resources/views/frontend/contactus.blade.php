@extends('frontend.layout.main')
@section('content')
<section class="contact-us-area">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form-div">
                    <h2 class="secondary-header">Contact us</h2>
                    <form class="contact-form">
                        <div class="contact-form-inner-div">
                            <div class="contact-inuput-w-50 contact-margin"><label class="contact-label">First
                                    Name <span class="contact-span-required">(required)</span></label>
                                <input type="text" class="contact-input">
                            </div>
                            <div class="contact-inuput-w-50 contact-margin">
                                <label class="contact-label">Last Name <span class="contact-span-required">(required)</span></label>
                                <input type="text" class="contact-input">
                            </div>
                        </div>
                        <div class="contact-inuput-w-100 contact-margin"><label class="contact-label">Email <span class="contact-span-required">(required)</span></label>
                            <input type="text" class="contact-input">
                        </div>
                        <div class="contact-inuput-w-100 contact-margin"><label
                                class="contact-label">Message <span class="contact-span-required">(required)</span></label>
                            <textarea type="text" rows="5" class="contact-textarea"></textarea>
                        </div>
                       <button class="btn-orange-small">send</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
