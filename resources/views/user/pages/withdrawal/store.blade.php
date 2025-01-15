@include('user/pages/header')
@php
use App\Models\UserWallet;
$wallet = new UserWallet();
@endphp
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    





					<!--start page wrapper -->


		<div class="page-wrapper">
		
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Withdrawal Request</div>
                  				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Withdrawal Request</li>
							</ol>
						</nav>
					</div>

					<div class="ms-auto">
					<div class="btn-group">
						<!-- Main button replaced with an anchor tag -->
						<a href="{{url('/user-accounts')}}" class="btn btn-primary">Add Account Settings</a>
						
						
					</div>
				</div>
                </div>
		
				
		
		
			
			
			
				</div>
				<!--end row-->
			
				<div class="row">
                    <div class="col-lg-8 mx-auto">

					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Withdrawal</p>
										<h4 class="my-1">{{$currency}}{{$totalAmountSum}}</h4>
										
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Processing </p>
										<h4 class="my-1">{{$currency}}{{$totalAmountStatus0}}</h4>
										
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-time'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Complete </p>
										<h4 class="my-1">{{$currency}}{{$totalAmountStatus1}}</h4>
										
									</div>
									<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-check-circle'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Rejected </p>
										<h4 class="my-1">{{$currency}}{{$totalAmountStatus2}}</h4>
										
									</div>
									<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-x-circle'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
						
						<div class="card">
						<form method="post" enctype="multipart/form-data" action="{{route('user.withdraw.store')}}">
						@csrf
							<div class="card-body p-4">
								<h5 class="mb-4">Withdrawal Request</h5>

								@if(session()->has('success'))
								<x-alert type="success" title="Success Alerts" icon="bx bxs-check-circle">
								{{session('success')}}
								</x-alert>
                                @endif 	  

                                @if(session()->has('error'))
                                {{$error=session('error')}}
								<x-error-alert :message="$error" />
								@endif 	

                               
								<div class="row mb-3">
                                
									<div class="col-sm-9">
                                    @if($available_wallets)
                                        @php
                                            $useable_wallet = json_decode($available_wallets);
                                        @endphp

                                        @if(count((array) $useable_wallet) > 1)
                                           
                                            <select name="selected_wallet" id="selected_wallet" class="form-select" required>
                                                <option selected disabled value>Select Wallet...</option>
                                                @foreach($useable_wallet as $wlt_key => $wlt_name)
                                                    @php
                                                        $balance = round($wallet->getWallet($userid, $wlt_key), 2);
                                                    @endphp
                                                    <option value="{{ $wlt_key }}">{{ $wlt_name }} : {{ $currency }} {{ $balance }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid wallet.
                                            </div>
                                        @else
                                            @foreach($useable_wallet as $wlt_key => $wlt_name)
                                                @php
                                                    $balance = round($wallet->getWallet($userid, $wlt_key), 2);
                                                @endphp
                                                <span id="wallet">{{ $wlt_name }} : {{ $currency }} {{ $balance }}</span>
                                                <input type="hidden" name="selected_wallet" value="{{ $wlt_key }}">
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                                @error('selected_wallet')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

									</div>
								

								<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Enter Amount</label>
										<div class="col-sm-9">
										<input type="number" name="amount" value="{{ old('amount') }}"class="form-control" id="horizontalInput1" placeholder="Enter Amount">
												@error('amount')
												<p style="color: red;">{{ $message }}</p>
											@enderror
										</div>
									</div>
									
								
									
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<button type="submit" class="btn btn-primary px-4">Submit</button>
												<a href="{{ url('withdrawal') }}" class="{{ $class ?? 'btn btn-light px-4' }}">
													{{ $label ?? 'Reset' }}
												</a>

											</div>
										</div>
									</div>
							</div>
	                        </form>
						</div>

						
					</div>
				</div><!--end row-->

                <div class="row">
                    <div class="col-lg-8 mx-auto">
				<div class="card">
					<div class="card-body">
						
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
                            <thead>
                                        <tr>
                                            <th>Sr.No.</th>
											<th>Withdrawal Amount</th>
											<th>Charge</th>
											<th>Payable</th>
											<th>Reason</th>
											<th>Status</th>
											
                                        </tr>
                                        </thead>
                                        <tbody>
										@foreach($withdrawals as $transaction)
										<tr>
                                            <td>{{ $loop->iteration }}</td>
											<td>{{$currency}}{{ $ttl_amt=$transaction->amount+$transaction->tx_charge }}</td>
                                            <td>{{$currency}}{{ $ttl_amt*$charge/100 }}</td>
											<td>{{$currency}}{{ $transaction->amount }}</td>
											<td>{{ $transaction->reason }}</td>
											<td>
                                                @if($transaction->status == 1)
                                                    <span class="badge bg-success">Completed</span>
                                                @elseif($transaction->status == 0)
                                                    <span class="badge bg-warning">Processing</span>
                                               
												@elseif($transaction->status == 2)
                                                    <span class="badge bg-danger">Rejected</span>
                                                @else
                                                    <span class="badge bg-secondary">Unknown</span>
                                                @endif
                                            </td>

                                        </tr>
										@endforeach

											@if($withdrawals->isEmpty())
												<tr>
													<td colspan="9" class="text-center">No Withdrawal Found</td>
												</tr>
											@endif
                                        
                                        </tbody>
                                    </table>
						</div>
						</div>
					
				</div>
                </div>
                </div>




			</div>
		</div>
	
				 @include('user/pages/footer')