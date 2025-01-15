@include('user/pages/header')
<?php 
use App\Models\Order;
use App\Models\Profile;
$Order = new Order();

?>


			 
			   
		
<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
                <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Packages</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">My Packages</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
					<div class="btn-group">
						<a href="{{url('/user-packages/create')}}" class="btn btn-primary">Buy Package</a>
					</div>
				</div>
				</div>
				<!--end breadcrumb-->
				
				<h6 class="mb-0 text-uppercase">DataTable Import</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
                    <div class="row">
						<div class="col-12 col-lg-4">
							<a href="javascript:void(0)">
							  <div class="card border rounded-4 text-center shadow-none bg-light-primary">
								<div class="card-body">
									<p class="mb-0 fs-3 text-primary">Pakage Amount <br>{{$currency}} {{$totalPackage}}</p>
								</div>
							  </div>
							</a>
						</div>
						<div class="col-12 col-lg-4">
							<a href="javascript:void(0)">
							  <div class="card border rounded-4 text-center shadow-none bg-light-success">
								<div class="card-body">
									<p class="mb-0 fs-3 text-success">Amount<br>{{$currency}} 0 </p>
								</div>
							  </div>
							</a>
						</div>
						<div class="col-12 col-lg-4">
							<a href="javascript:void(0)">
							  <div class="card border rounded-4 text-center shadow-none bg-light-danger">
								<div class="card-body">
									<p class="mb-0 fs-3 text-danger">BV Amount <br>{{$currency}} {{$totalBv}}</p>
								</div>
							  </div>
							</a>
						</div>

					</div><!--end row-->
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>SR.NO.</th>
										<th>User ID</th>
										<th>Active Date</th>
                                        <th>Package Amount </th>
                                        <th>Package Bv</th>
										<th>Status</th>
										
									</tr>
								</thead>
								<tbody>
                                    @foreach($orders as $ulist)
                                    <?php
                                    $userId=$ulist->u_code;
                                    $Profile = (new Profile)->profileInfo($userId);
                                    ?>
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{$Profile->username}}</td>
										<td>{{$Profile->active_date}}</td>
                                        <td>{{$currency}} {{$ulist->order_amount}}</td>
                                        <td>{{$currency}} {{$ulist->order_bv}}</td>
										<td>
                                            <span style="color: {{ $Profile->active_status == 1 ? 'green' : 'red' }}">
                                                {{ $Profile->active_status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>

										
									</tr>
                                    @endforeach
									
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
        @include('user/pages/footer')