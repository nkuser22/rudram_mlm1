@extends('admin_view.main')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Order Section Start -->
<div class="page-body">
    <!-- Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <!-- Title and Action Button -->
                        <div class="title-header option-title">
                            <h5>{{$slugs }} incomes report</h5>
                            <a href="" class="btn btn-solid">Download all orders</a>
                        </div>

                        <!-- Hide/Show Filter Button -->
                            <button id="toggle-filter" class="btn btn-primary btn-sm">Show Filter</button>

                            <!-- Filter Form -->
                            <div id="table_id_filter" class="dataTables_filter" style="display: none;">
                                <form method="GET" action="{{ url('admin/incomes/report?source=') . $slugs }}" class="form-inline">

                                <div class="form-group mx-2">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="User ID" value="{{ request('username') }}">
                                </div>

                                <div class="form-group mx-2">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" value="{{ request('name') }}">
                                </div>
										
                                    <div class="form-group mx-2">
                                        <label for="from_date" class="mr-2">From Date:</label>
                                        <input type="date" id="startDate" class="form-control" placeholder="Start Date">
                                      
                                    </div>
                                    <div class="form-group mx-2">
                                        <label for="to_date" class="mr-2">To Date:</label>
                                        <input type="date" id="endDate" class="form-control" placeholder="End Date">
                                    </div>
                                   
                                    <!-- <button type="submit" class="btn btn-sm btn-solid mx-2">Filter</button> -->
                                    <a href="{{ url('admin/incomes/report?source=') . $slugs }}" class="btn btn-sm btn-light mx-2">Clear</a>

                                </form>
                            </div>



                        <!-- Table Content -->
                        <div class="table-responsive">
                            <table class="table all-package order-table theme-table fbody">
                                <thead>
                                    <tr>
                                        <th>SR.NO.</th>
                                        <th>User ID(Name)</th>
                                        <th>From User</th>
                                        <th>Amount</th>
                                        <th>Charge</th>
                                        <th>Date</th>
                                        <th>Slug</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
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
                                        <td>{{ $income->source }}</td>
                                     
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            <div class="mt-3">
                              
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
</div>

@endsection
