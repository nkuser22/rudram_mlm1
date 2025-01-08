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
                <form id="filterForm" method="GET" action="{{ url('user-orders') }}">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="from_date" class="form-label">From Date:</label>
                            <input type="date" id="from_date" name="from_date" class="form-control" 
                                value="{{ request('from_date') }}">
                        </div>
                        <div class="col-lg-3">
                            <label for="to_date" class="form-label">To Date:</label>
                            <input type="date" id="to_date" name="to_date" class="form-control" 
                                value="{{ request('to_date') }}">
                        </div>
                        <div class="col-lg-3">
                            <label for="status" class="form-label">Status:</label>
                            <select id="status" name="status" class="form-control">
                                <option value="">All</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Approved</option>
                                <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Shipped</option>
                                <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Delivered</option>
                                <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="col-lg-3 align-self-end">
                            <button type="submit" class="btn btn-primary">Filters</button>
                            <button type="button" id="resetButton" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Orders Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 table-centered" id="table_id">
                        <thead>
                            <tr>
                                <th>SR.No.</th>
                                <th>Action</th>
                                <th>Order ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <a class="nav-link "  href="{{ url('user-invoice/'.$order->id) }}" role="button" >
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                            <a class="dropdown-item" href="{{ url('user-invoice/'.$order->id) }}">Invoice</a>
                                        </div>
                                    </div>
                                </td>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $Conn->websiteInfo('currency') }} {{ number_format($order->order_amount, 2) }}</td>
                                <td>
                                    @if($order->status == 0)
                                        <span class="badge badge-soft-info">Pending</span>
                                    @elseif($order->status == 1)
                                        <span class="badge badge-soft-success">Approved</span>
                                    @elseif($order->status == 2)
                                        <span class="badge badge-soft-secondary">Shipped</span>
                                    @elseif($order->status == 3)
                                        <span class="badge badge-soft-light">Delivered</span>
                                    @elseif($order->status == 4)
                                        <span class="badge badge-soft-dark">Completed</span>
                                    @else
                                        <span>Unknown Status</span>
                                    @endif
                                </td>
                                <td><span class="badge badge-soft-primary">{{ $order->created_at }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user/pages/footer')

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
