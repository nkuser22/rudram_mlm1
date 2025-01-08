@include('user/pages/header')
@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp               

                <div class="row">
                    <div class="col-lg-12">

                    <div class="row mb-3">
                        <button id="toggleFilterButton" class="btn btn-primary" style="width: 100px; height: 40px; font-size: 16px;">Show </button>
                    </div>   
                    
                    <div id="filterSection" class="row mb-3" style="display: none;">    
                    <form id="filterForm" method="GET" action="{{url('/user-transactions')}}">
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ request('username') }}">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ request('name') }}">
                            </div>
                           
                            <div class="col-md-2">
                                <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                            </div>
                            <div class="col-md-2">
                            <select name="tx_type" class="form-control">
                                <option value="">Select Transaction Type</option>
                                <option value="product_purchase" {{ request('tx_type') == 'product_purchase' ? 'selected' : '' }}>Product Purchase</option>
                                <option value="AdminFund" {{ request('tx_type') == 'AdminFund' ? 'selected' : '' }}>Admin Fund</option>
                                <option value="fundRequest" {{ request('tx_type') == 'fundRequest' ? 'selected' : '' }}>Fund Request</option>
                            </select>
                        </div>

                            <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-3">Filter</button>
                            <a href="{{url('/user-transactions')}}" class="btn btn-secondary mb-3">Reset</a>
                            </div>
                        </div>
                       
                    </form>
                    </div>


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transactions table</h4>
                               
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 table-centered">
                                        <thead>
                                        <tr>
                                            <th>Sr.No.</th>
											<th>Userid(Name)</th>
											<th>Date</th>
											<th>Remark</th>
                                            <th>Amount</th>
											<th>Tx Charge</th>
											<th>Tx Type</th>
                                            
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
                                            <td><span class="badge badge-soft-primary">{{ $transaction->created_at }}</span></td>
											<td>{{ $transaction->remark }}</td>
                                            <td>{{$Conn->websiteInfo('currency')}} {{ number_format($transaction->amount, 2) }}</td>
											<td>{{ number_format($transaction->tx_charge, 2) }}</td>
											<td><span class="badge badge-soft-success">{{ $transaction->tx_type }}</span></td>
                                            
                                        </tr>
										@endforeach

											@if($transactions->isEmpty())
												<tr>
													<td colspan="9" class="text-center">No Transactions Found</td>
												</tr>
											@endif
                                        
                                        </tbody>
                                    </table><!--end /table-->
                                </div><!--end /tableresponsive-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!-- end col -->
                </div> <!-- end row -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleFilterButton = document.getElementById('toggleFilterButton');
        const filterSection = document.getElementById('filterSection');
        const resetButton = document.getElementById('resetButton');

        // Toggle filter section
        toggleFilterButton.addEventListener('click', function () {
            if (filterSection.style.display === 'none') {
                filterSection.style.display = 'block';
                toggleFilterButton.textContent = 'Fillter';
            } else {
                filterSection.style.display = 'none';
                toggleFilterButton.textContent = 'Fillter';
            }
        });

        // Reset filters
        resetButton.addEventListener('click', function () {
            window.location.href = "{{ url('user-orders') }}";
        });

        // Show filter section if filters are active
        if ("{{ request('from_date') }}" || "{{ request('to_date') }}" || "{{ request('status') }}") {
            filterSection.style.display = 'block';
            toggleFilterButton.textContent = 'Hide';
        }
    });
</script>            
   @include('user/pages/footer')    