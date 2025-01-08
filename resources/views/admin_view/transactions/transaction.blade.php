@extends('admin_view.main')
@section('content')

<?php
use Illuminate\Support\Facades\DB;
//echo"<pre>";
//print_r($transactions);
//die();
?>
    <!-- Reports Section Start -->
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                       <!-- Total Amount Card -->
					   <div class="col-xl-4 col-lg-4 col-md-4">
							<div class="card o-hidden">
								<div class="card-header border-0 pb-1">
									<div class="card-header-title">
										<h4>Total Amount</h4>
									</div>
								</div>
								<div class="card-body p-0">
									<div id="saler-summary">{{$currency}}{{ number_format($totalAmount, 2) }}</div>
								</div>
							</div>
						</div>

						<!-- Today Amount Card -->
						<div class="col-xl-4 col-lg-4 col-md-4">
							<div class="card o-hidden">
								<div class="card-header border-0 pb-1">
									<div class="card-header-title">
										<h4>Today Amount</h4>
									</div>
								</div>
								<div class="card-body p-0">
									<div id="saler-summary">{{$currency}}{{ number_format($todayAmount, 2) }}</div>
								</div>
							</div>
						</div>

                        <!-- Employ Salary  start-->
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="h-100">
                                <div class="card o-hidden">
                                    <div class="card-header border-0 pb-1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="card-header-title">
                                                <h4>Yesterday Amount</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="pie-chart">
                                            <div id="employ-salary">{{$currency}}{{ number_format($yesterdayAmount, 2) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Employ Salary end-->

                     

                        

                        <!-- Booking history start-->
                        <div class="col-12">
                            <div class="card">

							
                                <div class="card-header border-0 pb-1">
                                    <div class="card-header-title">
                                        <h4>Transation History</h4>
                                    </div>
                                </div>
                                 

                                <div class="card-body">

								  <!-- Hide/Show Filter Button -->
								  <button id="toggle-filter" class="btn btn-primary btn-sm">Show Filter</button>

									<!-- Filter Form -->
									<div id="table_id_filter" class="dataTables_filter" style="display: none;">
										<form method="GET" action="{{ url('admin/transactions') }}" class="form-inline">
											
										<div class="form-group mx-2">
											<input type="text" name="username" class="form-control" placeholder="User ID" value="{{ request('username') }}">
										</div>
										<div class="form-group mx-2">
											<input type="text" name="name" class="form-control" placeholder="Name" value="{{ request('name') }}">
										</div>

										   <div class="form-group mx-2">
												<label for="from_date" class="mr-2">From Date:</label>
												<input type="date" name="from_date" id="from_date" value="{{ request('from_date') }}" class="form-control">
											</div>
											<div class="form-group mx-2">
												<label for="to_date" class="mr-2">To Date:</label>
												<input type="date" name="to_date" id="to_date" value="{{ request('to_date') }}" class="form-control">
											</div>
											
											<button type="submit" class="btn btn-sm btn-solid mx-2">Filter</button>
											<a href="{{ url('admin/transactions') }}" class="btn btn-sm btn-light mx-2">Clear</a>
										</form>
									</div>

                                    <div>
                                        <div class="table-responsive">
                                          <table class="table all-package order-table theme-table" >
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Userid(Name)</th>
												<th>Date</th>
												<th>Amount</th>
												<th>Tx Type</th>
												<th>Debit Credit</th>
												<th>Wallet Type</th>
												<th>Remark</th>
												<!--<th>Options</th>-->
											</tr>
										</thead>
										<tbody>
											@foreach($transactions as $transaction)
											@php
											$user = DB::table('users')->where('id', $transaction->u_code)->first();
                                            @endphp											
												
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $user->username ?? 'N/A' }} ({{ $user->name ?? 'N/A' }})</td>
													<td>{{ $transaction->created_at }}</td>
													<td>{{$currency}}{{ number_format($transaction->amount, 2) }}</td>
													<td>{{ $transaction->tx_type ?? 'N/A' }}</td>
													<td>{{ ucfirst($transaction->debit_credit) }}</td>
													<td>{{ $transaction->wallet_type ?? 'N/A' }}</td>
													<td>{{ $transaction->remark ?? 'N/A' }}</td>
													<!--<td>
														<ul>
															<li>
																<a href="#">
																	<span class="ri-eye-line"></span>
																</a>
															</li>
															<li>
																<a href="#">
																	<span class="lnr lnr-pencil"></span>
																</a>
															</li>
															<li>
																<a href="javascript:void(0)">
																	<span class="lnr lnr-trash"></span>
																</a>
															</li>
														</ul>
													</td>-->
												</tr>
											@endforeach

											@if($transactions->isEmpty())
												<tr>
													<td colspan="9" class="text-center">No Transactions Found</td>
												</tr>
											@endif
										</tbody>
									</table>
									
                                              
                                        </div>
                                    </div>
									{{ $transactions->links() }}
                                </div>
                            </div>
                        </div>
                        <!-- Booking history  end-->
                    </div>
                </div>
				
                <!-- Container-fluid Ends-->
                @endsection