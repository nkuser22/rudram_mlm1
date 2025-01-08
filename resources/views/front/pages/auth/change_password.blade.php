@include('front/pages/header');
@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp

    <body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
		 <div class="container">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
				<div class="col mx-auto">
					<div class="card">
						<div class="card-body">
                        <form action="{{ url('/change-password') }}" method="POST" class="row g-4">
                          @csrf

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
							<div class="p-4">
								<div class="mb-4 text-center">
									<img src="{{$Conn->websiteInfo('logo')}}" width="60" alt="" />
								</div>
								<div class="text-start mb-4">
									<h5 class="">Genrate New Password</h5>
									<p class="mb-0">We received your reset password request. Please enter your new password!</p>
								</div>
								<div class="mb-3 mt-4">
									<label class="form-label">New Password</label>
									<input type="text" class="form-control" placeholder="Enter new password" name="password" required />
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
								<div class="mb-4">
									<label class="form-label">Confirm Password</label>
									<input type="text" class="form-control" placeholder="Confirm password" name="password_confirmation" required />
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                
                                </div>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary">Change Password</button> <a href="{{url('/login')}}" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
								</div>
							</div>
                         </form>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	</div>
    @include('front/pages/footer');




