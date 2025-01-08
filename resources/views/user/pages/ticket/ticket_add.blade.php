	 @include('user/pages/header')
	 @php
	 use Illuminate\Support\Facades\Auth;
	 use Illuminate\Support\Facades\DB;
	 $userId = auth()->id();
	 $user = DB::table('users')->where('id', $userId)->first();
	 @endphp
	 <br>
		<div class="row">
					
					<div class="col-lg-6">
					@if(session()->has('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{session('success')}}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif 
						<div class="card">
						
							<div class="card-header">
								<h4 class="card-title">Support ticket</h4>
								<!--<p class="text-muted mb-0">Be sure to use <code class="highlighter-rouge">.col-form-label-sm</code> 
									or <code class="highlighter-rouge">.col-form-label-lg</code> to your <code class="highlighter-rouge">&lt;label&gt;</code>s 
									or <code class="highlighter-rouge">&lt;legend&gt;</code>s 
									to correctly follow the size of <code class="highlighter-rouge">.form-control-lg</code> and 
									<code class="highlighter-rouge">.form-control-sm</code>.
								</p>-->
							</div><!--end card-header-->
							<div class="card-body">                                    
								<div class="general-label">
									<form method="post" enctype="multipart/form-data" action="{{route('user.tickets.create')}}">
									    @csrf
								
									    <div class="mb-3 row">
											<label for="horizontalInput2" class="col-sm-2 col-form-label">Name</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="name" id="horizontalInput2" value="{{$user->name}}" placeholder="Name" readonly>
											
											</div>
										</div>
										
										 <div class="mb-3 row">
											<label for="horizontalInput2" class="col-sm-2 col-form-label">Email</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="email" id="horizontalInput2" value="{{$user->email}}" placeholder="Email" readonly>
											
											</div>
										</div>
										
										
										<div class="mb-3 row">
											<label for="horizontalInput2" class="col-sm-2 col-form-label">Subject</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="subject" id="horizontalInput2"  placeholder="Subject" >
											
											</div>
										</div>
										
										<div class="mb-3 row">
											<label for="horizontalInput2" class="col-sm-2 col-form-label">Description</label>
											<div class="col-sm-10">
												<textarea type="text" class="form-control" name="description" id="horizontalInput2" placeholder="Description"></textarea>
											@error('description')
												<p style="color: red;">{{ $message }}</p>
											@enderror
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-10 ms-auto">
												<button type="submit" class="btn btn-de-primary">Submit</button>
												<button type="button" class="btn btn-de-danger">Cancel</button>
											</div>
										</div> 
									</form>           
								</div>
								
							
						  
							</div>
						</div>
						
						
					</div>
					  <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Support table</h4>
                               
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered">
                                        <thead>
                                        <tr>
                                            <th>Sr.No.</th>
											<th>Ticket</th>
											<th>Description</th>
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
											<td><span class="badge badge-soft-info">{{ $transaction->ticket }}</span></td>
                                            <td>{{ $transaction->description }}</td>
											<td><span class="badge badge-soft-primary">{{ $transaction->created_at }}</span></td>
											<td>
											 @if($transaction->status === 0)
													<span class="badge badge-soft-info">Pending</span>
												@elseif($transaction->status === 1)
												<span class="badge badge-soft-success">Approved</span>
													
												@elseif($transaction->status === 2)
												<span class="badge badge-soft-danger">Rejected</span>
													
												@elseif($transaction->status === 3)
													In Progress
												@else
													Unknown
												@endif 
											</td>
												
												
											<td> @if($transaction->reply_status === 0)
												<span class="badge badge-soft-info">Pending</span>
												
											@elseif($transaction->reply_status === 1)
											<span class="badge badge-soft-success">Approved</span>
												
												
											@elseif($transaction->reply_status === 2)
											<span class="badge badge-soft-danger">Rejected</span>
											
												
											@elseif($transaction->reply_status === 3)
												In Progress
											@else
												Unknown
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
				
				 @include('user/pages/footer')