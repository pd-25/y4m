@extends('frontend.layout.main')
@section('content')
<section class="program-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="program-content-box">
                    <h2 class="secondary-header tag-padding">{{$program->title}}</h2>
                    <p class="primary-p">{!!$program->description!!}</p>
                        <div class="program-image-box d-lg-none">
                            <img src="{{ asset('storage/' . $program->image) }}" alt="{{$program->title}}" class="program-img">
                        </div>
                    <div class="program-collapsible-div mb-3">
                        <div class="accordion" id="accordionExample">
                            @foreach($program->faqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{$faq->id}}">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-{{$faq->id}}"
                                        aria-expanded="false" aria-controls="collapse-{{$faq->id}}">
                                        {!!$faq->question!!}
                                    </button>
                                </h2>
                                <div id="collapse-{{$faq->id}}" class="accordion-collapse collapse"
                                    aria-labelledby="heading-{{$faq->id}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-body-inner">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-10 offset-lg-1">
                <div class="program-image-box d-none d-lg-block">
                    <img src="{{ asset('storage/' . $program->image) }}" alt="{{$program->title}}" class="program-img">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection