<?php
use Illuminate\Support\Facades\DB;
//echo"<pre>";
//print_r($pendingFunds);
//die();
?>
@extends('admin_view.main')
@section('content')

<!-- Order section Start -->
            <div class="page-body">
                <!-- Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
						@if(session()->has('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{session('message')}}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						@endif
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Pending Fund List</h5>
                                        <a href="javascript:void(0)" class="btn btn-solid">Download</a>

                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                          <table class="table all-package order-table theme-table" id="table_id">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Actions</th>
													<th>Userid(Name)</th>
													<th>Status</th>
													<th>Date</th>
													<th>Amount</th>
													<th>Payment Method</th>
													<th>Payment Slip</th>
													<th>Tx ID</th>
												</tr>
											</thead>
											<tbody>
												@foreach($pendingFunds as $fundHistorylist)
													@php
														$user = DB::table('users')->where('id', $fundHistorylist->u_code)->first();
													@endphp
													<tr data-bs-toggle="offcanvas" href="#order-details">
														<td>{{ $loop->iteration }}</td>
														<td>
															@if($fundHistorylist->status == 0)
																<form action="{{ route('funds.approve', $fundHistorylist->id) }}" method="POST" style="display: inline-block;">
																	@csrf
																	@method('PATCH')
																	<button type="submit" class="btn btn-success btn-sm">Approve</button>
																</form>
                                                                   
																<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $fundHistorylist->id }}">
																	Reject
																</button>

																<!-- Modal for Reject -->
																<div class="modal fade" id="rejectModal-{{ $fundHistorylist->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="rejectModalLabel">Reject Fund Request</h5>
																				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																			</div>
																			<form action="{{ route('funds.reject', $fundHistorylist->id) }}" method="POST">
																				@csrf
																				@method('PATCH')
																				<div class="modal-body">
																					<div class="mb-3">
																						<label for="reason-{{ $fundHistorylist->id }}" class="form-label">Reason for Rejection</label>
																						<textarea id="reason-{{ $fundHistorylist->id }}" name="reason" class="form-control" required></textarea>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																					<button type="submit" class="btn btn-danger">Reject</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															@endif
														</td>

														<td class="order-info">{{ $user->username ?? 'N/A' }} ({{ $user->name ?? 'N/A' }})</td>
														<td class="order-success">
															@if($fundHistorylist->status == 0)
																<span >Pending</span>
															@elseif($fundHistorylist->status == 1)
																<span>Approved</span>
															@elseif($fundHistorylist->status == 2)
																<span>Cancelled</span>
															@endif
														</td>
														<td>{{ $fundHistorylist->created_at }}</td>
														<td>{{ number_format($fundHistorylist->amount, 2) }}</td>
														<td>{{ $fundHistorylist->payment_method ?? 'N/A' }}</td>
														<td>
															@if ($fundHistorylist->payment_slip)
																<a target="_blank" href="{{ asset('storage/' . $fundHistorylist->payment_slip) }}"><img src="{{ asset('storage/' . $fundHistorylist->payment_slip) }}" alt="Fund Req" width="100"></a>
															@endif
														</td>
														<td>{{ $fundHistorylist->txn_id ?? 'N/A' }}</td>
														
													</tr>
												@endforeach
											</tbody>
										</table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table End -->
                @endsection