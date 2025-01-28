@extends('frontend.layout.main')
@section('content')
<!-- ================ store area starts ===================== -->
<section class="store-detail-area">

    <div class="container">
        <div class="store-detail-container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrums">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('store')}}" class="breadcrum-a">Store</a></li>
                                <li class="breadcrumb-item active" aria-current="page" class="breadcrum-a"> {{$product->category->name}}</li>
                                <li class="breadcrumb-item active" aria-current="page" class="breadcrum-a"> {{$product->name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="store-slider-card">
                        <div class="slider-container">
                            <div class="slider-wrapper">
                                @foreach($product->productImages as $image)
                                <div class="slide"><img src="{{asset('storage/'.$image->image_path)}}" alt="{{$product->name}}-{{$image->id}}"
                                        class="store-slider-img" /></div>
                                @endforeach

                            </div>
                            <button class="prev">❮</button>
                            <button class="next">❯</button>
                        </div>
                        <div class="thumbnails">
                            @foreach($product->productImages as $image)
                            <img src="{{asset('storage/'.$image->image_path)}}" alt="{{$product->name}}-{{$image->id}}" data-index="{{$loop->index}}" />

                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="store-form-card">
                        <h2 class="secondary-header tag-padding text-black">{{$product->name}}</h2>
                        {{-- <p class="store-price-p">$25.00</p> --}}
                        <p class="store-price-p">${{$product->productVariants[0]->price}}</p>

                        @php
                        // Build a JSON object of variant prices for JavaScript
                        $variantPrices = [];
                        foreach ($product->productVariants as $variant) {
                        $variantPrices[$variant->variant_name][$variant->measurement] = $variant->price;
                        }
                        @endphp

                        <div class="store-detail-form">
                            <form action="{{ route('processTransaction') }}" method="GET" name="processtransaction">
                                @csrf

                                <input type="hidden" name="product_price" value="{{ $product->productVariants[0]->price }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                @foreach (\App\enum\ProductVariant::values() as $value)
                                <div class="contact-inuput-w-100 store-input-margin">
                                    <label for="size" class="store-select-labels">{{ $value }} &#x3a;</label>

                                    <select name="{{ $value }}" id="{{ $value }}" class="store-select">
                                        <option value="Select size">Select {{ $value }}</option>

                                        {{-- Match $value with database records and populate options --}}
                                        @foreach ($product->productVariants->where('variant_name', $value) as $variant)
                                        <option value="{{ $variant->measurement }}">{{ $variant->measurement }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endforeach

                                {{-- <div class="contact-inuput-w-100 store-input-margin"><label for="size"
                                            class="store-select-labels">Color &#x3a;</label>

                                        <select name="size" id="size" class="store-select">
                                            <option value="Select color">Select color</option>
                                            <option value="White">White</option>
                                            <option value="Black">Black</option>
                                        </select>
                                    </div> --}}
                                <div class="contact-inuput-w-100 store-input-margin">
                                     {{-- <div {{-- div class="crtdiv">
                                       <span class="qty">
                                            <span class="dec">
                                                <i class="fa fa-minus"></i>
                                            </span>
                                            <span class="num">
                                                1
                                            </span>
                                            <span class="inc">
                                                <i class="fab-solid fa-plus"></i>
                                            </span>
                                        </span>
                                    </div> --}}
                                    <input type="number" name="qty" class="qty" placeholder="Enter Your Quantity" min="1">
                                </div>
                                <div class="store-btn-div">
                                    {{-- <a href="donate.html" class="btn-orange-large">add to cart</a> --}}
                                    <input type="submit" name="submit" value="Buy Now" class="btn-orange-large">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const sliderWrapper = document.querySelector('.slider-wrapper');
    const slides = document.querySelectorAll('.slide');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const thumbnails = document.querySelectorAll('.thumbnails img');

    let index = 0;

    // Function to update the large slider
    function updateSlider() {
        sliderWrapper.style.transform = `translateX(-${index * 100}%)`;
        updateActiveThumbnail();
    }

    // Function to highlight the active thumbnail
    function updateActiveThumbnail() {
        thumbnails.forEach((thumb, i) => {
            thumb.classList.toggle('active', i === index);
        });
    }

    // Event listeners for previous and next buttons
    prev.addEventListener('click', () => {
        index = (index === 0) ? slides.length - 1 : index - 1;
        updateSlider();
    });

    next.addEventListener('click', () => {
        index = (index === slides.length - 1) ? 0 : index + 1;
        updateSlider();
    });

    // Event listeners for thumbnail clicks
    thumbnails.forEach((thumb) => {
        thumb.addEventListener('click', (e) => {
            index = parseInt(thumb.dataset.index); // Get the index from the thumbnail
            updateSlider();
        });
    });

    // Initialize active thumbnail
    updateActiveThumbnail();


    // ------------------ store detail page increase number -----------------
    $(document).ready(function() {
        $('#btn').click(function() {
            $('#btn').toggleClass("cart_clk");

        });
        $("#btn").one("click", function() {
            $('.cart .fa').attr('data-before', '1');
        });

        var prnum = $('.num').text();
        $('.inc').click(function() {
            if (prnum > 0) {
                prnum++;
                $('.num').text(prnum);
                $('.cart .fa').attr('data-before', prnum);
            }

        });
        $('.dec').click(function() {
            if (prnum > 1) {
                prnum--;
                $('.num').text(prnum);
                $('.cart .fa').attr('data-before', prnum);
            }

        });

    });

</script>

<!-- ================ store area end ===================== -->
@endsection
