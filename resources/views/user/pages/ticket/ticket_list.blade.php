@include('user/pages/header')
            
<br>
                <div class="row">
                    <div class="col-lg-12">
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
											<td>{{ $transaction->status }}</td>
											<td>{{ $transaction->reply_status }}</td>
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