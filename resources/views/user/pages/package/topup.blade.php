@include('user/pages/header')
@php
use App\Models\UserWallet;
$wallet = new UserWallet();
@endphp

    <!--start page wrapper -->
    <div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Forms</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Buy Package</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
					<div class="btn-group">
						<a href="{{url('/user-packages')}}" class="btn btn-primary">Package History</a>
					</div>
				</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-6 mx-auto">
                          @if(session()->has('success'))
                            <x-alert type="success" title="Success Alerts" icon="bx bxs-check-circle">
                            {{session('success')}}
                            </x-alert>
                            @endif 
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Buy Package</h5>
							</div>
                           
							<div class="card-body p-4">
								
                            <form class="row g-3 needs-validation" novalidate method="post" enctype="multipart/form-data" action="{{route('user.packages.create')}}" id="mainForm">
                                @csrf 
                                <div class="col-md-12">
                                    @if($available_wallets)
                                        @php
                                            $useable_wallet = json_decode($available_wallets);
                                        @endphp

                                        @if(count((array) $useable_wallet) > 1)
                                            <label for="selected_wallet" class="form-label">Select Wallet</label>
                                            <select name="selected_wallet" id="selected_wallet" class="form-select" required>
                                                <option selected disabled value>Select Wallet...</option>
                                                @foreach($useable_wallet as $wlt_key => $wlt_name)
                                                    @php
                                                        $balance = round($wallet->getWallet($userid, $wlt_key), 2);
                                                    @endphp
                                                    <option value="{{ $wlt_key }}">{{ $wlt_name }} : {{ $currency }} {{ $balance }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid wallet.
                                            </div>
                                        @else
                                            @foreach($useable_wallet as $wlt_key => $wlt_name)
                                                @php
                                                    $balance = round($wallet->getWallet($userid, $wlt_key), 2);
                                                @endphp
                                                <span id="wallet">{{ $wlt_name }} : {{ $currency }} {{ $balance }}</span>
                                                <input type="hidden" name="selected_wallet" value="{{ $wlt_key }}">
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                                @error('selected_wallet')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <div class="col-md-12">
                                    <label for="bsValidation1" class="form-label">User ID</label>
                                    <input type="text" name="username" id="bsValidation1" value="" data-response="usernameResponse" data-response1="package_res" class="form-control check_username_exist" placeholder="Enter UserID" aria-describedby="helpId">
                                    <div id="usernameResponse"></div>
                                    @error('username')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="bsValidation9" class="form-label">Select Package</label>
                                    <select id="bsValidation9" class="form-select" name="selected_pin" required>
                                        <option selected disabled value>Select Package ...</option>
                                        @foreach ($pinDetails as $pin)
                                            <option value="{{ $pin->pin_type }}">{{ $pin->pin_type }}</option>
                                        @endforeach
                                    </select>
                                    @error('selected_pin')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4" >Submit</button>
                                        <a href="{{ url('user-packages/create') }}" class="{{ $class ?? 'btn btn-light px-4' }}">
                                            {{ $label ?? 'Reset' }}
                                        </a>
                                    </div>
                                </div>
                                <!-- Modal for Terms and Conditions -->
                                <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <!-- Add your terms and conditions content here -->
                                                    By proceeding, you agree to the terms and conditions of our service.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="agreeTerms">Agree and Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>

                            </div>
						</div>
					</div>
				</div>
				<!--end row-->

				


			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		 <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

    <script src="{{asset('user/u1/assets/plugins/validation/jquery.validate.min.js')}}"></script>
	<script src="{{asset('user/u1/assets/plugins/validation/validation-script.js')}}"></script>
	<script>
		
			(function () {
			  'use strict'
	         var forms = document.querySelectorAll('.needs-validation')
	        Array.prototype.slice.call(forms)
				.forEach(function (form) {
				  form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					  event.preventDefault()
					  event.stopPropagation()
					}
	
					form.classList.add('was-validated')
				  }, false)
				})
			})()

            document.getElementById('showTerms').addEventListener('click', function () {
    var termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
    termsModal.show();
});

document.getElementById('agreeTerms').addEventListener('click', function () {
    document.getElementById('mainForm').submit();
});


	</script>
		@include('user/pages/footer')