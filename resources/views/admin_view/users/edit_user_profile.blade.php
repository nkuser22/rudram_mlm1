@extends('admin_view.main')
@section('content')
	 <!-- Page Sidebar Start -->
            <div class="page-body">
                <!-- New User start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="title-header option-title">
                                                <h5>Edit User</h5>
                                            </div>
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home"
                                                        type="button">User Update</button>
                                                </li>
                                               <!-- <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button">Pernission</button>
                                                </li>-->
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
												<form class="theme-form theme-form-2 mega-form" action="{{ route('admin.updateUser', $user->id) }}" method="POST">
                                                  @csrf
                                                   <div class="card-header-1">
                                                            <h5>User Information</h5>
                                                        </div>
                                                         @if ($errors->any())
															<div style="color: red;">
																<ul>
																	@foreach ($errors->all() as $error)
																		<li>{{ $error }}</li>
																	@endforeach
																</ul>
															</div>
														@endif
                                                        <div class="row">
                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">
                                                                    Name</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                    <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">
                                                                </div>
                                                            </div>
															<div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">
                                                                   Username</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                    <input class="form-control" type="text" name="username" value="{{ old('username', $user->username) }}">
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                                    Address</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                    <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}">
                                                                </div>
                                                            </div>
                                                           <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">
                                                                    Mobile</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                    <input class="form-control" type="number" name="mobile" value="{{ old('mobile', $user->mobile) }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
																<button class="btn btn-animation w-100" type="submit">Upadte</button>
															</div>

                                                            
                                                        </div>
                                                    </form>
                                                </div>

                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New User End -->

                <!-- footer start -->
                <div class="container-fluid">
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- footer end -->
            </div>
            <!-- Page Sidebar End -->