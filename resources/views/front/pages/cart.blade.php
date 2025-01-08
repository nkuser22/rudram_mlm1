@include('front/pages/header');
<?php
//echo"<pre>";
//print_r($cart);
//die();
?>
<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
				<div id="cart-message" style="display: none;" class="notification"></div>
				<div id="cart-items">
					<!-- List of cart items -->
				</div>

                    <div class="cart-table">
                        <div class="table-responsive-xl">
						  @if (count($cart) > 0)
                            <table class="table">
                                <tbody>
								    
								    @foreach ($cart as $item)
									 
                                    <tr class="product-box-contain" id="cart-item-{{ $item['product_id'] }}">
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="product-left-thumbnail.html" class="product-image">
                                                    <img src="{{ asset('storage/media/products/' . $item['product_img']) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <a href="#">{{ $item['product_name'] }}</a>
                                                        </li>

                                                        <!--<li class="text-content"><span class="text-title">Sold
                                                                By:</span> Fresho</li>-->

                                                       <!-- <li class="text-content"><span
                                                                class="text-title">Quantity</span> - 500 g</li>-->

                                                        <li>
                                                            <h5 class="text-content d-inline-block">Price :</h5>
                                                            <span>${{ $item['sale_price'] }}</span>
                                                            <span class="text-content">${{ $item['price'] }}</span>
                                                        </li>

                                                        <li>
                                                            <h5 class="saving theme-color">Saving : ${{ $item['sale_price']-$item['price'] }}</h5>
                                                        </li>

                                                        <li class="quantity-price-box">
                                                            <div class="cart_qty">
                                                                <div class="input-group">
                                                                    <button type="button" class="btn qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus ms-0"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="btn qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus ms-0"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <h5>Total: ${{ $item['sale_price'] }}</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content">Price</h4>
                                            <h5>${{ $item['sale_price'] }} <del class="text-content">${{ $item['price'] }}</del></h5>
                                            <h6 class="theme-color">You Save : ${{ $item['price']-$item['sale_price'] }}</h6>
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content">Qty</h4>
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus update-quantity"
                                                            data-type="minus" data-field="" data-id="{{ $item['product_id'] }}">
                                                            <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                        </button>
                                                        
														<input class="form-control input-number qty-input" type="text"
                                                            name="quantity" value="{{ $item['product_qty'] }}" data-id="{{ $item['product_id'] }}" >
                                                        
														<button type="button" class="btn qty-right-plus update-quantity" data-id="{{ $item['product_id'] }}"
                                                            data-type="plus" data-field="" >
                                                            <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="subtotal">
                                            <h4 class="table-title text-content">Total</h4>
                                            <h5>${{
												$item['sale_price']*$item['product_qty'];
                                                
											}}</h5>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content">Action</h4>
                                            <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                                            <a class="remove close_button remove-from-cart" href="javascript:void(0)" data-id="{{ $item['product_id'] }}">Remove</a>
											
                                        </td>
                                    </tr>
                                       @endforeach

                
                                </tbody>
                            </table>
							@else
								<p>Your cart is empty.</p>
							@endif
							
                        </div>
                    </div>
					 <hr>
					<button id="clear-cart" class="btn btn-danger">Clear Cart</button> 
                 
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <!--<div class="coupon-cart">
                                <h6 class="text-content mb-2">Coupon Apply</h6>
                                <div class="mb-3 coupon-box input-group">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter Coupon Code Here...">
                                    <button class="btn-apply">Apply</button>
                                </div>
                            </div>-->
                            <ul>
							   @foreach ($cart as $item)
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">$ {{$item['sale_price']*$item['product_qty']}}</h4>
                                </li>
                                 @endforeach
                                <li>
                                    <h4>Coupon Discount</h4>
                                    <h4 class="price">(-) 0.00</h4>
                                </li>

                                <li class="align-items-start">
                                    <h4>Shipping</h4>
                                    <h4 class="price text-end">$0.00</h4>
                                </li>
                            </ul>
                        </div>
                        @if(count($cart) > 0)
                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total ($)</h4>
                                <h4 class="price theme-color">$ {{ array_sum(array_map(fn($item) => $item['sale_price'] * $item['product_qty'], $cart)) }}</h4>
                            </li>
                        </ul>
                         @endif
                        <div class="button-group cart-button">
                            <ul>
                            @if(count($cart) > 0)     
                          <li>
                            
                                <button onclick="location.href = '{{ url('/checkout') }}';"
                                    class="btn btn-animation proceed-btn fw-bold">
                                    Process To Checkout
                                </button>
                           
                            </li>
                            @endif

                                <li>
                                    <button onclick="location.href = '/';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->




@include('front/pages/footer');