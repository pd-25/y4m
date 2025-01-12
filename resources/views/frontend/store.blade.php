@extends('frontend.layout.main')
@section('content')
    <!-- ====== banner area starts ============ -->
    <section class="store-banner-area">
        <div class="main-banner-inner-box">
            <div class="container-fluid">
                <div class="store-banner-content-box ">
                    <h1 class="primary-header-white">The apparel help raise money to support the organization’s
                        programs. All
                        members are encouraged to buy a set of <span class="span-heading">YES America</span> apparel.
                        Each time you purchase any of the
                        apparel, you are helping support the youth in the community and advocating for the youth
                        programs.</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- ============= banner area end ============ -->

    <!-- ================ store area starts ===================== -->
    <section class="store-area section-gap">
        <div class="store-header-div">
            <h2 class="store-header">Store</h2>
        </div>
        <div class="store-container">
            <div class="store-card">
                <div class="card__media">
                    <div class="media--hover-effect">
                        <a href="{{route('store', 23)}}" class="store-detail-link"><img src="{{asset('fassets/images/hat-white.webp')}}" alt="white-hat" class="store-img1"></a> 
                      
                        <a href="{{route('store', 23)}}" class="store-detail-link"> <img src="{{asset('fassets/images/hat-black.webp')}}"
                            alt="black-hat" class="hover-image store-img"></a>
                    </div>
                    <div class="store-content">
                        <h5 class="store-card-header"> <a href="{{route('store', 23)}}" class="store-detail-link-header store-card-content-a">Yes America! Hat</a></h5>
                        <p class="store-card-p"> <a href="{{route('store', 23)}}" class="store-detail-link-p store-card-content-a">$25.00</a></p>
                    </div>
                </div>
              
            </div>
            <div class="store-card">
                <div class="card__media">
                    <div class="media--hover-effect">
                      <a href="{{route('store', 23)}}" class="store-detail-link"> <img src="{{asset('fassets/images/white-shirt.webp')}}" alt="white-hat" class="store-img1"></a> 
                      
                      <a href="{{route('store', 23)}}" class="store-detail-link"> <img src="{{asset('fassets/images/black-shirt.webp')}}"
                            alt="black-hat" class="hover-image store-img"></a>
                    </div>
                    <div class="store-content">
                        <h5 class="store-card-header"> <a href="{{route('store', 23)}}" class="store-detail-link-header store-card-content-a">Yes America! T-Shirt</a></h5>
                        <p class="store-card-p"> <a href="{{route('store', 23)}}" class="store-detail-link-p store-card-content-a">$25.00</a></p>
                    </div>
                </div>
              
            </div>
        </div>
    </section>

    <!-- ================ store area end ===================== -->
@endsection