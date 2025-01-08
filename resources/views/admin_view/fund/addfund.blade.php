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
                                    <h5>Add Funds to User Wallets</h5>
                                </div>
                                @if(session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif
								
								@if(session('error'))
								<div class="alert alert-danger">
									{{ session('error') }}
								</div>
							@endif
							  <form class="theme-form theme-form-2 mega-form" method="POST" action="{{ route('admin.wallet.addFunds') }}">
                                
                                    @csrf
									<div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Username</label>
                                        <div class="col-sm-9">
                                          <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
			
                                          @error('username')
                                          <div class="alert alert-danger" role="alert">
                                            {{$success}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Select User Wallet</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="user_wallets">
											   <option value="">-- Select User Wallets --</option>
												@foreach($usersWallets as $user)
												
													<option value="{{ $user->slug }}">{{ $user->name }}</option>
												@endforeach
                                            </select>
											 @error('user_wallets')
                   
											<div class="alert alert-danger" role="alert">
											{{$success}}
												</div>
										  @enderror
                                        </div>
                                    </div>
                                    
									<div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Amount</label>
                                        <div class="col-sm-9">
                                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" step="0.01" required>
                                          @error('amount')
                                          <div class="alert alert-danger" role="alert">
                                            {{$success}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <button class="btn ms-auto theme-bg-color text-white" type="submit" >Add Funds</button>
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
