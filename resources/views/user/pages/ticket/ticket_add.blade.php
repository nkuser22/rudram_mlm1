	 @include('user/pages/header')
	 @php
	 use Illuminate\Support\Facades\Auth;
	 use Illuminate\Support\Facades\DB;
	 $userId = auth()->id();
	 $user = DB::table('users')->where('id', $userId)->first();
	 @endphp
	<!--start page wrapper -->
	<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Support</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Support Ticket</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
					<div class="btn-group">
						<a href="{{url('/user-tickets')}}" class="btn btn-primary">Ticket History</a>
					</div>
				</div>
				</div>
				<!--end breadcrumb-->
                

				<div class="row">
                    <div class="col-lg-8 mx-auto">
						
						<div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4">Support Ticket</h5>
								
								@if(session()->has('success'))
								<x-alert type="success" title="Success Alerts" icon="bx bxs-check-circle">
								{{session('success')}}
								</x-alert>
                                @endif 

								<form method="post" enctype="multipart/form-data" action="{{route('user.tickets.create')}}">
								   @csrf
									<div class="row mb-3">
										<label for="input42" class="col-sm-3 col-form-label">Enter Your Name</label>
										<div class="col-sm-9">
											<div class="position-relative input-icon">
												<input type="text" class="form-control" name="name" id="input42" value="{{$user->name}}" placeholder="Enter Your Name" readonly>
											    <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
											</div>
										</div>
									</div>
									
									<div class="row mb-3">
										<label for="input44" class="col-sm-3 col-form-label">Email Address</label>
										<div class="col-sm-9">
											<div class="position-relative input-icon">
												<input type="text" class="form-control" name="email" id="input44" value="{{$user->email}}" placeholder="Email Address" readonly>
											    <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
											</div>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input45" class="col-sm-3 col-form-label">Subject</label>
										<div class="col-sm-9">
											<div class="position-relative input-icon">
												<input type="text" class="form-control" name="subject" id="input45"  placeholder="Subject" >
											    <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-lock'></i></span>
											</div>
										</div>
									</div>
									
									<div class="row mb-3">
										<label for="input47" class="col-sm-3 col-form-label">Query</label>
										<div class="col-sm-9">
										<textarea type="text" class="form-control" name="description" id="input47" placeholder="Enter your Query"></textarea>
										@error('description')
											<p style="color: red;">{{ $message }}</p>
										@enderror
										</div>
									</div>
									
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<button type="submit" class="btn btn-primary px-4">Submit</button>
												<button type="button" class="btn btn-light px-4">Reset</button>
											</div>
										</div>
									</div>
	                              </form>
								</div>
							</div>


						
					</div>
				</div><!--end row-->



				
				
				 @include('user/pages/footer')