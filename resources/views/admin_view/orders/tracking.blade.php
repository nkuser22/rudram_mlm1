@extends('admin_view.main')

@section('content')
<div class="page-body">
    <!-- Order Tracking Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Order #{{ $order->id }} - Order Tracking</h5>

                        <!-- Current Status -->
                        <div class="order-status">
                            <h4>Current Status: 
                                @if($order->status == 0)
                                    <span>Pending</span>
                                @elseif($order->status == 1)
                                    <span>Approved</span>
                                @elseif($order->status == 2)
                                    <span>Shipped</span>
                                @elseif($order->status == 3)
                                    <span>Delivered</span>
                                @elseif($order->status == 4)
                                    <span>Completed</span>
                                @else
                                    <span>Unknown Status</span>
                                @endif
                            </h4>
                        </div>

                        <!-- Status History -->
                        <div class="order-history">
                            <h4>Order Status History</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Changed At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderHistories as $history)
                                        <tr>
                                            <td>
                                                @if($history->status == 0)
                                                    Pending
                                                @elseif($history->status == 1)
                                                    Approved
                                                @elseif($history->status == 2)
                                                    Shipped
                                                @elseif($history->status == 3)
                                                    Delivered
                                                @elseif($history->status == 4)
                                                    Completed
                                                @else
                                                    Unknown
                                                @endif
                                            </td>
                                            <td>{{ $history->changed_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
