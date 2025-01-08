@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp   
   <!-- Footer Section Start -->
    <footer class="section-t-space footer-section-2 footer-color-3">
        <div class="container-fluid-lg">
            <div class="main-footer">
                <div class="row g-md-4 gy-sm-5">
                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                        <a href="#" class="foot-logo theme-logo">
                            <img src="{{asset('front/f1/images/logo/rudram-logo.png')}}" class="img-fluid blur-up lazyload" alt="">
                        </a>
                        <p class="information-text information-text-2">it is a long established fact that a reader
                            will
                            be distracted by the readable content.</p>
                        <ul class="social-icon">
                            <li class="light-bg">
                                <a href="https://www.facebook.com/" class="footer-link-color">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="light-bg">
                                <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&amp;flowEntry=ServiceLogin"
                                    class="footer-link-color">
                                    <i class="fab fa-google"></i>
                                </a>
                            </li>
                            <li class="light-bg">
                                <a href="https://twitter.com/i/flow/login" class="footer-link-color">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="light-bg">
                                <a href="https://www.instagram.com/" class="footer-link-color">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="light-bg">
                                <a href="https://in.pinterest.com/" class="footer-link-color">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xxl-2 col-xl-4 col-sm-6">
                        <div class="footer-title">
                            <h4 class="text-white">About Fastkart</h4>
                        </div>
                        <ul class="footer-list footer-contact footer-list-light">
                            <li>
                                <a href="about" class="light-text">About Us</a>
                            </li>
                            <li>
                                <a href="contact" class="light-text">Contact Us</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">Terms & Coditions</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">Careers</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">Latest Blog</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xxl-2 col-xl-4 col-sm-6">
                        <div class="footer-title">
                            <h4 class="text-white">Useful Link</h4>
                        </div>
                        <ul class="footer-list footer-list-light footer-contact">
                            <li>
                                <a href="#" class="light-text">Your Order</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">Your Account</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">Track Orders</a>
                            </li>
                            <li>
                                <a href="wishlist" class="light-text">Your Wishlist</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">FAQs</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xxl-2 col-xl-4 col-sm-6">
                        <div class="footer-title">
                            <h4 class="text-white">Categories</h4>
                        </div>
                        <ul class="footer-list footer-list-light footer-contact">
                            <li>
                                <a href="#" class="light-text">Fresh Vegetables</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">Hot Spice</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">Brand New Bags</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">New Bakery</a>
                            </li>
                            <li>
                                <a href="#" class="light-text">New Grocery</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                        <div class="footer-title">
                            <h4 class="text-white">Store infomation</h4>
                        </div>
                        <ul class="footer-address footer-contact">
                            <li>
                                <a href="javascript:void(0)" class="light-text">
                                    <div class="inform-box flex-start-box">
                                        <i data-feather="map-pin"></i>
                                        <p>{{$Conn->websiteInfo('company_address')}}</p>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)" class="light-text">
                                    <div class="inform-box">
                                        <i data-feather="phone"></i>
                                        <p>Call us: {{$Conn->websiteInfo('company_mobile')}}</p>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)" class="light-text">
                                    <div class="inform-box">
                                        <i data-feather="mail"></i>
                                        <p>Email Us: {{$Conn->websiteInfo('company_email')}}</p>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)" class="light-text">
                                    <div class="inform-box">
                                        <i data-feather="printer"></i>
                                        <p>Fax: 123456</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sub-footer sub-footer-lite section-b-space section-t-space">
                <div class="left-footer">
                    <p class="light-text">2024 Copyright By {{$Conn->websiteInfo('company_name')}}</p>
                </div>

                <ul class="payment-box">
                    <li>
                        <img src="{{asset('front/f1/images/icon/paymant/visa.png')}}" class="blur-up lazyload" alt="">
                    </li>
                    <li>
                        <img src="{{asset('front/f1/images/icon/paymant/discover.png')}}" alt="" class="blur-up lazyload">
                    </li>
                    <li>
                        <img src="{{asset('front/f1/images/icon/paymant/american.png')}}" alt="" class="blur-up lazyload">
                    </li>
                    <li>
                        <img src="{{asset('front/f1/images/icon/paymant/master-card.png')}}" alt="" class="blur-up lazyload">
                    </li>
                    <li>
                        <img src="{{asset('front/f1/images/icon/paymant/giro-pay.png')}}" alt="" class="blur-up lazyload">
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    
	
	<!-- Quick View Modal Box Start -->
    <!-- <div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-sm-4 g-2">
                        <div class="col-lg-6">
                            <div class="slider-image">
                                <img src="{{asset('front/f1/images/product/category/1.jpg')}}" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="right-sidebar-modal">
                                <h4 class="title-name">Peanut Butter Bite Premium Butter Cookies 600 g</h4>
                                <h4 class="price">$36.99</h4>
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
                                    <span class="ms-2">8 Reviews</span>
                                    <span class="ms-2 text-danger">6 sold in last 16 hours</span>
                                </div>

                                <div class="product-detail">
                                    <h4>Product Details :</h4>
                                    <p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I
                                        love.
                                        Caramels marshmallow icing dessert candy canes I love soufflé I love toffee.
                                        Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw.
                                        Bonbon
                                        muffin I love carrot cake sugar plum dessert bonbon.</p>
                                </div>

                                <ul class="brand-list">
                                    <li>
                                        <div class="brand-box">
                                            <h5>Brand Name:</h5>
                                            <h6>Black Forest</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Product Code:</h5>
                                            <h6>W0690034</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Product Type:</h5>
                                            <h6>White Cream Cake</h6>
                                        </div>
                                    </li>
                                </ul>

                                <div class="select-size">
                                    <h4>Cake Size :</h4>
                                    <select class="form-select select-form-size">
                                        <option selected>Select Size</option>
                                        <option value="1.2">1/2 KG</option>
                                        <option value="0">1 KG</option>
                                        <option value="1.5">1/5 KG</option>
                                        <option value="red">Red Roses</option>
                                        <option value="pink">With Pink Roses</option>
                                    </select>
                                </div>

                                <div class="modal-button">
                                    <button onclick="location.href = 'cart';"
                                        class="btn btn-md add-cart-button icon">Add
                                        To Cart</button>
                                    <button onclick="location.href = '#';"
                                        class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                        View More Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->




    <div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row g-sm-4 g-2">
                    <div class="col-lg-6">
                        <div class="slider-image">
                            <img id="product-image" src="" class="img-fluid blur-up lazyload" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-sidebar-modal">
                            <h4 id="product-title" class="title-name"></h4>
                            <h4 id="product-price" class="price"></h4>
                            <div id="product-description" class="product-detail">
                                <h4>Product Details :</h4>
                                <p></p>
                            </div>
                            <ul class="brand-list">
                                <li>
                                    <div class="brand-box">
                                        <h5>Brand Name:</h5>
                                        <h6 id="product-brand"></h6>
                                    </div>
                                </li>
                                <!--<li>
                                    <div class="brand-box">
                                        <h5>Product Code:</h5>
                                        <h6 id="product-code"></h6>
                                    </div>
                                </li>-->
                            </ul>
                            <!--<div class="modal-button">
                                <button id="add-to-cart" class="btn btn-md add-cart-button icon add-to-cart">Add To Cart</button>
                                <button id="view-details" class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                    View More Details
                                </button>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Quick View Modal Box End -->
	
	

    <!--  wishlist model popup  st -->

    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wishlistModalLabel">Wishlist Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="wishlistMessage"></p>
            </div>
        </div>
    </div>
