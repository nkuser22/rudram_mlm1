@extends('admin_view.main')
@section('content')

<?php
use Illuminate\Support\Facades\DB;
//echo"<pre>";
//print_r($transactions);
//die();

?>
            <!-- index body start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- chart card section start -->
						<div class="col-sm-6 col-xxl-3 col-lg-6">
							<div class="main-tiles border-5 border-0 card-hover card o-hidden">
								<div class="custome-1-bg b-r-4 card-body">
									<div class="media align-items-center static-top-widget">
										<div class="media-body p-0">
											<span class="m-0">Total Users</span>
											<h4 class="mb-0 counter">{{ number_format($totalusers) }}
												<span class="badge badge-light-primary grow">
													<i data-feather="trending-up"></i>8.5%</span>
											</h4>
										</div>
										<div class="align-self-center text-center">
											<i class="ri-database-2-line"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- chart card section end -->


                       <!-- Total Orders Card Section -->
						<div class="col-sm-6 col-xxl-3 col-lg-6">
							<div class="main-tiles border-5 card-hover border-0 card o-hidden">
								<div class="custome-2-bg b-r-4 card-body">
									<div class="media static-top-widget">
										<div class="media-body p-0">
											<span class="m-0">Active Users</span>
											<h4 class="mb-0 counter">{{ number_format($activeUser) }}
												<span class="badge badge-light-danger grow">
													<i data-feather="trending-down"></i>8.5%</span>
											</h4>
										</div>
										<div class="align-self-center text-center">
											<i class="ri-shopping-bag-3-line"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Total Orders Card Section End -->


                      <!-- Total Products Card Section -->
						<div class="col-sm-6 col-xxl-3 col-lg-6">
							<div class="main-tiles border-5 card-hover border-0 card o-hidden">
								<div class="custome-3-bg b-r-4 card-body">
									<div class="media static-top-widget">
										<div class="media-body p-0">
											<span class="m-0">InActive Users</span>
											<h4 class="mb-0 counter">{{ number_format($inactiveUser) }}
												<a href="javascript:void(0)" class="badge badge-light-secondary grow">ADD NEW</a>
											</h4>
										</div>
										<div class="align-self-center text-center">
											<i class="ri-chat-3-line"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Total Products Card Section End -->


                        <!-- Total Customers Card Section -->
						<div class="col-sm-6 col-xxl-3 col-lg-6">
							<div class="main-tiles border-5 card-hover border-0 card o-hidden">
								<div class="custome-4-bg b-r-4 card-body">
									<div class="media static-top-widget">
										<div class="media-body p-0">
											<span class="m-0">Total Investment</span>
											<h4 class="mb-0 counter">{{ number_format($totalRevenue) }}  <!-- Display total customers dynamically -->
												<span class="badge badge-light-success grow">
													<i data-feather="trending-down"></i>8.5%</span>
											</h4>
										</div>
										<div class="align-self-center text-center">
											<i class="ri-user-add-line"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Total Customers Card Section End -->


									



					<!-- Earning chart start -->
					<div class="col-xl-6">
						<div class="card o-hidden card-hover">
							<div class="card-header border-0 pb-1">
								<div class="card-header-title">
									<h4>Investment Report</h4>
								</div>
							</div>
							<div class="card-body p-0">
								<canvas id="report-chart"></canvas>
							</div>
						</div>
					</div>
					<!-- Earning chart end -->


                        <!-- Best Selling Product Start -->
                        <div class="col-xl-6 col-md-12">
                            <div class="card o-hidden card-hover">
                                <div class="card-header card-header-top card-header--2 px-0 pt-0">
                                    <div class="card-header-title">
                                        <h4>Recent Users</h4>
                                    </div>

                                    <!--<div class="best-selling-box d-sm-flex d-none">
                                        <span>Short By:</span>
                                        <div class="dropdown">
                                            <button class="btn p-0 dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                data-bs-auto-close="true">Today</button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>-->
                                </div>

						<div class="card-body p-0">
							<div>
								<div class="table-responsive">
									<table class="best-selling-table w-image table border-0">
										<tbody>
											@foreach($recentCustomers as $customer)
											 
												<tr>
													<td>
														<div class="best-product-box">
															<div class="product-name">
															   <h5> Sr.No.</h5>
																<h6> {{ $loop->iteration }}</h6>
															</div>
															<div class="product-name">
																<h5>{{ $customer->name }}</h5>
																<h6>{{ $customer->created_at }}</h6> 
															</div>
														</div>
													</td>

													<td>
														<div class="product-detail-box">
															<h6>Email</h6>
															<h5>{{ $customer->email }}</h5>
														</div>
													</td>

													<td>
														<div class="product-detail-box">
															<h6>Phone</h6>
															<h5>{{ $customer->mobile ?? 'N/A' }}</h5> 
														</div>
													</td>

													<td>
														<div class="product-detail-box">
															<h6>Username</h6>
															<h5>{{ $customer->username ?? 0 }}</h5> 
														</div>
													</td>

													<!--<td>
														<div class="product-detail-box">
															<h6>Date & Time</h6>
															<h5>{{ $customer->created_at}}</h5> 
														</div>
													</td>-->
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>

                            </div>
                        </div>
                        <!-- Best Selling Product End -->


								<!-- Recent orders start-->
				<div class="col-xl-6">
					<div class="card o-hidden card-hover">
						<div class="card-header card-header-top card-header--2 px-0 pt-0">
							<div class="card-header-title">
								<h4>Recent Orders</h4>
							</div>

							<!--<div class="best-selling-box d-sm-flex d-none">
								<span>Short By:</span>
								<div class="dropdown">
									<button class="btn p-0 dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" data-bs-auto-close="true">Today</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
										<li><a class="dropdown-item" href="#">Action</a></li>
										<li><a class="dropdown-item" href="#">Another action</a></li>
										<li><a class="dropdown-item" href="#">Something else here</a></li>
									</ul>
								</div>
							</div>-->
						</div>

						<div class="card-body p-0">
							<div>
								<div class="table-responsive">
									<table class="best-selling-table table border-0">
										<tbody>
											@foreach ($recentOrders as $orderItem)
												<tr>
													<td>
														<div class="best-product-box">
															<div class="product-name">
																<h5>{{ $orderItem->product_name ? $orderItem->product->product_name : 'Product not found' }}</h5>
																<h6>#{{ $orderItem->id }}</h6>
															</div>
														</div>
													</td>

													<td>
														<div class="product-detail-box">
															<h6>Date Placed</h6>
															<h5>{{ \Carbon\Carbon::parse($orderItem->created_at)->format('d/m/Y') }}</h5>
														</div>
													</td>

													<td>
														<div class="product-detail-box">
															<h6>Price</h6>
															<h5>${{ number_format($orderItem->price, 2) }}</h5>
														</div>
													</td>

													<td>
														<div class="product-detail-box">
															<h6>Order Status</h6>
															<h5>
															  @if($orderItem->status == 0)
																	<span>Pending</span>
																@elseif($orderItem->status == 1)
																	<span>Approved</span>
																@elseif($orderItem->status == 2)
																	<span>Shipped</span>
																@elseif($orderItem->status == 3)
																	<span>Delivered</span>
																@elseif($orderItem->status == 4)
																	<span>Completed</span>
																@else
																	<span>Unknown Status</span>
																@endif
															
															</h5>
														</div>
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
				<!-- Recent orders end -->


									 <!-- Transactions start-->
				<div class="col-xxl-6 col-md-6">
					<div class="card o-hidden card-hover">
						<div class="card-header border-0">
							<div class="card-header-title">
								<h4>Recent Transactions</h4>
							</div>
						</div>

						<div class="card-body pt-0">
							<div>
								<div class="table-responsive">
									<table class="user-table transactions-table table border-0">
										<tbody>
											@foreach($transactions as $transaction)
											@php
											$user = DB::table('users')->where('id', $transaction->u_code)->first();
                                            @endphp
											    
												<tr class="">
												<td>
														
														<div class="transactions-name">
															<h6>{{ $user->username }}</h6>
															<p>{{ $user->name }}</p>
														</div>
													</td>
													<td>
														
														<div class="transactions-name">
															<h6>Amount</h6>
															<p>{{ $transaction->amount }}</p>
														</div>
													</td>
													<td>
														
														<div class="transactions-name">
															<h6>Tx Type</h6>
															<p>{{ $transaction->tx_type }}</p>
														</div>
													</td>
													<td>
														
														<div class="transactions-name">
															<h6>Date & Time</h6>
															<p>{{ $transaction->date }}</p>
														</div>
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
				<!-- Transactions end-->



                        <!-- To Do List start-->
                       <!-- <div class="col-xxl-4 col-md-6">
                            <div class="card o-hidden card-hover">
                                <div class="card-header border-0">
                                    <div class="card-header-title">
                                        <h4>To Do List</h4>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <ul class="to-do-list">
                                        <li class="to-do-item">
                                            <div class="form-check user-checkbox">
                                                <input class="checkbox_animated check-it" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                            </div>
                                            <div class="to-do-list-name">
                                                <strong>Pick up kids from school</strong>
                                                <p>8 Hours</p>
                                            </div>
                                        </li>
                                        <li class="to-do-item">
                                            <div class="form-check user-checkbox">
                                                <input class="checkbox_animated check-it" type="checkbox" value=""
                                                    id="flexCheckDefault1">
                                            </div>
                                            <div class="to-do-list-name">
                                                <strong>Prepare or presentation.</strong>
                                                <p>8 Hours</p>
                                            </div>
                                        </li>
                                        <li class="to-do-item">
                                            <div class="form-check user-checkbox">
                                                <input class="checkbox_animated check-it" type="checkbox" value=""
                                                    id="flexCheckDefault2">
                                            </div>
                                            <div class="to-do-list-name">
                                                <strong>Create invoice</strong>
                                                <p>8 Hours</p>
                                            </div>
                                        </li>
                                        <li class="to-do-item">
                                            <div class="form-check user-checkbox">
                                                <input class="checkbox_animated check-it" type="checkbox" value=""
                                                    id="flexCheckDefault3">
                                            </div>
                                            <div class="to-do-list-name">
                                                <strong>Meeting with Alisa</strong>
                                                <p>8 Hours</p>
                                            </div>
                                        </li>

                                        <li class="to-do-item">
                                            <form class="row g-2">
                                                <div class="col-8">
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Enter Task Name">
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-primary w-100 h-100">Add
                                                        task</button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->
                        <!-- To Do List end-->


                    </div>
                </div>
				
							<!-- Include Chart.js -->
			<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

			<script>
				var revenueData = @json($revenues); // Pass the revenues data from the controller

				// Prepare the labels and data for the chart
				var labels = revenueData.map(function(item) {
					return item.date; // Extract date for x-axis
				});

				var data = revenueData.map(function(item) {
					return item.total_revenue; // Extract total revenue for y-axis
				});

				// Create the chart
				var ctx = document.getElementById('report-chart').getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'line', // Chart type (line, bar, etc.)
					data: {
						labels: labels, // x-axis labels (dates)
						datasets: [{
							label: 'Revenue',
							data: data, // y-axis data (revenue)
							borderColor: 'rgb(75, 192, 192)',
							tension: 0.1,
							fill: false
						}]
					},
					options: {
						responsive: true,
						scales: {
							y: {
								beginAtZero: true
							}
						}
					}
				});
			</script>
                <!-- Container-fluid Ends-->
                @endsection