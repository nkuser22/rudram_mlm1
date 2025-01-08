@extends('admin_view.main')

@section('content')

<div class="page-body">

    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Update Payment Method</h5>
                                </div>
                                @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('message')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif 

                                <form id="updatePaymentForm" class="theme-form theme-form-2 mega-form" action="{{ route('payment-method.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    @foreach($paymentMethod as $index => $paymentdata)
                                    <div class="payment-method-container">
                                        <input type="hidden" name="addresses[{{$index}}][id]" value="{{ $paymentdata->id }}">

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">{{$paymentdata->name}}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="addresses[{{$index}}][address]" type="text" placeholder="Enter Address" value="{{ old('addresses.'.$index.'.address', $paymentdata->address) }}">
                                                
                                                @error("addresses.{$index}.address")
                                                    <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">
                                                {{$paymentdata->name}} Image
                                            </label>
                                            <div class="form-group col-sm-9">
                                                <input type="file" name="addresses[{{$index}}][image]">
                                                
                                                @if ($paymentdata->image)
                                                    <div class="mt-2">
                                                        <img src="{{ $paymentdata->image}}" alt="Current Image" width="100">
                                                    </div>
                                                @endif
                                                
                                                @error("addresses.{$index}.image")
                                                    <div class="alert alert-danger" role="alert">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <button class="btn ms-auto theme-bg-color text-white" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Product Add End -->

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Handle form submission via AJAX
            $('#updatePaymentForm').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this); // Get form data

                $.ajax({
                    url: $(this).attr('action'), // Form action URL
                    type: 'POST',
                    data: formData,
                    processData: false, 
                    contentType: false, 
                    success: function (response) {
                        if (response.status == 'success') {
                            alert('Payment Methods Updated Successfully!');
                           // alert('test');
                            location.reload(); 
                        } else {
                            alert('Error updating payment methods');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('An error occurred while updating the payment methods');
                    }
                });
            });
        });
    </script>
@endsection
