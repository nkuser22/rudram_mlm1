@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp

<!DOCTYPE html>
<html lang="en" dir="ltr">



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="demo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, demo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{$Conn->websiteInfo('logo')}}" type="image/x-icon') }}">
    <link rel="shortcut icon" href="{{$Conn->websiteInfo('logo')}}" type="image/x-icon') }}">
    <title>{{$Conn->websiteInfo('company_name')}} - Dashboard</title>
    
    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="{{ asset ('assets/css/linearicon.css') }}">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/vendors/font-awesome.css') }}">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/vendors/themify.css') }}">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/ratio.css') }}">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/remixicon.css') }}">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/vendors/feather-icon.css') }}">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/vendors/animate.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/vendors/bootstrap.css') }}">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/vector-map.css') }}">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="{{ asset ('assets/css/vendors/slick.css') }}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/style.css') }}">
	
	<!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    
    <!-- DataTables JS -->
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/fillterstyle.css') }}">
   
    <!-- jQuery CDN (Latest version) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	
	<style>
	.alert-info {
		background-color: #ff8786;
		border-color: #070606;
		color: #fff;
	}

    .btn-light {
        background-color: #0da487 !important;
        color: #fff;
        
    }

    .btn-info {
    background-color: #0da487 !important;
    border-color: #0da487 !important;
    color: #fff;
}
	
	</style>
</head>

