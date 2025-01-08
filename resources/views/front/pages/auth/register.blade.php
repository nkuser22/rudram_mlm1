@include('front/pages/auth/header')
@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="{{$Conn->websiteInfo('logo')}}" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">Register User</h5>
										<p class="mb-0">Please fill the below details to create your account</p>
									</div>
									<div class="form-body">
                                    @if(session('message'))
                                    <div class="alert alert-success">{{ session('message') }}</div>
                                        @endif
                                        
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif  
										<form class="row g-3" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="col-12">
												<label for="inputUsername" class="form-label">U Sponsor</label>
												<input type="text" class="form-control check_sponsor_exist" id="inputUsername" name="u_sponsor" data-response="sponsor_res" value="<?php
                                                
                                                use Illuminate\Support\Facades\DB;
                                                use Illuminate\Support\Facades\Session;
                                            
                                                $refff = request('ref');
                                                $u_sponsor = old('u_sponsor');
                                                $refer_name = null;
                                            
                                                if ($refff) {
                                                    $top_id = DB::table('users')->select('username', 'name')->where('username', $refff)->first();
                                                    if ($top_id) {
                                                        echo $top_id->username;
                                                        $refer_name = $top_id->name;
                                                        Session::put('refer_name', $refer_name);
                                                    }
                                                } elseif (!empty($u_sponsor)) {
                                                    echo $u_sponsor;
                                                } else {
                                                    $top_id = DB::table('users')->select('username', 'name')->first();
                                                    if ($top_id) {
                                                        echo $top_id->username;
                                                    }
                                                }
                                            
                                                
                                                ?>">
                                                <div id="sponsor_res">
                                                @error('u_sponsor')
                                                    
                                                @enderror
                                                </div>
											</div>
                                            <div class="col-12">
												<label for="inputUsername" class="form-label">Name</label>
												<input type="text" class="form-control" id="inputUsername" name="name" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
											<div class="col-12">
												<label for="inputUsername" class="form-label">Username</label>
												<input type="text" class="form-control" id="inputUsername" name="username" value="{{ old('username') }}">
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="inputEmailAddress" name="email" value="{{ old('email') }}" placeholder="">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>

                                            <div class="col-12">
												<label for="inputmobile" class="form-label">Mobile</label>
												<input type="number" class="form-control" id="inputmobile" name="mobile" value="{{ old('mobile') }}" placeholder="">
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>


                                            <div class="col-12">
												<label for="inputSelectCountry" class="form-label">Country</label>
												<select name="country" class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                                <option value="">Select a country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{ old('country') == $country->phonecode ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0"  name="password" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>

                                            <div class="col-12">
												<label for="inputChoosePassword" class="form-label">Confirm Password</label>
												<div class="input-group" id="show_hide_password1">
													<input type="password" class="form-control border-end-0"  name="password_confirmation" id="inputChoosePassword" value="" placeholder="Enter password confirmation"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    @error('passwopassword_confirmationrd')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>
											
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Sign up</button>
												</div>
											</div>
											<div class="col-12">
												<div class="text-center ">
													<p class="mb-0">Already have an account? <a href="{{url('/login')}}">Sign in here</a></p>
												</div>
											</div>
										</form>
									</div>
									<div class="login-separater text-center mb-5"> <span>OR SIGN UP WITH EMAIL</span>
										<hr/>
									</div>
									<div class="list-inline contacts-social text-center">
										<a href="javascript:;" class="list-inline-item bg-facebook text-white border-0 rounded-3"><i class="bx bxl-facebook"></i></a>
										<a href="javascript:;" class="list-inline-item bg-twitter text-white border-0 rounded-3"><i class="bx bxl-twitter"></i></a>
										<a href="javascript:;" class="list-inline-item bg-google text-white border-0 rounded-3"><i class="bx bxl-google"></i></a>
										<a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0 rounded-3"><i class="bx bxl-linkedin"></i></a>
									</div>

								</div>
							</div>
						</div>
					</div>
				 </div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->











@include('front/pages/auth/footer')