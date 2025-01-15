@include('user/pages/header')
@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp               
        <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Fund Request History</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">History</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
					<div class="btn-group">
						<!-- Main button replaced with an anchor tag -->
						<a href="{{url('/user-funds')}}" class="btn btn-primary">Add Fund Request</a>
						
						
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
                                    <th>Sr.No.</th>
                                    <th>Reason</th>
                                    <th>Userid(Name)</th>
                                    <th>Date</th>
                                    <th>Payment Slip</th>
                                    <th>Amount</th>
                                    <th>Tx Type</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fundRequest as $transaction)
                                <?php
                                // echo"<pre>";
                                // print_r($transaction);
                                // exit;
                                ?>
                                @php
                                $user = DB::table('users')->where('id', $transaction->u_code)->first();
                                @endphp											
                                        
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->reason }}</td>
                                    <td>{{ $user->username ?? 'N/A' }} ({{ $user->name ?? 'N/A' }})</td>
                                    <td>{{ $transaction->date }}</td>
                                    <td>
                                        @if ($transaction->payment_slip)
                                            <a target="_blank" href="{{ asset('storage/' . $transaction->payment_slip) }}"><img src="{{ asset('storage/' . $transaction->payment_slip) }}" alt="Fund Req" width="100"></a>
                                        @endif
                                    </td>
                                    <td>{{$Conn->websiteInfo('currency')}} {{ number_format($transaction->amount, 2) }}</td>
                                    <td>{{ $transaction->tx_type }}</td>
                                    
                                </tr>
                                @endforeach

                                    @if($fundRequest->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">No Transactions Found</td>
                                        </tr>
                                    @endif
                                
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		
   @include('user/pages/footer')       