@extends('admin_view.main')
@section('content')
 <!-- Container-fluid starts-->
 <div class="page-body">
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
            @if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif

				@if($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                             <h5>All Users</h5> 
                            <!-- Search Filters -->
                       
                        <!-- End Search Filters --><!--<form class="d-inline-flex">
                                <a href="#" class="align-items-center btn btn-theme d-flex">
                                    <i data-feather="plus"></i>Update Profile
                                </a>
                            </form>-->

                        </div>
                         
                        <div class="mb-4">
                    <button class="btn btn-info" id="toggleFilterButton">Show/Hide Filters</button>
                </div>

                <div id="filterSection" class="row mb-4" style="display: none;">
                    <form method="GET" action="" class="row">
                        <div class="col-md-2">
                            <input type="text" name="username" class="form-control" placeholder="User ID" value="{{ request('username') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ request('name') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ request('phone') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ request('email') }}">
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="from_date" id="from_date" value="{{ request('from_date') }}" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="to_date" id="to_date" value="{{ request('to_date') }}" class="form-control">
                        </div>

                        <div class="col-md-2 mt-2">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                        <div class="col-md-2 mt-2">
                            <a href="{{ url('admin/users') }}" class="btn btn-secondary w-100">Clear</a>
                        </div>
                    </form>
                </div>
                        <div class="table-responsive table-product">
                            <table class="table all-package theme-table" >
                                <thead>
                                    <tr>
									    <th>Sr.No.</th>
										<th>User id</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Date & Time</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
								      @foreach ($users as $user)

                                      <?php
                                     // echo"<pre>";
                                     //  print_r($user);
                                     
                                      ?>
                                    <tr>
									   <td>{{ $loop->iteration }}</td>
									  
                                        <td>{{$user->username}}</td>

                                        <td>
                                            <div class="user-name">
                                                <span>{{$user->name}}</span>
                                               
                                            </div>
                                        </td>
                                        <td>{{$user->mobile}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{ $user->country ?? 'N/A' }}</td>
                                        <td>{{ $user->state ?? 'N/A' }}</td>
                                        <td>{{ $user->city ?? 'N/A' }}</td>
                                        <td>{{ $user->created_at ?? 'N/A' }}</td>
                                        <td>
                                            <ul>
                                            <li>
                                            <form method="POST" action="{{ url('admin/users/update-block-status') }}" class="block-status-form" id="form{{ $user->id }}">
                                                @csrf
                                                <div class="form-check form-switch">
                                                    <input 
                                                        class="form-check-input block-status-switch" 
                                                        type="checkbox" 
                                                        id="blockSwitch{{ $user->id }}" 
                                                        name="block_status" 
                                                        data-user-id="{{ $user->id }}" 
                                                        {{ $user->block_status ? 'checked' : '' }}>
                                                </div>
                                            </form>
                                        </li>


                                        <li>
                                            <form id="loginAsUserForm-{{ $user->id }}" action="{{ route('admin.login-as-user', $user->id) }}" method="POST">
                                                @csrf
                                                <button type="button" class="btn btn-primary" onclick="submitFormInNewTab({{ $user->id }})">Login as User</button>
                                            </form>
                                        </li>


                                                <li>
                                                    <a href="{{ route('admin.editUser', $user->id) }}">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                </li>

                                                <!--<li>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalToggle">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                </li>-->
                                                
                                            </ul>
                                        </td>
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

<script>
$(document).on('change', '.block-status-switch', function () {
    const userId = $(this).data('user-id');
    const status = $(this).is(':checked') ? 1 : 0;
   //alert(userId);
   //alert(status);
    $.ajax({
        url: '/admin/users/update-block-status',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: {
            id: userId,
            block_status: status,
        },
        success: function (response) {
           // alert(response.success);
            if (response.success) {
                alert(`User status updated to ${status ? 'Blocked' : 'Unblocked'}`);
            } else {
                alert('Failed to update user status');
                $(this).prop('checked', !status);
            }
        },
        error: function () {
            alert('An error occurred');
            $(this).prop('checked', !status);
        },
    });
});


function submitFormInNewTab(userId) {
        const form = document.getElementById(`loginAsUserForm-${userId}`);
        form.target = '_blank'; // Set the form's target to a new tab
        form.submit(); // Submit the form
    }


    document.getElementById('toggleFilterButton').addEventListener('click', function () {
        const filterSection = document.getElementById('filterSection');
        if (filterSection.style.display === 'none' || filterSection.style.display === '') {
            filterSection.style.display = 'flex'; // Show the filter section
        } else {
            filterSection.style.display = 'none'; // Hide the filter section
        }
    });
</script>
@endsection