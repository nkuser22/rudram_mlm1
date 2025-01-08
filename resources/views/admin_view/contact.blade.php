@extends('admin_view.main')
@section('content')
 <!-- Container-fluid starts-->
 <div class="page-body">
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Contact Us</h5>
                            <!--<form class="d-inline-flex">
                                <a href="#" class="align-items-center btn btn-theme d-flex">
                                    <i data-feather="plus"></i>Update Profile
                                </a>
                            </form>-->
                        </div>

                        <div class="table-responsive table-product">
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
									    <th>Sr.NO.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
										<th>Subject</th>
										<th>Message</th>
                                    </tr>
                                </thead>

                                <tbody>
								      @foreach ($contacts as $user)
                                    <tr>
									   <td>{{ $loop->iteration }}</td>
                                       
                                        <td>
                                            <div class="user-name">
                                                <span>{{$user->name}}</span>
                                               
                                            </div>
                                        </td>

                                        <td>{{$user->last_name}}</td>

                                        <td>{{$user->email}}</td>
										
										<td>{{$user->subject}}</td>
										
										<td>{{$user->message}}</td>

                                        
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
    <!-- All User Table Ends-->

    <div class="container-fluid">
        <!-- footer start-->
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2024 © Rudram</p>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>
</div>
<!-- Container-fluid end -->
</div>
<!-- Page Body End -->
@endsection