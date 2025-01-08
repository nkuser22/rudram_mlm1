@extends('admin_view.main')
@section('content')

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
                            <h5>Order List</h5>
                            <a href="{{ route('download.orders') }}" class="btn btn-solid">Download all orders</a>
                        </div>

                        <!-- Hide/Show Filter Button -->
                            <button id="toggle-filter" class="btn btn-primary btn-sm">Show Filter</button>

                            <!-- Filter Form -->
                            <div id="table_id_filter" class="dataTables_filter" style="display: none;">
                                <form method="GET" action="{{ url('admin/orders') }}" class="form-inline">
                                    <div class="form-group mx-2">
                                        <label for="from_date" class="mr-2">From Date:</label>
                                        <input type="date" name="from_date" id="from_date" value="{{ request('from_date') }}" class="form-control">
                                    </div>
                                    <div class="form-group mx-2">
                                        <label for="to_date" class="mr-2">To Date:</label>
                                        <input type="date" name="to_date" id="to_date" value="{{ request('to_date') }}" class="form-control">
                                    </div>
                                    <div class="form-group mx-2">
                                    <label for="statusFilter">Status:</label>
                                    <select name="status" id="statusFilter" class="form-control" onchange="this.form.submit()">
                                        <option value="" {{ request('status') == '' ? 'selected' : '' }}>All</option>
                                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Approved</option>
                                        <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Shipped</option>
                                        <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Delivered</option>
                                        <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-solid mx-2">Filter</button>
                                    <a href="{{ url('admin/orders') }}" class="btn btn-sm btn-light mx-2">Clear</a>
                                </form>
                            </div>



                        <!-- Table Content -->
                        <div class="table-responsive">
                            <table class="table all-package order-table theme-table">
                                <thead>
                                    <tr>
                                        <th>SR.NO.</th>
                                        <th>Invoice-No</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Payment Option</th>
                                        <th>Delivery Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $orderlist)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $orderlist->invoice_no }}</td>
                                        <td>{{ $orderlist->created_at->format('d-m-Y') }}</td>
                                        <td>{{ number_format($orderlist->order_amount, 2) }}</td>
                                        <td>{{ $orderlist->payment_option }}</td>
                                        <td class="order-success">
                                            @switch($orderlist->status)
                                                @case(0)
                                                    <span>Pending</span>
                                                    @break
                                                @case(1)
                                                    <span>Approved</span>
                                                    @break
                                                @case(2)
                                                    <span>Shipped</span>
                                                    @break
                                                @case(3)
                                                    <span>Delivered</span>
                                                    @break
                                                @case(4)
                                                    <span>Completed</span>
                                                    @break
                                                @default
                                                    <span>Unknown Status</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{ url('admin/orders/' . $orderlist->id) }}">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('admin-invoice/' . $orderlist->id) }}">
                                                        <i class="ri-file-list-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="btn btn-sm btn-solid text-white"
                                                       href="{{ url('admin/order/' . $orderlist->id . '/tracking') }}">
                                                        Tracking
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            <div class="mt-3">
                                {{ $data->links() }}
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
