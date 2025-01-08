@include('front.pages.auth.header')
@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp
<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">
					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">
                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="{{ asset('front/f1/assets/images/login-images/forgot-password-cover.svg')}}" class="img-fluid" width="600" alt=""/>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                       
							<div class="card-body p-sm-5">
                            <form class="row g-4" action="{{ url('/verify-otp') }}" method="POST">
                                @csrf
								<div class="p-3">
									<div class="text-center">
										<img src="{{$Conn->websiteInfo('logo')}}" width="100" alt="" />
									</div>
									<h4 class="mt-5 font-weight-bold">Verify OTP?</h4>
									<p class="text-muted">Enter your registered username to Verify the  OTP</p>
                                    @if (session('success'))
                                        <div style="color: green;">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div style="color: red;">
                                            {{ session('error') }}
                                        </div>
                                    @endif
									<div class="my-4">
										<label class="form-label">Verify OTP</label>
										<input type="text" name="forgot_otp" class="form-control" placeholder="" />
									</div>
									<div class="d-grid gap-2">
										<button type="submit" class="btn btn-primary"> Verify Otp</button>
										<a href="{{url('/login')}}" class="btn btn-light"><i class='bx bx-arrow-back me-1'></i>Back to
											Login</a>
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
	</div>
	<!--end wrapper-->

@include('front.pages.auth.footer')
