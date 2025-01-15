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
					<div class="breadcrumb-title pe-3">Ticket History</div>
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
						<a href="{{url('/user-tickets/create')}}" class="btn btn-primary">Add Ticket</a>
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
											<th>Ticket</th>
											<th>Query</th>
											<th>Date</th>
											<th>Status</th>
											<th>Reply Status</th>
											<th>Remark</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										@foreach($tickets as $transaction)
										<tr>
                                            <td>{{ $loop->iteration }}</td>
											<td>{{ $transaction->ticket }}</td>
                                            <td>{{ $transaction->description }}</td>
											<td>{{ $transaction->created_at }}</td>
											<td>
                                                @if($transaction->status == 1)
                                                    <span class="badge bg-success">Accepted</span>
                                                @elseif($transaction->status == 0)
                                                    <span class="badge bg-warning">Pending</span>
                                                @else
                                                    <span class="badge bg-secondary">Unknown</span>
                                                @endif
                                            </td>

                                            <td>
                                            @if($transaction->reply_status == 1)
                                                <span class="badge bg-success">Accepted</span>
                                            @elseif($transaction->reply_status == 0)
                                                <span class="badge bg-warning">Pending</span>
                                            @else
                                                <span class="badge bg-secondary">Unknown</span>
                                            @endif
                                        </td>

                                           <td>{{ $transaction->reply_remark }}</td>
                                            
                                        </tr>
										@endforeach

											@if($tickets->isEmpty())
												<tr>
													<td colspan="9" class="text-center">No Ticket Found</td>
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