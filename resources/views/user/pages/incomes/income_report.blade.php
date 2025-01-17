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
					<div class="breadcrumb-title pe-3">Income History</div>
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
						<a href="{{url('/user-funds')}}" class="btn btn-primary">Income</a>
						
						
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
                                    <th>Userid(Name)</th>
                                    <th>From User</th>
                                    <th>Amount</th>
                                    <th>Tx Charge</th>
                                    <th>Date</th>
                                    <th>Slug</th>
                                    <th>Remark</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($incomes as $income)  
                                @php
                                $user = DB::table('users')->where('id', $income->u_code)->first();
                                $txuser = DB::table('users')->where('id', $income->tx_u_code)->first();
                                @endphp
                                
                                <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->username ?? 'N/A' }} ({{ $user->name ?? 'N/A' }})</td>
                                        <td>{{ $txuser->username ?? 'N/A' }} ({{ $txuser->name ?? 'N/A' }})</td>
                                        <td>{{ $income->amount }}</td>
                                        <td>{{ $income->tx_charge }}</td>
                                        <td>{{ $income->date }}</td>
                                        <td>{{ $income->source  ?? 'N/A' }}</td>
                                        <td>{{ $income->remark  ?? 'N/A' }}</td>
                                        
                                    </tr>
                                    @endforeach

                                    @if($incomes->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">No  Found</td>
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