@extends('admin_view.main')

@section('content')

<?php
//echo"<pre>";
//print_r($shippingDetails);
//die();
?>

<!-- Tracking Section Start -->
<div class="page-body">
    <!-- Tracking Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
			@if(session()->has('message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{session('message')}}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif
                <div class="card">
                    <div class="card-body">
                        <div class="title-header title-header-block package-card">
                            <div>
                                <h5>Order #{{ $order->id }}</h5>
                            </div>
                            <div class="card-order-section">
                                <ul>
                                    <li>{{ $order->created_at }}</li>
                                   <li>Total ${{ number_format($order->order_amount, 2) }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-inner cart-section order-details-table">
                            <div class="row g-4">
                                <div class="col-xl-8">
                                    <div class="table-responsive table-details">
                                        <table class="table cart-table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Items</th>
                                                    <th class="text-end" colspan="2">
                                                        <a href="javascript:void(0)" class="theme-color">Edit Items</a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderItems as $item)
                                                    <tr class="table-order">
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="{{ asset('storage/media/products/' . $item->product_img) }}"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p>Product Name</p>
                                                            <h5>{{ $item->product_name }}</h5>
                                                        </td>
                                                        <td>
                                                            <p>Quantity</p>
                                                            <h5>{{ $item->quantity }}</h5>
                                                        </td>
                                                        <td>
                                                            <p>Price</p>
                                                            <h5>${{ number_format($item->price, 2) }}</h5>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Subtotal :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>${{ number_format($order->order_amount, 2) }}</h4>
                                                    </td>
                                                </tr>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Shipping :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>$ 0.00</h4>
                                                    </td>
                                                </tr>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Tax (GST) :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>$ 0.00</h4>
                                                    </td>
                                                </tr>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h4 class="theme-color fw-bold">Total Price :</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="theme-color fw-bold">${{ number_format($order->order_amount, 2) }}</h4>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="order-success">
                                        <div class="row g-4">
                                            <h4>Summary</h4>
                                            <ul class="order-details">
                                                <li>Order ID: {{ $order->id }}</li>
                                                <li>Order Date: {{ $order->created_at }}</li>
                                                <li>Order Total: ${{ number_format($order->order_amount, 2) }}</li>
                                            </ul>

                                            <h4>Shipping Address</h4>
                                            <ul class="order-details">
                                                <li>{{ $shippingDetails->name }}</li>
                                                <li>{{ $shippingDetails->address_line1 }}</li>
                                                <li>Email Address: {{ $shippingDetails->email }}</li>
                                            </ul>

                                            <div class="payment-mode">
                                                <h4>Payment Method</h4>
                                                <p>{{ $order->payment_option }}</p>
                                            </div>

                                            <!-- Order Status Change Form -->
                                            <div class="order-status-change mt-4">
                                                <h4>Change Order Status</h4>
                                             <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
											@csrf
											@method('PUT')
											<div class="form-group">
												<label for="order_status">Order Status</label>
												<select name="order_status" id="order_status" class="form-control">
													<option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Pending</option>
													<option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Approved</option>
													<option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Shipped</option>
													<option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Delivered</option>
													<option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Completed</option>
												</select>
											</div>
											<button type="submit" class="btn btn-primary mt-3">Update Status</button>
										</form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Section End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tracking Table End -->
@endsection



