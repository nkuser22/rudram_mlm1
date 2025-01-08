@include('front.pages.header')

@php
    use App\Models\Product;
@endphp

<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Wishlist</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Wishlist Section Start -->
<section class="wishlist-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-3 g-2">
            @foreach($wishlistItems as $item)
                @php
                    $user_id = $item->user_id;
                    $product_id = $item->product_id;
                    $product = Product::getByUserAndProductId($user_id, $product_id);
                @endphp
                <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                    <div class="product-box-3 h-100">
                        <div class="product-header">
                            <div class="product-image">
                                <a href="javascript:void();">
                                    <img src="{{ asset('storage/media/products/' . $product[0]->product_img) }}" class="img-fluid blur-up lazyload"
                                         alt="{{ $item->name }}">
                                </a>
                            </div>
                        </div>
                        <div class="product-footer">
                            <div class="product-detail">
                                <a href="#">
                                    <h5 class="name">{{ $product[0]->product_name }}</h5>
                                </a>
                                <h6 class="unit mt-1">{{ $item->unit }}</h6>
                                <h5 class="price">
                                    <span class="theme-color">${{ number_format($product[0]->sale_price, 2) }}</span>
                                    <del>${{ number_format($product[0]->price, 2) }}</del>
                                </h5>

                                <div class="add-to-cart-box bg-white mt-2">
                                    <button class="btn btn-add-cart addcart-button add-to-cart" data-id="{{ $product[0]->id }}">Add
                                        <span class="add-icon bg-light-gray">
                                            <i class="fa-solid fa-plus"></i>
                                        </span>
                                    </button>
                                    <div class="cart_qty qty-box">
                                        <div class="input-group bg-white">
                                            <button type="button" class="qty-left-minus bg-gray" data-type="minus"
                                                    data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                   name="quantity" value="0">
                                            <button type="button" class="qty-right-plus bg-gray" data-type="plus"
                                                    data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Wishlist Section End -->

<!-- Bootstrap Toast for Notifications -->
<div id="cart-toast" class="toast align-items-center text-white" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body" id="toast-body"></div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

@include('front.pages.footer')

