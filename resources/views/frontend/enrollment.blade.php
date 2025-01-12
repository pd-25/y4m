@extends('frontend.layout.main')
@section('content')
<section class="quarterly-area">
    <div class="quaterly-header-div">
        <h2 class="quaterly-header">QUARTERLY PROGRAM COSTS</h2>
    </div>
    <div class="quaterly-container">
        <div class="quaterly-card">
            <div class="quaterly-img-div">
                <img src="{{asset('fassets/images/quaterly-1.webp')}}" alt="card-image" class="quaterly-card-img">
            </div>
            <h5 class="quaterly-card-header">MEMBERSHIP- $50</h5>
        </div>
        <div class="quaterly-card">
            <div class="quaterly-img-div">
                <img src="{{asset('fassets/images/quaterly-2.webp')}}" alt="card-image" class="quaterly-card-img">
            </div>
            <h5 class="quaterly-card-header">SUPPLIES- $50</h5>
        </div>
        <div class="quaterly-card">
            <div class="quaterly-img-div">
                <img src="{{asset('fassets/images/quaterly-3.webp')}}" alt="card-image" class="quaterly-card-img">
            </div>
            <h5 class="quaterly-card-header">TRANSPORTATION- $125</h5>
        </div>
        <div class="quaterly-card">
            <div class="quaterly-img-div">
                <img src="{{asset('fassets/images/qutaterly-4.webp')}}" alt="card-image" class="quaterly-card-img">
            </div>
            <h5 class="quaterly-card-header">REGULAR PROGRAM- $150</h5>
        </div>
        <div class="quaterly-card">
            <div class="quaterly-img-div">
                <img src="{{asset('fassets/images/quaterly-5.webp')}}" alt="card-image" class="quaterly-card-img">
            </div>
            <h5 class="quaterly-card-header">SPECIAL PROGRAMS- $175</h5>
        </div>
    </div>
</section>
@endsection
