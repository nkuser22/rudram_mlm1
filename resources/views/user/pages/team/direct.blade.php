@include('user/pages/header')
<?php use App\Models\Order;
$Order = new Order();
?>
<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Directs</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">My Directs</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<h6 class="mb-0 text-uppercase">DataTable Import</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>User ID</th>
										<th>Mobile No.</th>
										<th>Joining Date</th>
										<th>Status</th>
										<th>Package</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($Directsdata as $ulist)
                                    <?php
                                    $userId=$ulist->id;
                                    
                                    ?>
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{$ulist->name}}</td>
										<td>{{$ulist->mobile}}</td>
										<td>{{$ulist->created_at}}</td>
										<td>
                                            <span style="color: {{ $ulist->active_status == 1 ? 'green' : 'red' }}">
                                                {{ $ulist->active_status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>

										<td>{{ $Order->package($userId) }}</td>
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