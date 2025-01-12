@extends('frontend.layout.main')
@section('content')
    <section class="our-team-area">
        <div class="team-header-div">
            <h2 class="team-header">Our team</h2>
        </div>
        <div class="team-container">
            <div class="team-card">
                <div class="team-card-img-box">
                    <img src="{{asset('fassets/images/team-1.webp')}}" alt="team-profile" class="team-img">
                </div>
                <div class="team-card-content-box">
                    <h5 class="team-card-header">First Name Last Name</h5>
                    <p class="secondary-vission-p">It all begins with an idea. Maybe you want to launch a business.
                        Maybe you want to turn a hobby into something more. Or maybe you have a creative project to
                        share with the world. Whatever it is, the way you tell your story online can make all the
                        difference.</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-card-img-box">
                    <img src="{{asset('fassets/images/team-2.webp')}}" alt="team-profile" class="team-img">
                </div>
                <div class="team-card-content-box">
                    <h5 class="team-card-header">First Name Last Name</h5>
                    <p class="secondary-vission-p">It all begins with an idea. Maybe you want to launch a business.
                        Maybe you want to turn a hobby into something more. Or maybe you have a creative project to
                        share with the world. Whatever it is, the way you tell your story online can make all the
                        difference.</p>
                </div>
            </div>
            <div class="team-card">
                <div class="team-card-img-box">
                    <img src="{{asset('fassets/images/team-3.webp')}}" alt="team-profile" class="team-img">
                </div>
                <div class="team-card-content-box">
                    <h5 class="team-card-header">First Name Last Name</h5>
                    <p class="secondary-vission-p">It all begins with an idea. Maybe you want to launch a business.
                        Maybe you want to turn a hobby into something more. Or maybe you have a creative project to
                        share with the world. Whatever it is, the way you tell your story online can make all the
                        difference.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
