@include('user/pages/header')
<?php
use App\Models\Useraccounts;
$userId = auth()->id();
?>
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

					<!--start page wrapper -->
		<div class="page-wrapper">
		
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Account Settings</div>
                  				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Account</li>
							</ol>
						</nav>
					</div>

					<div class="ms-auto">
					<div class="btn-group">
						<!-- Main button replaced with an anchor tag -->
						<a href="#" class="btn btn-primary">Account History</a>
						
						
					</div>
				</div>

				</div>
		

				<div class="row">
                    <div class="col-lg-8 mx-auto">
						<div class="card">
						<form method="post" enctype="multipart/form-data" action="{{route('accounts.store')}}">
						@csrf
							<div class="card-body p-4">
								<h5 class="mb-4">Account Settings</h5>
								@if(session()->has('success'))
								<x-alert type="success" title="Success Alerts" icon="bx bxs-check-circle">
								{{session('success')}}
								</x-alert>
                                @endif 	  
								<div class="row mb-3">
									<label for="input39"  class="col-sm-3 col-form-label " >Select Payment Type</label>
									<div class="col-sm-9">
										<select class="form-select account_type" name="account_type" id="input39" data-response="add_account_sec" data-blursection="blursection" data-loader="account_add_loader" required>
											<option selected>---Select Type---</option>
											@foreach($companyPaymentMethods as $paymentMethod)
											
											<option value="<?= $paymentMethod->unique_name;?>" ><?= $paymentMethod->method_name;?></option>
                                            @endforeach
											</select>
											@error('payment_method')
												<p style="color: red;">{{ $message }}</p>
											@enderror
									</div>
								</div>

                                <div class="row mb-3">
                                <div id="add_account_sec">
    						      
    						     </div>
                                 </div>

								
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<button type="submit" class="btn btn-primary px-4">Submit</button>
												<a href="{{ url('user-accounts') }}" class="{{ $class ?? 'btn btn-light px-4' }}">
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

                <div class="row">
                    <div class="col-lg-8 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							
                            <table class="table table-bordered table-hover">
								<tr>
									<th>S No.</th>
									<th>Default</th>
									<th>Account details</th>
									<th>Action</th>
								</tr>
                               <?php 
							   $myAccounts = Useraccounts::where('u_code', $userId)->where('status', 1)->first();
                               if ($myAccounts) {
									$default = $myAccounts->default_account;
									$accounts = $myAccounts->accounts ? json_decode($myAccounts->accounts, true) : [];
									?>
								@if($accounts)
									@php $sno = 0; @endphp
									@foreach($accounts as $key => $account)
										@php
											$sno++;
											$acc_type = $account['account_type'];
											$fields_arr = !empty($fields) && array_key_exists($acc_type, $fields) ? $fields[$acc_type] : [];
										@endphp
										<tr>
											<td>{{ $sno }}</td>
											<td>
												@if($default == $key)
													<i class="fa fa-hand-o-right" aria-hidden="true"></i>
												@endif
											</td>
											<td>
												@foreach($account as $_key => $account_details)
													@if($_key != 'account_type')
														@php
															$key_label = !empty($fields_arr) && array_key_exists($_key, $fields_arr) ? $fields_arr[$_key] : $_key;
														@endphp
														{{ $key_label }} : {{ $account_details }}<br>
													@endif
												@endforeach
											</td>
											<td>
												@if($default != $key)
													@php $sd_id = $key + 1; @endphp
													
													<form action="{{ route('accounts.addDelete', ['id' => $sd_id]) }}" method="POST" style="display:inline;">
														@csrf
														<button type="submit" class="btn btn-danger btn-sm">Delete</button>
													</form>
													<form action="{{ route('accounts.defaultAccount', ['id' => $sd_id]) }}" method="POST" style="display:inline;">
														@csrf
														<button type="submit" class="btn btn-info btn-sm">Set Default</button>
													</form>

												@endif
											</td>
										</tr>
									@endforeach
								   @endif
								<?php
								}else{
								?>
									<tr>
										<td colspan="4"><center><a class="button_data_link_anhor" href="{{url('user-accounts') }}">Add Account</a></center></td>
									</tr>
								<?php
								}
								?>
							</table>

						</div>
					</div>
				</div>
				</div>
				</div>






			</div>
		</div>
		<!--end page wrapper -->
				<script>
			

$('.account_type').on('change', function () {
     
        const $this = $(this);

       
        const resArea = $this.data('response');
        const blurSection = $this.data('blursection');
        const loader = $this.data('loader');

           
            $('#' + blurSection).css('filter', 'blur(8px)');
            $('#' + loader).css('display', 'block');

            const accType = $this.val(); 
            var urlaccount= '{{ route("accounts.getSection") }}';
            //alert(urlaccount);
            // Perform the AJAX request
            $.ajax({
                type: "POST",
                url: urlaccount, 
                data: { 
                    
                    acc_type: accType ,
                    _token: $('meta[name="csrf-token"]').attr('content')
                
                },
                
                success: function (response) {
                   // alert(response);
                    // On success, display the response inside the result area
                    $('#' + resArea).html(response);
                },
                error: function (xhr, status, error) {
                    // Log the error and show a failure message
                    console.error('AJAX Error:', error);
                    $('#' + resArea).html('<p style="color:red;">Failed to load data. Please try again.</p>');
                },
                complete: function () {
                    // Remove the blur effect and hide the loader
                    $('#' + blurSection).css('filter', 'blur(0px)');
                    $('#' + loader).css('display', 'none');
                }
            });
        });
				</script>
				 @include('user/pages/footer')