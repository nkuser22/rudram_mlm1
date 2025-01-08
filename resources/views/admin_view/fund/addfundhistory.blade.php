<?php
use Illuminate\Support\Facades\DB;
//echo"<pre>";
//print_r($fundHistory);
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
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Add Fund List</h5>
                                       <a href="{{ route('admin.downloadFundHistory') }}" class="btn btn-solid">Download</a>
                                      
                                       
                                    </div>

                                    <div class="mb-4">
                                        <button class="btn btn-info" id="toggleFilterButton">Show/Hide Filters</button>
                                    </div>

                             <div id="filterSection" class="row mb-4" style="display: none;">    
                                <form method="GET" action="" class="row mb-4">
                                    <div class="col-md-2">
                                        <input type="text" name="username" class="form-control" placeholder="User ID" value="{{ request('username') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ request('name') }}">
                                    </div>
                                    
                                    <div class="col-md-2">
                                    
                                        <input type="date" name="from_date" id="from_date" value="{{ request('from_date') }}" class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        
                                        <input type="date" name="to_date" id="to_date" value="{{ request('to_date') }}" class="form-control">
                                    </div>
                                
                                    <div class="col-md-2 mt-2">
                                        <button type="submit" class="btn btn-primary w-100 ">Search</button>
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <a href="{{ url('admin/fund-history') }}" class="btn btn-secondary w-100">Clear</a>
                                    </div>
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
													</tr>
                                                </thead>

                                                <tbody>
												   @foreach($fundHistory as $fundHistorylist)
												    @php
													$user = DB::table('users')->where('id', $fundHistorylist->u_code)->first();
													@endphp	
                                                    <tr data-bs-toggle="offcanvas" href="#order-details">
                                                        <td>
                                                           {{ $loop->iteration }}
                                                        </td>
 
                                                        <td>{{ $user->username ?? 'N/A' }} ({{ $user->name ?? 'N/A' }})</td>
                                                        <td>{{$fundHistorylist->created_at}}</td>
														<td>{{number_format($fundHistorylist->amount, 2)}}</td>
                                                        <td>{{$fundHistorylist->tx_type ?? 'N/A'}}</td>
                                                        <td>{{ ucfirst($fundHistorylist->debit_credit) }}</td>
														<td>{{ $fundHistorylist->wallet_type ?? 'N/A' }}</td>
													   <td>{{ $fundHistorylist->remark ?? 'N/A' }}</td>
                                                    
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

                <script>
                document.getElementById('toggleFilterButton').addEventListener('click', function () {
                        const filterSection = document.getElementById('filterSection');
                        if (filterSection.style.display === 'none' || filterSection.style.display === '') {
                            filterSection.style.display = 'flex'; // Show the filter section
                        } else {
                            filterSection.style.display = 'none'; // Hide the filter section
                        }
                    });

                </script>
                @endsection