</div>

<!--  wishlist model popup  end -->

    <!-- Location Modal Start -->
    <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Alabama</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Arizona</h6>
                                    <span>Min: $150</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>California</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Colorado</h6>
                                    <span>Min: $140</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Florida</h6>
                                    <span>Min: $160</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Georgia</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Kansas</h6>
                                    <span>Min: $170</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Minnesota</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>New York</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Washington</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->

    <!-- Cookie Bar Box Start -->
    <!-- <div class="cookie-bar-box">
        <div class="cookie-box">
            <div class="cookie-image">
                <img src="{{asset('front/f1/images/cookie-bar.png')}}" class="blur-up lazyload" alt="">
                <h2>Cookies!</h2>
            </div>

            <div class="cookie-contain">
                <h5 class="text-content">We use cookies to make your experience better</h5>
            </div>
        </div>

        <div class="button-group">
            <button class="btn privacy-button">Privacy Policy</button>
            <button class="btn ok-button">OK</button>
        </div>
    </div> -->
    <!-- Cookie Bar Box End -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="#" class="deal-image">
                                        <img src="../assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="#" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="#" class="deal-image">
                                        <img src="{{asset('front/f1/images/vegetable/product/11.png')}}" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="#" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="#" class="deal-image">
                                        <img src="{{asset('front/f1/images/vegetable/product/12.png')}}" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="#" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="#" class="deal-image">
                                        <img src="{{asset('front/f1/images/vegetable/product/13.png')}}" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="#" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->

    <!-- Tap to top start -->
    <div class="theme-option">
        <div class="setting-box">
            <button class="btn setting-button">
                <i class="fa-solid fa-gear"></i>
            </button>

            <div class="theme-setting-2">
                <div class="theme-box">
                    <ul>
                        <li>
                            <div class="setting-name">
                                <h4>Color</h4>
                            </div>
                            <div class="theme-setting-button color-picker">
                                <form class="form-control">
                                    <label for="colorPick" class="form-label mb-0">Theme Color</label>
                                    <input type="color" class="form-control form-control-color" id="colorPick"
                                        value="#417394" title="Choose your color">
                                </form>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>Dark</h4>
                            </div>
                            <div class="theme-setting-button">
                                <button class="btn btn-2 outline" id="darkButton">Dark</button>
                                <button class="btn btn-2 unline" id="lightButton">Light</button>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>RTL</h4>
                            </div>
                            <div class="theme-setting-button rtl">
                                <button class="btn btn-2 rtl-unline">LTR</button>
                                <button class="btn btn-2 rtl-outline">RTL</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="{{asset('front/f1/js/jquery-3.6.0.min.js')}}"></script>

    <!-- jquery ui-->
    <script src="{{asset('front/f1/js/jquery-ui.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('front/f1/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/f1/js/bootstrap/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('front/f1/js/bootstrap/popper.min.js')}}"></script>

    <!-- feather icon js-->
    <script src="{{asset('front/f1/js/feather/feather.min.js')}}"></script>
    <script src="{{asset('front/f1/js/feather/feather-icon.js')}}"></script>

    <!-- Lazyload Js -->
    <script src="{{asset('front/f1/js/lazysizes.min.js')}}"></script>

    <!-- Slick js-->
    <script src="{{asset('front/f1/js/slick/slick.js')}}"></script>
    <script src="{{asset('front/f1/js/slick/slick-animation.min.js')}}"></script>
    <script src="{{asset('front/f1/js/slick/custom_slick.js')}}"></script>

    <!-- Auto Height Js -->
    <script src="{{asset('front/f1/js/auto-height.js')}}"></script>

    <!-- WOW js -->
    <script src="{{asset('front/f1/js/wow.min.js')}}"></script>
    <script src="{{asset('front/f1/js/custom-wow.js')}}"></script>

    <!-- script js -->
    <script src="{{asset('front/f1/js/script.js')}}"></script>

    <!-- thme setting js -->
    <script src="{{asset('front/f1/js/theme-setting.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>

        
	
	$(document).on('click', '.add-to-cart', function () {
   
    const productId = $(this).data('id'); // Get the product ID
    
    const addToCartUrl = '{{ route("cart.add") }}'; // Route for adding to cart
    const csrfToken = '{{ csrf_token() }}'; // CSRF token
    //alert(csrfToken);
    // Perform AJAX request
    $.ajax({
        url: addToCartUrl,
        type: 'POST',
        data: {
            _token: csrfToken,
            product_id: productId,
        },
        success: function (response) {
            //alert(response.message);
            // Show Bootstrap Toast for success
            $('#toast-body').text(response.message || 'Product added to cart successfully!');
            $('#cart-toast').removeClass('bg-danger').addClass('bg-success'); // Set success style
            const toast = new bootstrap.Toast($('#cart-toast'));
            toast.show();
        },
        error: function (xhr) {
            // Show Bootstrap Toast for error
            const errorMessage = xhr.responseJSON?.message || 'Error adding product to cart.';
            $('#toast-body').text(errorMessage);
            $('#cart-toast').removeClass('bg-success').addClass('bg-danger'); // Set error style
            const toast = new bootstrap.Toast($('#cart-toast'));
            toast.show();
        },
    });
});