<body>
    
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="#">
                            <img class="img-fluid main-logo" src="{{$Conn->websiteInfo('logo')}}" alt="logo">
                          <!--  <img class="img-fluid white-logo" src="{{ asset ('assets/images/logo/1-white.png') }}" alt="logo">-->
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="#">
                            <img src="{{$Conn->websiteInfo('logo')}}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

                <form class="form-inline search-full" action="javascript:void(0)" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search ...." name="q" title="" autofocus>
                                <i class="close-search" data-feather="x"></i>
                                <div class="spinner-border Typeahead-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                        </li>
                        <!--<li class="onhover-dropdown">
                            <div class="notification-box">
                                <i class="ri-notification-line"></i>
                                <span class="badge rounded-pill badge-theme">4</span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i class="ri-notification-line"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                            class="pull-right">10 min.</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0)">Check all notification</a>
                                </li>
                            </ul>
                        </li>-->

                        <li>
                            <div class="mode">
                                <i class="ri-moon-line"></i>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                <img class="user-profile rounded-circle" src="{{ asset ('assets/images/users/4.jpg') }}" alt="">
                                <div class="user-name-hide media-body">
                                    <span>Emay Walter</span>
                                    <p class="mb-0 font-roboto">Admin<i class="middle ri-arrow-down-s-line"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a href="{{url('admin/users')}}">
                                        <i data-feather="users"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/orders')}}">
                                        <i data-feather="archive"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/support/pending')}}">
                                        <i data-feather="phone"></i>
                                        <span>Suports Tickets</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i data-feather="settings"></i>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="{{url('admin/logout')}}">
                                        <i data-feather="log-out"></i>
                                        <span>Log out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="#" data-bs-original-title="" title="">
                            <img class="img-fluid for-white" src="{{$Conn->websiteInfo('logo')}}" alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="#">
                            <img class="img-fluid main-logo main-white" src="{{$Conn->websiteInfo('logo')}}" alt="logo">
                          
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{url('/admin/dashboard')}}">
                                        <i class="ri-home-line"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <!--<li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                        <span>Product</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{url('admin/product')}}">Prodcts</a>
                                        </li>

                                        <li>
                                            <a href="{{url('admin/product/manage_product')}}">Add New Products</a>
                                        </li>
                                    </ul>
                                </li>-->

                                <!--<li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-apps-line"></i>
                                        <span>Category</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                         <li>
                                            <a href="{{url('/admin/category')}}">Category List</a>
                                        </li> 

                                        <li>
                                            <a href="{{url('admin/manage_category')}}">Add New Category</a>
                                        </li>
                                    </ul>
                                </li>-->

                                <!--<li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-flag-line"></i>
                                        <span>Banners</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                         <li>
                                            <a href="{{url('/admin/banners')}}">Banner List</a>
                                        </li> 

                                        <li>
                                            <a href="{{url('admin/banners/create')}}">Add New Banner</a>
                                        </li>
                                    </ul>
                                </li>-->

                                <!--<li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-settings-line"></i>
                                        <span>Attributes</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        {{-- <li>
                                            <a href="attributes.html">Attributes</a>
                                        </li> --}}

                                        <li>
                                            <a href="{{url('admin/add-new-attributes')}}">Add Attributes</a>
                                        </li>
                                    </ul>
                                </li>-->

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Users</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{url('admin/users')}}">All users</a>
                                        </li>
                                        {{-- <li>
                                            <a href="#">Add new user</a>
                                        </li> --}}
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-bank-card-line"></i>

                                        <span>Fund</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{url('admin/addfund')}}">Add fund</a>
                                        </li>
                                        <li>
                                            <a href="{{url('admin/fund-history')}}">Add fund History</a>
                                        </li>
										
										<li>
                                            <a href="{{url('admin/fund/pending')}}">Pending Request History</a>
                                        </li>
										
										<li>
                                            <a href="{{url('admin/fund/approved')}}">Approved Request History</a>
                                        </li>
										
										<li>
                                            <a href="{{url('admin/fund/cancelled')}}">Cancelled Request History</a>
                                        </li>
                                    </ul>
                                </li>



                               

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                    <i class="ri-wallet-line"></i>

                                        <span>Withdraw</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                       
                                    <li>
                                            <a href="{{url('admin/payout/pending')}}">Pending Request History</a>
                                        </li>
										
										<li>
                                            <a href="{{url('admin/payout/approved')}}">Approved Request History</a>
                                        </li>
										
										<li>
                                            <a href="{{url('admin/payout/cancelled')}}">Cancelled Request History</a>
                                        </li>
                                    </ul>
                                </li>

                               <!-- <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{url('admin/media')}}">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Media</span>
                                    </a>
                                </li>-->

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Orders</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{url('admin/orders')}}">Order List</a>
                                        </li>
                                        
                                        {{-- <li>
                                            <a href="#">Order Tracking</a>
                                        </li> --}}
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-article-line"></i>
                                        <span>Blog</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{url('admin/blog')}}">blog list</a>
                                        </li>

                                        <li>
                                            <a href="{{url('admin/blog/create')}}">Add blog</a>
                                        </li>
                                    </ul>
                                </li>

                               <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Incomes</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                       
                                    @php
                                        $allIncome = \App\Models\WalletType::where('wallet_type', 'income')
                                            ->where('status', 1)
                                            ->where('plan_type', 1)
                                            ->get();
                                    @endphp

                                    @if($allIncome->isNotEmpty())
                                        <ul>
                                            @foreach($allIncome as $income)
                                                <li>
                                                    <a href="{{ url('/admin/incomes/report?source=' . $income->slug) }}">
                                                        <i class="bx bx-right-arrow-alt"></i>{{ $income->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                                                        
                                    </ul>
                                </li>

                               <!-- <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{url('admin/taxes')}}">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Tax</span>
                                    </a>
                                </li>-->

                                <!--<li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                                        <i class="ri-star-line"></i>
                                        <span>Product Review</span>
                                    </a>
                                </li>-->
                                 <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{url('admin/transactions')}}">
                                        <i class="ri-coin-line"></i>
                                        <span>Transactions</span>
                                    </a>
                                </li>
								
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{url('admin/support/pending')}}">
                                        <i class="ri-phone-line"></i>
                                        <span>Support Ticket</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-settings-line"></i>
                                        <span>Settings</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{url('admin/change-password')}}">Change password Setting</a>
                                        </li>
										
										 <li>
                                            <a href="{{url('admin/contact')}}">Contact Us</a>
                                        </li>
										
										 <li>
                                            <a href="{{url('admin/send-notification')}}">Send Notification</a>
                                        </li>
										
										<li>
                                            <a href="{{url('admin/send-popup')}}">Send Popup</a>
                                        </li>
										
										<li>
                                            <a href="{{url('admin/send-popup-show')}}">Send Popup List</a>
                                        </li>

                                        <li>
                                            <a href="{{url('admin/payment-method/edit/1')}}">Payment update</a>
                                        </li>
                                    </ul>
                                </li>

                               <!-- <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{url('admin/report')}}">
                                        <i class="ri-file-chart-line"></i>
                                        <span>Reports</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{url('admin/listpage')}}">
                                        <i class="ri-list-check"></i>
                                        <span>List Page</span>
                                    </a>
                                </li>-->
								
								<li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{url('admin/logout')}}">
                                        <i class="ri-login-circle-line"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->