@include('front/pages/header');
@php
use App\Models\UserWallet;
@endphp


 <!-- Breadcrumb Section Start -->
 <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Checkout</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
		 @if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ route('checkout.process') }}" method="POST">
		@csrf
            <div class="row g-sm-4 g-3">
                <div class="col-lg-8">
				    
				  
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                            trigger="loop-on-hover"
                                            colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Billing Detail</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
											
                                                <div class="col-xxl-12 col-lg-12 col-md-12">

                                                    <div class="delivery-address-box">
                                                        <div>
                                                            <!--<div class="form-check">
                                                                <input class="form-check-input" type="radio" name="jack"
                                                                    id="flexRadioDefault1">
                                                            </div>-->

                                                            <div class="label">
                                                                <label>Home</label>
                                                            </div>

                                                            <ul class="delivery-address-detail">
                                                               <li>
                                                                    <h6 class="text-content mb-0"><span
                                                                            class="text-title">Username
                                                                            :</span> {{$user->username}}</h6>
                                                                </li>

                                                                <!--<li>
                                                                    <p class="text-content"><span
                                                                            class="text-title">Address
                                                                            : </span>8424 James Lane South San
                                                                        Francisco, CA 94080</p>
                                                                </li>-->

                                                               <!-- <li>
                                                                    <h6 class="text-content"><span
                                                                            class="text-title">Pin Code
                                                                            :</span> +380</h6>
                                                                </li>-->

                                                                <li>
                                                                    <h6 class="text-content mb-0"><span
                                                                            class="text-title">Phone
                                                                            :</span> {{$user->mobile}}</h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                               <div class="col-12">
													<div class="payment-method">
														<div
															class="form-floating mb-lg-3 mb-2 theme-form-floating">
															<input type="text" class="form-control" name="name"
																id="name" value="{{ old('name', $user->name) }}"
																placeholder="Enter Name">
															<label for="credit2">Enter Name
																</label>
														</div>
														 @error('name')
														  <span class="text-danger">{{ $message }}</span>
													     @enderror
													</div>
												</div>

												<div class="col-12">
													<div
														class="form-floating mb-lg-3 mb-2 theme-form-floating">
														<input type="email" class="form-control"
															id="expiry" placeholder="Enter Email Address" name="email" value="{{ old('email',$user->email) }}">
														<label for="expiry">Email Address</label>
													</div>
													    @error('email')
														  <span class="text-danger">{{ $message }}</span>
													     @enderror
												</div>

												<div class="col-12">
													<div
														class="form-floating mb-lg-3 mb-2 theme-form-floating">
														<textarea type="text" class="form-control" name="address" id="address" value="{{ old('address',$user->address) }}" 
															placeholder="Enter Address">{{ old('address') }}</textarea>
														<label for="cvv">Enter Address</label>
													</div>
													  @error('address')
														  <span class="text-danger">{{ $message }}</span>
													     @enderror
												</div>
												
												 <div class="col-4">
													<div class="payment-method">
														<div
															class="form-floating mb-lg-3 mb-2 theme-form-floating">
															<input type="text" class="form-control" name="city"
																id="name" value="{{ old('city') }}"
																placeholder="Enter city">
															<label for="credit2">Enter City
																</label>
														</div>
													</div>
												</div>
                                                
												 <div class="col-4">
													<div class="payment-method">
														<div
															class="form-floating mb-lg-3 mb-2 theme-form-floating">
															<input type="text" class="form-control" name="state"
																id="name" value="{{ old('state') }}"
																placeholder="Enter state">
															<label for="credit2">Enter State
																</label>
														</div>
													</div>
												</div>
												
												 
												 <div class="col-4">
													<div class="payment-method">
														<div
															class="form-floating mb-lg-3 mb-2 theme-form-floating">
															<input type="text" class="form-control" name="pin_code"
																id="name" value="{{ old('pin_code') }}"
																placeholder="Enter pin code">
															<label for="credit2">Enter pin code
																</label>
														</div>
													</div>
												</div>
                                            </div>
										
                                                        
                                                            
													
													
                                        </div>
                                    </div>
                                </li>

                         

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Payment Option</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                id="accordionFlushExample">
                                               

                                         
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingThree">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseThree">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="wallet"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="wallet">My
                                                                    Wallet</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h5 class="text-uppercase mb-4">Select Your Wallet
                                                            </h5>
															 <?php
															 $wallet = new UserWallet();
															 $total_amt=$wallet->getWallet($user->id,'shopping_wallet');
															 ?>
                                                            <div class="row">
                                                                      <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <label class="form-check-label"
                                                                            for="amazon"><input
                                                                                class="form-check-input mt-0"
                                                                                type="radio" name="flexRadioDefault" value="shopping_wallet"
                                                                                id="amazon">Shopping Wallet ($ {{$total_amt}})</label>
																				<input type="hidden" name="wallet_type" value="{{ $subtotal }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault" value="upi_wallet"
                                                                            id="gpay" >
                                                                        <label class="form-check-label"
                                                                            for="gpay">UPI</label>
                                                                    </div>
                                                                </div>
																
																<div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault" value="cashon_wallet"
                                                                            id="gpay" >
                                                                        <label class="form-check-label"
                                                                            for="gpay">Cash on Delivery</label>
                                                                    </div>
                                                                </div>
						
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
					 
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3>Order Summery</h3>
                            </div>
                         
                            <ul class="summery-contain">
							      @foreach ($cart as $item)
                                <li>
                                    <img src="{{ asset('storage/media/products/' . $item['product_img']) }}"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>{{ $item['product_name'] }} <span>X {{ $item['product_qty'] }}</span></h4>
                                    <h4 class="price">$ {{ $item['sale_price'] }}</</h4>
                                </li>
                                @endforeach
                               
                            </ul>

                            <ul class="summery-total">
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">${{ $subtotal }}</h4>
                                </li>

                                <li>
                                    <h4>Shipping</h4>
                                    <h4 class="price">$0.00</h4>
                                </li>

                                <li>
                                    <h4>Tax</h4>
                                    <h4 class="price">$0.00</h4>
                                </li>

                                <!--<li>
                                    <h4>Coupon/Code</h4>
                                    <h4 class="price">$-23.10</h4>
                                </li>-->

                                <li class="list-total">
                                    <h4>Total (USD)</h4>
                                    <h4 class="price">${{ $subtotal }}</h4>
                                </li>
                            </ul>
                        </div>

                        <div class="checkout-offer" id="checkoutOffer">
                            <div class="offer-title">
                                <div class="offer-icon">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/offer.svg" class="img-fluid" alt="">
                                </div>
                                <div class="offer-name">
                                    <h6>Available Offers</h6>
                                </div>
                            </div>

                            <ul class="offer-detail">
                                <li>
                                    <p>Combo: BB Royal Almond/Badam Californian, Extra Bold 100 gm...</p>
                                </li>
                                <li>
                                    <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                                </li>
                            </ul>
                        </div>
                         <input type="hidden" name="total_amount" value="{{ $subtotal }}">
                        
                        <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" type="submit">Place Order</button>
                    </div>
                </div>
            </div>
			</form>
        </div>
    </section>
    <!-- Checkout section End -->
	
	
    @include('front/pages/footer');