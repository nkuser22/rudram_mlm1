<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


<div id="cart-message" style="display: none;" class="notification"></div>

  <!-- Home Section Start -->
    <section class="home-section-2 home-section-bg pt-0 overflow-hidden">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="slider-animate">
                        <div>
						    @foreach ($banners as $banner)
                            <div class="home-contain rounded-0 p-0">
                                <img src="{{ asset('storage/' . $banner->image) }}"
                                    class="img-fluid bg-img blur-up lazyload" alt="">
                                <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                    <div class="container-fluid-lg">
                                        <div>
                                            <h6 class="ls-expanded text-uppercase text-danger">{{ $banner->title }}
                                            </h6>
                                            <h1 class="heding-2">Premium Quality</h1>
                                            <h5 class="text-content">Fresh & Top Quality Dry Fruits are available here!
                                            </h5>
                                            <button onclick="location.href = '/shop';"
                                                class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto">Shop
                                                Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							@endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section End -->
<!-- Bootstrap Toast -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
    <div id="cart-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Cart</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div id="toast-body" class="toast-body"></div>
    </div>
</div>
    <!-- Category Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-9">
					
					    @foreach ($categories as $category)
                        <div>
                            <a href="#" class="category-box category-dark wow fadeInUp">
                                <div>
                                    <img src="{{ asset('storage/media/category/' . $category->category_img) }}" class="blur-up lazyload" alt="">
                                    <h5>{{ $category->category_name }}</h5>
                                </div>
                            </a>
                        </div>
                        @endforeach
               
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!-- Deal Section Start -->
    <section class="product-section product-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Top Selling Items</h2>
            </div>
			
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-12 ratio_110">
                    <div class="slider-6 img-slider">
					@foreach ($topSellingItems as $product)
                        <div>
						  
                            <div class="product-box-5 wow fadeInUp">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="{{ asset('storage/media/products/' . $product->product_img) }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" >
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
											<a href="#" class="add-to-cart" data-id="{{ $product->id }}">
												<i data-feather="shopping-cart"></i>
											</a>
										</li>

                                      <!--data-bs-toggle="tooltip"-->
                                      <li data-bs-placement="top" title="Wishlist">
										<a href="#" class="notifi-wishlist" id="wishlist-btn" data-product-id="{{ $product->id }}">
											<i data-feather="heart" id="wishlist-icon-{{ $product->id }}"></i>
										</a>
									</li>

                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="#">
                                        <h5 class="name">{{ $product->product_name }}</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">${{ $product->price }}</span>
                                        <del>${{ $product->sale_price }}</del>
                                    </h5>
                                </div>
                            </div>
							
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Section End -->


    <!-- banner section start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row g-md-4 g-3">
                <div class="col-xxl-8 col-xl-12 col-md-7">
                    <div class="banner-contain hover-effect">
                        <img src="{{asset('front/f1/images/fashion/banner/1.jpg')}}" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center-left p-4">
                            <div>
                                <h2 class="text-kaushan fw-normal theme-color">Get Ready To</h2>
                                <h3 class="mt-2 mb-3">TAKE ON THE DAY!</h3>
                                <p class="text-content banner-text">In publishing and graphic design, Lorem
                                    ipsum is a placeholder text commonly used to demonstrate.</p>
                                <button onclick="location.href = '/shop';"
                                    class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                        class="fa-solid fa-arrow-right icon"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-12 col-md-5">
                    <a href="#" class="banner-contain hover-effect h-100">
                        <img src="{{asset('front/f1/images/fashion/banner/2.jpg')}}" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center-left p-4 h-100">
                            <div>
                                <h2 class="text-kaushan fw-normal text-danger">20% Off</h2>
                                <h3 class="mt-2 mb-2 theme-color">SUMMRY</h3>
                                <h3 class="fw-normal product-name text-title">Product</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->


    <!-- Top Selling Section Start -->
    <section class="top-selling-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4 d-lg-block d-none">
                    <div class="ratio_156">
                        <div class="banner-contain-2 hover-effect">
                            <img src="{{asset('front/f1/images/fashion/banner/3.jpg')}}" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-detail-2 p-bottom-center text-center home-p-medium">
                                <div>
                                    <h2 class="text-qwitcher">Passion Meet</h2>
                                    <h3>PERFECTION</h3>
                                    <button onclick="location.href = '#';" class="btn btn-md">Shop
                                        Now <i class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <div class="slider-3_3 product-wrapper">
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="top-selling-box">
                                        <div class="top-selling-title">
                                            <h3>Top Selling</h3>
                                        </div>

                                        <div class="top-selling-contain wow fadeInUp">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/1.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Tuffets Whole Wheat Bread</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 10.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.05s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/2.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Potato</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 40.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.1s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/3.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Green Chilli</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 45.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/4.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Muffets Burger Bun</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 70.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="top-selling-box">
                                        <div class="top-selling-title">
                                            <h3>Trending Products</h3>
                                        </div>

                                        <div class="top-selling-contain wow fadeInUp">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/5.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Good Life Refined Sunflower Oil</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 10.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.05s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/6.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Good Life Raw Peanuts</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 40.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.1s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/7.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Good Life Raw Peanuts</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 85.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/8.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Frooti Mango Drink</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 10.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="top-selling-box">
                                        <div class="top-selling-title">
                                            <h3>Recently added</h3>
                                        </div>

                                        <div class="top-selling-contain wow fadeInUp">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/9.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Tuffets Britannia Cheezza</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 10.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.05s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/10.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Long Life Toned Milk</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 40.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.1s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/11.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Organic Tomato</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 45.00</h6>
                                            </div>
                                        </div>

                                        <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                            <a href="#" class="top-selling-image">
                                                <img src="{{asset('front/f1/images/fashion/product/12.jpg')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="top-selling-detail">
                                                <a href="#">
                                                    <h5>Organic Pure Honey</h5>
                                                </a>
                                                <div class="product-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(34)</span>
                                                </div>
                                                <h6>$ 90.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Selling Section End -->


    <!-- banner section start -->
    <section class="section-t-space">
        <div class="container-fluid-lg">
            <div class="banner-contain">
                <img src="{{asset('front/f1/images/fashion/banner/4.jpg')}}" class="bg-img blur-up lazyload" alt="">
                <div class="banner-details p-center p-4 text-white text-center">
                    <div>
                        <h3 class="lh-base fw-bold offer-text">Get $3 Cashback! Min Order of $30</h3>
                        <h6 class="coupon-code coupon-code-white">Use Code : GROCERY1920</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section start -->


    <!-- Deal Section Start -->
    <section class="product-section product-section-3">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Top Selling Items</h2>
            </div>
            <div class="row g-sm-4 g-3 section-b-space">
                <div class="col-xxl-12 ratio_110">
                    <div class="slider-6 img-slider">
					
					
                       @foreach ($topSellingItems as $product)
                        <div>
						  
                            <div class="product-box-5 wow fadeInUp">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="{{ asset('storage/media/products/' . $product->product_img) }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </a>

                                    <a href="javascript:void(0)" class="wishlist-top" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Wishlist">
                                        <i data-feather="bookmark"></i>
                                    </a>

                                    <ul class="product-option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view" data-id="{{ $product->id }}">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>


                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
											<a href="#" class="add-to-cart" data-id="{{ $product->id }}">
												<i data-feather="shopping-cart"></i>
											</a>
										</li>

                                         <li data-bs-placement="top" title="Wishlist">
										<a href="#" class="notifi-wishlist" id="wishlist-btn" data-product-id="{{ $product->id }}">
											<i data-feather="heart" id="wishlist-icon-{{ $product->id }}"></i>
										</a>
									</li>
                                    </ul>
                                </div>

                                <div class="product-detail">
                                    <a href="#">
                                        <h5 class="name">{{ $product->product_name }}</h5>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">${{ $product->price }}</span>
                                        <del>${{ $product->sale_price }}</del>
                                    </h5>
                                </div>
                            </div>
							
                        </div>
                        @endforeach

                       
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Section End -->

   

    <!-- Newsletter Section Start -->
    <section class="newsletter-section section-b-space">
        <div class="container-fluid-lg">
            <div class="newsletter-box newsletter-box-2">
                <div class="newsletter-contain py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                                <div class="newsletter-detail">
                                    <h2>Join our newsletter and get...</h2>
                                    <h5>$20 discount for your first order</h5>
                                    <div class="input-box">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Your Email">
                                        <i class="fa-solid fa-envelope arrow"></i>
                                        <button class="sub-btn  btn-animation">
                                            <span class="d-sm-block d-none">Subscribe</span>
                                            <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->
	






