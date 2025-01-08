@extends('admin_view.main')
@section('content')
     <!-- Settings Section Start -->
     <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
				@if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif

				@if($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Details Start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Change Password</h5>
                                    </div>
                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('admin.update-password') }}" method="POST">
                                      @csrf  
										<div class="row">
                                         <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Current Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="current_password" type="password"
                                                        placeholder="Enter Your Password" required>
                                                </div>
                                            </div>
											<div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">New Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="new_password" type="password"
                                                        placeholder="Enter Your New Password" required>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Confirm
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="new_password_confirmation" type="password"
                                                        placeholder="Enter Your Confirm Passowrd">
                                                </div>
                                            </div>
                                        </div>
										<button type="submit" class="btn btn-primary">Change Password</button>
                                    </form>
								
                                </div>
                            </div>
                            <!-- Details End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Settings Section End -->
</div>
<!-- Page Body End-->
@endsection