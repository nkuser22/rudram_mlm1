	 @include('user/pages/header')
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

					<!--start page wrapper -->
		<div class="page-wrapper">
		
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Fund Request</div>
                  				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Fund Request</li>
							</ol>
						</nav>
					</div>

					<div class="ms-auto">
					<div class="btn-group">
						<!-- Main button replaced with an anchor tag -->
						<a href="{{url('/user-funds-history')}}" class="btn btn-primary">Fund Request History</a>
						
						
					</div>
				</div>

				</div>
		

				<div class="row">
                    <div class="col-lg-8 mx-auto">
						<div class="card">
						<form method="post" enctype="multipart/form-data" action="{{route('user.funds.store')}}">
						@csrf
							<div class="card-body p-4">
								<h5 class="mb-4">Fund Request</h5>
                                @if(session()->has('success'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									{{session('success')}}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								@endif 	  
								<div class="row mb-3">
									<label for="input39"  class="col-sm-3 col-form-label " >Select Payment Method</label>
									<div class="col-sm-9">
										<select class="form-select select_address" name="payment_method" id="input39" data-response="payment_type" required>
											<option selected>Select Payment Method</option>
											@foreach($paymentMethods as $paymentMethod)
                                              <option value="{{$paymentMethod->slug}}">{{$paymentMethod->name}}</option>
                                            @endforeach
											</select>
											@error('payment_method')
												<p style="color: red;">{{ $message }}</p>
											@enderror
									</div>
								</div>


								<div class="row mb-3">
									<label for="input39"  class="col-sm-3 col-form-label ">Payment Option</label>
									<div class="col-sm-9">
									<select class="form-select payment_type" name="payment_type" id="payment_type" data-response="address_res"  required>
                                                <option value="">Payment Option</option>
												</select>
												@error('payment_type')
												<p style="color: red;">{{ $message }}</p>
											@enderror
									</div>
								</div>


								


									<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Enter Amount</label>
										<div class="col-sm-9">
										<input type="number" name="amount" value="{{ old('amount') }}"class="form-control" id="horizontalInput1" placeholder="Enter Amount">
												@error('amount')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>
									<div class="row mb-3">
										<label for="input36" class="col-sm-3 col-form-label">Txn ID</label>
										<div class="col-sm-9">
										<input type="text" class="form-control" name="txn_id" id="horizontalInput2" placeholder="Txn ID">
											@error('txn_id')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>
									<div class="row mb-3">
										<label for="input37" class="col-sm-3 col-form-label">Choose Payment Slip</label>
										<div class="col-sm-9">
										<input type="file" class="form-control" name="image" id="horizontalInput2" >
											@error('image')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>
									
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<button type="submit" class="btn btn-primary px-4">Submit</button>
												<a href="{{ url('user-funds') }}" class="{{ $class ?? 'btn btn-light px-4' }}">
													{{ $label ?? 'Reset' }}
												</a>

											</div>
										</div>
									</div>
							</div>
	                        </form>
						</div>

						
					</div>
				</div><!--end row-->


				<div class="card">
					<div class="card-body">
						<div class="row row-cols-1 g-3 row-cols-lg-auto align-items-center">
						
						</div>
					</div>
				</div>




			</div>
		</div>
		<!--end page wrapper -->
				<script>
				// Select address change event
				$('.select_address').on('change', function() {
				
				var $this = $(this);
				var res_area = $this.data('response');
				const FundUrl = '{{ route("fund.getPaymentMethod") }}';
				//alert(FundUrl);
				var selectedValue = $this.val();

				$.ajax({
					type: "POST",
					url: FundUrl,
					data: { 
					connection_type: selectedValue,
                    _token: $('meta[name="csrf-token"]').attr('content')   
					},
					success: function(response) {
						//alert(response);
					
						$('#' + res_area).html(response);
					},
					error: function(xhr, status, error) {
						console.error("Error fetching payment methods:", error);
						alert("Something went wrong. Please try again.");
					}
				});
			});



				
			// Payment type change event
				$('.payment_type').on('change', function() {
					
					var $this = $(this);
					var res_area = $this.data('response');
					var FundUrlimg = '{{ route("fund.getPaymentMethodImage") }}';
					var selectedValue = $this.val();

					$.ajax({
						type: "POST",
						url: FundUrlimg, // You can pass this dynamically via Blade
						data: { 
						connection_type: selectedValue,
						_token: $('meta[name="csrf-token"]').attr('content')
						},
						success: function(response) {
							var res = JSON.parse(response); // Assuming the response is a JSON object
							$('#' + res_area).attr("src", res.msg);
							$('#address_div').show();
							$('#referral_address').val(res.address);
							$('#res_address').html("Address: " + res.address);
						},
						error: function(xhr, status, error) {
							console.error("Error fetching payment method image:", error);
							alert("Something went wrong. Please try again.");
						}
					});
				});	
				
				
				 function copyLink11() {
        // Get the input field
        var inputField = document.getElementById('referral_address');

        // Check if the input field has value
        if (inputField.value.trim() === "") {
            alert("No text to copy!");
            return;
        }

        // Copy the text to the clipboard
        navigator.clipboard.writeText(inputField.value)
            .then(() => {
                // Show the popup
                var popup = document.getElementById('copyPopup');
                popup.classList.add('show');
                
                // Hide the popup after 2 seconds
                setTimeout(() => {
                    popup.classList.remove('show');
                }, 2000);
            })
            .catch((error) => {
                console.error("Error copying text: ", error);
            });
    }
				</script>
				 @include('user/pages/footer')