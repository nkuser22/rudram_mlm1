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
                                        <h5>Approved Withdrawal List</h5>
                                       <a href="javascript:void(0)" class="btn btn-solid">Download</a>

                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                          <table class="table all-package order-table theme-table" id="table_id">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Userid(Name)</th>
													<th>Status</th>
													<th>Date</th>
													<th>Amount</th>
                                                    <th>Charge</th>
                                                    <th>Payable</th>
													<th>Payment Method</th>
													
												</tr>
											</thead>
											<tbody>
												@foreach($approvedFunds as $fundHistorylist)
													@php
														$user = DB::table('users')->where('id', $fundHistorylist->u_code)->first();
                                                        $bank_details = json_decode($fundHistorylist->payment_detail, true);
                                                        $account_type = $bank_details['account_type'] ?? null; // Default to null if 'account_type' doesn't exist
														$fields_arr = isset($account_type) && array_key_exists($account_type, $fields) 
															? $fields[$account_type] 
															: [];
                                                       
													@endphp
													<tr data-bs-toggle="offcanvas" href="#order-details">
														<td>{{ $loop->iteration }}</td>
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
														<td>{{ number_format($fundHistorylist->amount, 2)+number_format($fundHistorylist->tx_charge, 2) }}</td>
                                                        <td>{{ number_format($fundHistorylist->tx_charge, 2) }}</td>
                                                        <td>{{ number_format($fundHistorylist->amount, 2) }}</td>
														<td>
                                                            @foreach($bank_details as $_key => $account_details)
                                                                @if($_key != 'account_type' && !empty($fields_arr) && array_key_exists($_key, $fields_arr))
                                                                    @php
                                                                        $ky = $fields_arr[$_key];
                                                                    @endphp
                                                                    {{ $ky }} : {{ $account_details }}<br>
                                                                @endif
                                                            @endforeach
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
                    </div>
                </div>
                <!-- Table End -->
                @endsection