document.querySelectorAll('[data-bs-target="#view"]').forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.getAttribute('data-id'); 
        
        
        fetch(`/product/${productId}`)
        
            .then(response => response.json())
            
            .then(data => {
               // alert(data);
                const imageUrl = `http://127.0.0.1:8000/storage/media/products/${data.product_img}`;

                // Populate modal with product data
                document.getElementById('product-image').src = imageUrl;
                document.getElementById('product-title').textContent = data.product_name;
                document.getElementById('product-price').textContent = `$${data.sale_price}`;
                document.getElementById('product-description').textContent = data.product_desc.replace(/<\/?[^>]+(>|$)/g, "");
                document.getElementById('product-brand').textContent = data.brand;
               // document.getElementById('product-code').textContent = data.code;
                document.getElementById('add-to-cart').setAttribute('onclick', `location.href = '/cart/add/${data.id}'`);
                //document.getElementById('view-details').setAttribute('onclick', `location.href = '/product/${data.id}'`);
            })
            .catch(error => console.error('Error fetching product data:', error));
    });
});





       $(document).on('click', '.remove-from-cart', function () {
    const productId = $(this).data('id');
    const removeFromCartUrl = '{{ route("cart.remove") }}';
    const csrfToken = '{{ csrf_token() }}';

    $.ajax({
        url: removeFromCartUrl,
        type: 'POST',
        data: {
            _token: csrfToken,
            product_id: productId
        },
        success: function (response) {
            const messageElement = $('#cart-message');

            if (response.status === 'success') {
                // Remove the product item from the cart
                $('#cart-item-' + productId).remove();

                // Show success message dynamically
                messageElement
                    .text('Item removed from cart successfully!')
                    .removeClass('error')
                    .fadeIn(300)
                    .delay(2000)
                    .fadeOut(300); // Show for 2 seconds and fade out
					location.reload(); 
            } else {
                // Show error message dynamically if any issue
                messageElement
                    .text(response.message || 'Error removing item from cart.')
                    .addClass('error')
                    .fadeIn(300)
                    .delay(3000)
                    .fadeOut(300); // Show for 3 seconds and fade out
            }
        },
        error: function () {
            // Show error message dynamically
            const messageElement = $('#cart-message');
            messageElement
                .text('Error removing item from cart.')
                .addClass('error')
                .fadeIn(300)
                .delay(3000)
                .fadeOut(300); // Show for 3 seconds and fade out
        }
    });
});

			
	$(document).on('click', '.update-quantity', function () {
		const productId = $(this).data('id');
		const type = $(this).data('type');
		const updateQuantityUrl = '{{ route("cart.updateQuantity") }}';
		const csrfToken = '{{ csrf_token() }}';

		$.ajax({
			url: updateQuantityUrl,
			type: 'POST',
			data: {
				_token: csrfToken,
				product_id: productId,
				type: type,
			},
			success: function (response) {
				const messageElement = $('#cart-message');

				if (response.status === 'success') {
					// Update the quantity field
					$('#cart-item-' + productId + ' .cart-product_qty').val(response.product_qty);

					// Show success message dynamically
					messageElement
						.text('Quantity updated successfully!')
						.removeClass('error')
						.fadeIn(300)
						.delay(2000)
						.fadeOut(300); // Show for 2 seconds and fade out
						location.reload(); 
				} else {
					// Show error message dynamically
					messageElement
						.text(response.message || 'Error updating quantity.')
						.addClass('error')
						.fadeIn(300)
						.delay(3000)
						.fadeOut(300); // Show for 3 seconds and fade out
				}
			},
			error: function () {
				// Show a generic error message dynamically
				const messageElement = $('#cart-message');
				messageElement
					.text('Error updating quantity.')
					.addClass('error')
					.fadeIn(300)
					.delay(3000)
					.fadeOut(300); // Show for 3 seconds and fade out
			}
		});
	});

		$(document).on('click', '#clear-cart', function () {
    if (confirm('Are you sure you want to clear the cart?')) {
        const clearCartUrl = '{{ route("cart.destroy") }}';
        const csrfToken = '{{ csrf_token() }}';

        $.ajax({
            url: '{{ route("cart.destroy") }}',
            type: 'POST',
            data: {
                _token: csrfToken
            },
            success: function (response) {
                // Show success message dynamically
                const messageElement = $('#cart-message');
                messageElement
                    .text(response.message || 'Cart cleared successfully!')
                    .removeClass('error')
                    .fadeIn(300)
                    .delay(2000)
                    .fadeOut(300); // Show for 2 seconds and fade out

                // Optionally refresh the cart view or clear its HTML
                $('#cart-items').empty(); // Clear the cart items list
				location.reload(); 
				
				
            },
            error: function () {
                // Show error message dynamically
                const messageElement = $('#cart-message');
                messageElement
                    .text('Error clearing the cart.')
                    .addClass('error')
                    .fadeIn(300)
                    .delay(3000)
                    .fadeOut(300); // Show for 3 seconds and fade out
            }
        });
    }
});


   $(document).ready(function () {
    $('.notifi-wishlist').on('click', function (e) {
        e.preventDefault();
        let wishListUrl = '{{ route("wishlist.toggle") }}';
        let productId = $(this).data('product-id');
        let button = $(this);
        let icon = $('#wishlist-icon-' + productId);

        $.ajax({
            url: wishListUrl,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId
            },
            success: function (response) {
                if (response.status === 'added') {
                    icon.css('color', 'red'); // Wishlist added
                    $('#wishlistMessage').text(response.message); // Set modal message
                    $('#wishlistModal').modal('show'); // Show modal
                } else if (response.status === 'removed') {
                    icon.css('color', 'black'); // Wishlist removed
                    $('#wishlistMessage').text(response.message); // Set modal message
                    $('#wishlistModal').modal('show'); // Show modal
                }
            },
            error: function (xhr) {
                if (xhr.status === 401) { // Unauthorized
                    alert('You need to log in to add to your wishlist.');
                    window.location.href = '/login'; // Redirect to login page
                }
            }
        });
    });
});



    $(document).ready(function () {
        $('#country').change(function () {
            const countryId = $(this).val();
            //alert(countryId);
            if (countryId) {
      
                let wishListUrl = `/get-states/${countryId}`;
                //alert(wishListUrl);
                $.ajax({
                    url: `/get-states/${countryId}`,
                    type: 'GET',
                    success: function (states) {
                       // alert(states.name);
                        $('#state').empty().append('<option value="">Select State</option>');
                        $.each(states, function (key, state) {
                            $('#state').append(`<option value="${state.id}">${state.name}</option>`);
                        });
                    },
                    error: function () {
                        alert('Failed to fetch states.');
                    },
                });
            } else {
                $('#state').empty().append('<option value="">Select State</option>');
            }
        });
    });

     // Handle state change
     $('#state').change(function () {
            const stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: `/get-cities/${stateId}`,
                    type: 'GET',
                    success: function (cities) {
                        $('#city').empty().append('<option value="">Select City</option>');
                        $.each(cities, function (key, city) {
                            $('#city').append(`<option value="${city.id}">${city.name}</option>`);
                        });
                    },
                    error: function () {
                        alert('Failed to fetch cities.');
                    },
                });
            } else {
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });
    

    </script>
	
</body>



</html>