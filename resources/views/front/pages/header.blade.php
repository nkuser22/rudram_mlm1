@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp
<html lang="en">




<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('front/f1/images/favicon/rudram-logo.png')}}" type="image/x-icon">
    <title>{{$Conn->websiteInfo('company_name')}}</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;family=Qwitcher+Grypen:wght@400;700&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('front/f1/css/vendors/bootstrap.css')}}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{asset('front/f1/css/animate.min.css')}}" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/f1/css/vendors/font-awesome.css')}}">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/f1/css/vendors/feather-icon.css')}}">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/f1/css/vendors/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/f1/css/vendors/slick/slick-theme.css')}}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/f1/css/bulk-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/f1/css/vendors/animate.css')}}">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('front/f1/css/style.css')}}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

	<style>
	.notification {
		padding: 10px;
		background-color: #4caf50; /* Green background */
		color: white;
		margin: 10px 0;
		border-radius: 5px;
		text-align: center;
		font-weight: bold;
	}
	.notification.error {
		background-color: #f44336; /* Red background for errors */
	}

	
	
	
	</style>
</head>

<body class="theme-color-5">

    <!-- Loader Start -->
<!--<div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div> -->
    <!-- Loader End -->

    <!-- Header Start -->
    <header class="">
        <div class="header-top">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-xxl-3 d-xxl-block d-none">
                        <div class="top-left-header">
                            <i class="iconly-Location icli text-white"></i>
                            <span class="text-white">{{$Conn->websiteInfo('company_address')}}</span>
                        </div>
                    </div>

                    <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                        <div class="header-offer">
                            <div class="notification-slider">
                                <div>
                                    <div class="timer-notification">
                                        <h6><strong class="me-1">Welcome to {{$Conn->websiteInfo('company_name')}}!</strong>

                                        </h6>
                                    </div>
                                </div>

                                <div>
                                    <div class="timer-notification">
                                        <h6>Something you love is now on sale!
                                            <a href="#" class="text-white">Buy Now
                                                !</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <ul class="about-list right-nav-about">
                            <li class="right-nav-list">
                                <div class="dropdown theme-form-select">
                                    <button class="btn dropdown-toggle" type="button" id="select-language"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('front/f1/images/country/united-states.png')}}"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <span>English</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" id="english">
                                                <img src="{{asset('front/f1/images/country/united-kingdom.png')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <span>English</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" id="france">
                                                <img src="{{asset('front/f1/images/country/germany.png')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <span>Germany</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" id="chinese">
                                                <img src="{{asset('front/f1/images/country/turkish.png')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <span>Turki</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="right-nav-list">
                                <div class="dropdown theme-form-select">
                                    <button class="btn dropdown-toggle" type="button" id="select-dollar"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>USD</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end sm-dropdown-menu"
                                        aria-labelledby="select-dollar">
                                        <li>
                                            <a class="dropdown-item" id="aud" href="javascript:void(0)">AUD</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="eur" href="javascript:void(0)">EUR</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="cny" href="javascript:void(0)">CNY</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-nav top-header sticky-header">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>
                            <a href="#" class="web-logo nav-logo">
                                <img src="{{$Conn->websiteInfo('logo')}}" class="img-fluid blur-up lazyload" alt="">
                            </a>

                            <div class="header-nav-middle">
                                <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                    <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                        <div class="offcanvas-header navbar-shadow">
                                            <h5>Menu</h5>
                                            <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown dropdown-mega">
                                                    <a class="nav-link"
                                                        href="{{url('/')}}">Home</a>

                                                    <!--<div class="dropdown-menu dropdown-menu-2 dropdown-image">
                                                        <div class="dropdown-column">
                                                            <a class="dropdown-item" href="index.html">
                                                                <img src="images/theme/1.jpg"
                                                                    class="img-fluid" alt="">
                                                                <span>Kartshop</span>
                                                            </a>

                                                            <a class="dropdown-item" href="index-2.html">
                                                                <img src="images/theme/2.jpg"
                                                                    class="img-fluid" alt="">
                                                                <span>Sweetshop</span>
                                                            </a>

                                                            <a class="dropdown-item" href="index-3.html">
                                                                <img src="/images/theme/3.jpg"
                                                                    class="img-fluid" alt="">
                                                                <span>Organic</span>
                                                            </a>

                                                            <a class="dropdown-item" href="index-4.html">
                                                                <img src="images/theme/4.jpg"
                                                                    class="img-fluid" alt="">
                                                                <span>Supershop</span>
                                                            </a>

                                                            <a class="dropdown-item" href="index-5.html">
                                                                <img src="images/theme/5.jpg"
                                                                    class="img-fluid" alt="">
                                                                <span>Slicktech</span>
                                                            </a>
                                                        </div>
                                                    </div>-->
                                                </li>


                                                <li class="nav-item dropdown dropdown-mega">
                                                    <a class="nav-link"
                                                        href="{{url('/about')}}">About us</a>

                                                </li>

                                                <li class="nav-item dropdown dropdown-mega">
                                                    <a class="nav-link"
                                                        href="{{url('/contact')}}">Contact</a>

                                                </li>

                                                <li class="nav-item dropdown">
                                                    <a class="nav-link" href="{{url('/shop')}}"
                                                        >Shop</a>

                                                    <!--<ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="shop-category-slider.html">Shop
                                                                Category Slider</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="shop-category.html">Shop
                                                                Category Sidebar</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="shop-banner.html">Shop
                                                                Banner</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Shop
                                                                Left
                                                                Sidebar</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="shop-list.html">Shop List</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                                                Right Sidebar</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="shop-top-filter.html">Shop
                                                                Top
                                                                Filter</a>
                                                        </li>
                                                    </ul>-->
                                                </li>

                                                <li class="nav-item dropdown">
                                                   <!-- <a class="nav-link" href="{{url('/product')}}">Product</a>-->

                                                   <!-- <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="product-4-image.html">Product
                                                                4 Image</a>
                                                        </li>
                                                        <li class="sub-dropdown-hover">
                                                            <a href="javascript:void(0)" class="dropdown-item">Product
                                                                Thumbnail</a>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="#">Left
                                                                        Thumbnail</a>
                                                                </li>

                                                                <li>
                                                                    <a href="product-right-thumbnail.html">Right
                                                                        Thumbnail</a>
                                                                </li>

                                                                <li>
                                                                    <a href="product-bottom-thumbnail.html">Bottom
                                                                        Thumbnail</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="product-bundle.html" class="dropdown-item">Product
                                                                Bundle</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-slider.html" class="dropdown-item">Product
                                                                Slider</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-sticky.html" class="dropdown-item">Product
                                                                Sticky</a>
                                                        </li>
                                                    </ul>-->
                                                </li>

                                                <!--<li class="nav-item dropdown dropdown-mega">
                                                    <a class="nav-link dropdown-toggle ps-xl-2 ps-0"
                                                        href="javascript:void(0)" data-bs-toggle="dropdown">Mega
                                                        Menu</a>

                                                    <div class="dropdown-menu dropdown-menu-2">
                                                        <div class="row">
                                                            <div class="dropdown-column col-xl-3">
                                                                <h5 class="dropdown-header">Daily Vegetables</h5>
                                                                <a class="dropdown-item"
                                                                    href="#">Beans & Brinjals</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Broccoli &
                                                                    Cauliflower</a>

                                                                <a href="#"
                                                                    class="dropdown-item">Chilies, Garlic</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Vegetables &
                                                                    Salads</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Gourd, Cucumber</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Herbs & Sprouts</a>

                                                                <a href="demo-personal-portfolio.html"
                                                                    class="dropdown-item">Lettuce & Leafy</a>
                                                            </div>

                                                            <div class="dropdown-column col-xl-3">
                                                                <h5 class="dropdown-header">Baby Tender</h5>
                                                                <a class="dropdown-item"
                                                                    href="#">Beans & Brinjals</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Broccoli &
                                                                    Cauliflower</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Chilies, Garlic</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Vegetables &
                                                                    Salads</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Gourd, Cucumber</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Potatoes &
                                                                    Tomatoes</a>

                                                                <a href="#"
                                                                    class="dropdown-item">Peas & Corn</a>
                                                            </div>

                                                            <div class="dropdown-column col-xl-3">
                                                                <h5 class="dropdown-header">Exotic Vegetables</h5>
                                                                <a class="dropdown-item"
                                                                    href="#">Asparagus &
                                                                    Artichokes</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Avocados & Peppers</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Broccoli &
                                                                    Zucchini</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Celery, Fennel &
                                                                    Leeks</a>

                                                                <a class="dropdown-item"
                                                                    href="#">Chilies & Lime</a>
                                                            </div>

                                                            <div class="dropdown-column dropdown-column-img col-3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>-->

                                                <!--<li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                        data-bs-toggle="dropdown">Blog</a>
                                                    <ul class="dropdown-menu">
                                                       
                                                        <li>
                                                            <a class="dropdown-item" href="blog-list">Blog Grid</a>
                                                        </li>
                                                      
                                                    </ul>
                                                </li>-->

                                                <!--<li class="nav-item dropdown new-nav-item">
                                                    <label class="new-dropdown">New</label>
                                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                        data-bs-toggle="dropdown">Pages</a>
                                                    <ul class="dropdown-menu">
                                                        <li class="sub-dropdown-hover">
                                                            <a class="dropdown-item" href="javascript:void(0)">Email
                                                                Template <span class="new-text"><i
                                                                        class="fa-solid fa-bolt-lightning"></i></span></a>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a
                                                                        href="https://themes.pixelstrap.com/fastkart/email-templete/abandonment-email.html">Abandonment</a>
                                                                </li>
                                                                <li>
                                                                    <a href="https://themes.pixelstrap.com/fastkart/email-templete/offer-template.html">Offer
                                                                        Template</a>
                                                                </li>
                                                                <li>
                                                                    <a href="https://themes.pixelstrap.com/fastkart/email-templete/order-success.html">Order
                                                                        Success</a>
                                                                </li>
                                                                <li>
                                                                    <a href="https://themes.pixelstrap.com/fastkart/email-templete/reset-password.html">Reset
                                                                        Password</a>
                                                                </li>
                                                                <li>
                                                                    <a href="https://themes.pixelstrap.com/fastkart/email-templete/welcome.html">Welcome
                                                                        template</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="sub-dropdown-hover">
                                                            <a class="dropdown-item" href="javascript:void(0)">Invoice
                                                                Template <span class="new-text"><i
                                                                        class="fa-solid fa-bolt-lightning"></i></span></a>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="https://themes.pixelstrap.com/fastkart/invoice/invoice-1.html">Invoice 1</a>
                                                                </li>

                                                                <li>
                                                                    <a href="https://themes.pixelstrap.com/fastkart/invoice/invoice-2.html">Invoice 2</a>
                                                                </li>

                                                                <li>
                                                                    <a href="https://themes.pixelstrap.com/fastkart/invoice/invoice-3.html">Invoice 3</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="404.html">404</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="about-us.html">About Us</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Cart</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="contact-us.html">Contact</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="coming-soon.html">Coming
                                                                Soon</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="compare.html">Compare</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="faq.html">Faq</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="order-success.html">Order
                                                                Success</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="order-tracking.html">Order
                                                                Tracking</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="otp.html">OTP</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="search.html">Search</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="user-dashboard.html">User
                                                                Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Wishlist</a>
                                                        </li>
                                                    </ul>
                                                </li>-->

                                                <!--<li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                        data-bs-toggle="dropdown">Seller</a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="seller-become.html">Become a
                                                                Seller</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="seller-dashboard.html">Seller
                                                                Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="seller-detail.html">Seller
                                                                Detail</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="seller-detail-2.html">Seller
                                                                Detail 2</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="seller-grid.html">Seller
                                                                Grid</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="seller-grid-2.html">Seller
                                                                Grid 2</a>
                                                        </li>
                                                    </ul>
                                                </li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rightside-box">
                                <div class="search-full">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        <input type="text" class="form-control search-type" placeholder="Search here..">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="right-side-menu">
                                    <li class="right-side">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <div class="search-box">
                                                    <i data-feather="search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
									
                                    <li class="right-side">
                                        <a href="{{url('/wishlistpage')}}" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="bookmark"></i>
                                        </a>
                                    </li>
									
									@if (!empty($cart) && count($cart) > 0)
                                    <li class="right-side">
								         
                                        <div class="onhover-dropdown header-badge">
                                            <button type="button" class="btn p-0 position-relative header-wishlist">
                                                <i data-feather="shopping-cart"></i>
                                                <span class="position-absolute top-0 start-100 translate-middle badge">{{count($cart)}}
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>
                                       
                                            <div class="onhover-div">
                                                <ul class="cart-list">
												    @foreach ($cart as $item)
                                                    <li class="product-box-contain">
                                                        <div class="drop-cart">
                                                            <a href="#" class="drop-image">
                                                                <img src="{{ asset('storage/media/products/' . $item['product_img']) }}"
                                                                    class="blur-up lazyload" alt="">
                                                            </a>

                                                            <div class="drop-contain">
                                                                <a href="#">
                                                                    <h5>{{ $item['product_name'] }}</h5>
                                                                </a>
                                                                <h6><span>{{$item['product_qty']}} x</span> ${{ $item['sale_price'] }}</h6>
                                                                <button class="close-button close_button">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                   
                                                </ul>

                                                <div class="price-box">
                                                    <h5>Total :</h5>
                                                    <h4 class="theme-color fw-bold">${{
												$item['sale_price']*$item['product_qty'];
                                                
											}}</h4>
                                                </div>

                                                <div class="button-group">
                                                    <a href="{{url('/cart')}}" class="btn btn-sm cart-button">View Cart</a>
                                                    <a href="{{url('/checkout')}}" class="btn btn-sm cart-button theme-bg-color
                                                    text-white">Checkout</a>
                                                </div>
                                            </div>
											
                                        </div>
										
                                    </li>
									
									@endif
									
									
									
                                    <li class="right-side onhover-dropdown">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>Hello,</h6>
                                                <h5>My Account</h5>
                                            </div>
                                        </div>

                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
											
											   @auth
													
													<li class="product-box-contain">
														<i class="icon-user"></i>
														<a href="{{ url('/dashboard') }}">My Account</a>
													</li>
													<li class="product-box-contain">
														<i class="icon-logout"></i>
														<a href="{{ url('/logout') }}">Logout</a>	
													</li>
												@else
													
													<li class="product-box-contain">
														<i class="icon-login"></i>
														<a href="{{url('/login')}}">Log In</a>
													</li>
													<li class="product-box-contain">
														<i class="icon-register"></i>
														<a href="{{url('/register')}}">Register</a>
													</li>
												@endauth

                                                <li class="product-box-contain">
                                                    <a href="{{url('/user-forgot')}}">Forgot Password</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="{{url('/')}}">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            

            <li class="mobile-category">
                <a href="{{url('/about')}}">
                    <i class="iconly-Category icli js-link"></i>
                    <span>About</span>
                </a>
            </li>

            <li>
                <a href="{{url('/shop')}}" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Shop</span>
                </a>
            </li>

            <li>
                <a href="#" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="{{url('/cart')}}">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->
