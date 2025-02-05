@extends('frontend.layout.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

       <!-- ====== banner area starts ============ -->
       <section class="common-banner-area" style=" background-image: url({{asset('fassets/images/eents.jpeg')}}); object-fit: cover;">
        <div class="main-banner-inner-box">
            <div class="container-fluid">
                <div class="vision-banner-content-box">
                    <h1 class="banner-heading">Upcoming Events</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container my-4">
        <div class="list-group">
            @if(!@empty($events ))
            @foreach($events as $event)
            <div class="list-group-item list-group-item-action d-flex align-items-start">
                <div class="row w-100">
                    <div class="col-3">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-thumbnail event" >
                    </div>
                    <div class="col-9">
                        <h5 class="mb-1 primary-header">{{ $event->title }}</h5>
                        <p class="mb-1 text-muted">
                            <i class="ri-calendar-event-line mr-1 "></i> {{ \Carbon\Carbon::parse($event->created_at)->format('d M Y') }}
                           
                            <i class="ri-map-pin-line"></i> {{$event->venue}}
                        </p>
                        <p class="mb-0 primary-p">{!!$event->description!!}</p>
                    </div>
                </div>
              
              
            </div>
            @endforeach
            @else
            <div class="list-group-item list-group-item-action d-flex align-items-start">
                
                <h5 class="mb-1 primary-header">No Events!</h5>
            </div>
              
              
            
            @endif
        </div>
    </div>
    
    <style>
        img.img-thumbnail.event {
    width: 350px;
    height: 350px;
    object-fit: cover;
}
img.img-thumbnail.event {
    width: 300px;
    height: 300px;
    object-fit: cover;
}
    
        .list-group-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            
        }
    
        .img-thumbnail {
            border-radius: 8px;
        }
    
        h5 {
            font-size: 1.2rem;
            font-weight: bold;
        }
    
        .text-muted {
            font-size: 0.9rem;
            color: #6c757d;
        }
    
        .text-secondary {
            font-size: 0.85rem;
            color: #495057;
        }
        .list-group {
            gap: 30px;
        }
        .list-group-item+.list-group-item {
    border-top-width: 1px;
}
.list-group-item{
    border-radius: 5px

}
    </style>
    
    @endsection