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
                                    <li class="breadcrumb-item"><a href="store.html" class="breadcrum-a">Store</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" class="breadcrum-a"> Yes America!
                                        T-Shirt</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="store-slider-card">
                            <div class="slider-container">
                                <div class="slider-wrapper">
                                    <div class="slide"><img src="{{asset('fassets/images/white-shirt.webp')}}" alt="Product 1"
                                            class="store-slider-img" /></div>
                                    <div class="slide"><img src="{{asset('fassets/images/black-shirt.webp')}}" alt="Product 2"
                                            class="store-slider-img" /></div>

                                </div>
                                <button class="prev">❮</button>
                                <button class="next">❯</button>
                            </div>
                            <div class="thumbnails">
                                <img src="{{asset('fassets/images/white-shirt.webp')}}" alt="Product 1" data-index="0" />
                                <img src="{{asset('fassets/images/black-shirt.webp')}}" alt="Product 2" data-index="1" />

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="store-form-card">
                            <h2 class="secondary-header tag-padding text-black">Yes America! T-Shirt</h2>
                            <p class="store-price-p">$25.00</p>
                            <div class="store-detail-form">
                                <form>

                                    <div class="contact-inuput-w-100 store-input-margin"><label for="size"
                                            class="store-select-labels">Size &#x3a;</label>

                                        <select name="size" id="size" class="store-select">
                                            <option value="Select size">Select size</option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                            <option value="XLarge">X Large</option>
                                        </select>
                                    </div>
                                    <div class="contact-inuput-w-100 store-input-margin"><label for="size"
                                            class="store-select-labels">Color &#x3a;</label>

                                        <select name="size" id="size" class="store-select">
                                            <option value="Select color">Select color</option>
                                            <option value="White">White</option>
                                            <option value="Black">Black</option>
                                        </select>
                                    </div>
                                    <div class="contact-inuput-w-100 store-input-margin">
                                        <div class="crtdiv">
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

                                        </div>
                                    </div>
                                    <div class="store-btn-div">
                                        <a href="donate.html" class="btn-orange-large">add to cart</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================ store area end ===================== -->
@endsection
