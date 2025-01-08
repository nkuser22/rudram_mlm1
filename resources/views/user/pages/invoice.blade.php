 @php
 use App\Models\DatabaseModel;
 use App\Models\Notification;
 $Conn = new DatabaseModel();
 $user = Auth::user();

@endphp
 @include('user/pages/header')

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body invoice-head">
                    <div class="row">
                        <div class="col-md-4 align-self-center">
                            <img src="{{ $Conn->websiteInfo('logo') }}" alt="logo-small" class="logo-sm me-1" height="24">
                            <p class="mt-2 mb-0 text-muted">If account is not paid within 7 days the credits details supplied as confirmation.</p>
                        </div><!--end col-->
                        <div class="col-md-8">
                            <ul class="list-inline mb-0 contact-detail float-end">
                                <li class="list-inline-item">
                                    <div class="ps-3">
                                        <i class="mdi mdi-web"></i>
                                        <p class="text-muted mb-0">{{ $Conn->websiteInfo('company_email') }}</p>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="ps-3">
                                        <i class="mdi mdi-phone"></i>
                                        <p class="text-muted mb-0">{{ $Conn->websiteInfo('company_mobile') }}</p>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="ps-3">
                                        <i class="mdi mdi-map-marker"></i>
                                        <p class="text-muted mb-0">{{ $Conn->websiteInfo('company_address') }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
                <div class="card-body">
                    <div class="row row-cols-3 d-flex justify-content-md-between">
                        <div class="col-md-3 d-print-flex">
                            <h6 class="mb-0"><b>Order Invoice :</b> {{ $order->invoice_no }}</h6>
                            <h6><b>Order ID :</b> # {{ $order->id }}</h6>
                        </div><!--end col-->
                        <div class="col-md-3 d-print-flex">
                            <address class="font-13">
                                <strong class="font-14">Billed To :</strong><br>
                                {{ $Conn->websiteInfo('company_name') }}<br>
                                {{ $Conn->websiteInfo('company_email') }}<br>
                                {{ $Conn->websiteInfo('company_address') }}<br>
                                <abbr title="Phone">P:</abbr> {{ $Conn->websiteInfo('company_mobile') }}
                            </address>
                        </div><!--end col-->
                        <div class="col-md-3 d-print-flex">
                            <address class="font-13">
                                <strong class="font-14">Shipped To:</strong><br>
                                {{ $orderDetails['name'] }}<br>
                                {!! nl2br(e($orderDetails['address'])) !!}<br>
                                {{ $orderDetails['state'] }} {{ $orderDetails['city'] }}<br>
                                <abbr title="Phone">PIN:</abbr> {{ $orderDetails['pin_code'] }}
                            </address>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive project-invoice">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Sale Price</th>
                                            <th>Subtotal</th>
                                        </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                        @foreach($orderDetails['product_id'] as $index => $product_id)
                                            <tr>
                                                <td>
                                                    <h5 class="mt-0 mb-1 font-14">{{ $orderDetails['product_name'][$index] }}</h5>
                                                </td>
                                                <td>{{ $orderDetails['product_qty'][$index] }}</td>
                                                <td>{{ $orderDetails['sale_price'][$index] }}</td>
                                                <td>
                                                    <?php $subtotal = $orderDetails['sale_price'][$index] * $orderDetails['product_qty'][$index]; ?>
                                                    {{ $subtotal }}
                                                </td>
                                            </tr><!--end tr-->
                                        @endforeach

                                        <tr>
                                            <td colspan="2" class="border-0"></td>
                                            <td class="border-0 font-14 text-dark"><b>Sub Total</b></td>
                                            <td class="border-0 font-14 text-dark"><b>{{ $order->order_amount }}</b></td>
                                        </tr><!--end tr-->
                                        <tr>
                                            <th colspan="2" class="border-0"></th>
                                            <td class="border-0 font-14 text-dark"><b>Tax Rate</b></td>
                                            <td class="border-0 font-14 text-dark"><b>0%</b></td>
                                        </tr><!--end tr-->
                                        <tr class="bg-black text-white">
                                            <th colspan="2" class="border-0"></th>
                                            <td class="border-0 font-14"><b>Total</b></td>
                                            <td class="border-0 font-14"><b>{{ $order->order_amount }}</b></td>
                                        </tr><!--end tr-->
                                    </tbody>
                                </table><!--end table-->
                            </div><!--end /div-->
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mt-4">Terms And Condition :</h5>
                            <ul class="ps-3">
                                <li><small class="font-12">All accounts are to be paid within 7 days from receipt of invoice.</small></li>
                                <li><small class="font-12">To be paid by cheque, credit card, or direct payment online.</small></li>
                                <li><small class="font-12">If account is not paid within 7 days, the credit details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.</small></li>
                            </ul>
                        </div><!--end col-->
                        <div class="col-lg-6 align-self-center">
                            <div class="float-none float-md-end" style="width: 30%;">
                                <small>Account Manager</small>
                                <img src="assets/images/signature.png" alt="" class="mt-2 mb-1" height="20">
                                <p class="border-top">Signature</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                            <div class="text-center"><small class="font-12">Thank you very much for doing business with us.</small></div>
                        </div><!--end col-->
                        <div class="col-lg-12 col-xl-4">
                            <div class="float-end d-print-none mt-2 mt-md-0">
                                <a href="javascript:window.print()" class="btn btn-de-info btn-sm">Print</a>
                                <a href="#" class="btn btn-de-primary btn-sm">Submit</a>
                                <a href="#" class="btn btn-de-danger btn-sm">Cancel</a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
</div><!-- container -->


			@include('user/pages/footer')