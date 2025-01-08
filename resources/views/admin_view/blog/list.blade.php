@extends('admin_view.main')
@section('content')
<!-- Order section Start -->
            <div class="page-body">
                <!-- Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
						@if(session()->has('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{session('message')}}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						@endif 
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Blog List</h5>
                                       <a href="javascript:void()" class="btn btn-solid">Download all orders</a>

                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package order-table theme-table" id="table_id">
                                                <thead>
                                                    <tr>
													    <th>SR.NO.</th>
                                                        <th>Title</th>
                                                        <th>Date</th>
														<th>Description</th>
                                                        <th>Image</th>
														<th>Status</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
												   @foreach($posts as $orderlist)
                                                    <tr data-bs-toggle="offcanvas" href="#order-details">
                                                        <td>
                                                           {{ $loop->iteration }}
                                                        </td>
                                                        <td>{{$orderlist->title}}</td>
                                                        <td>{{$orderlist->created_at}}</td>
														<td>{{$orderlist->content}}</td>
                                                        <td>
															@if ($orderlist->image)
																<img src="{{ asset('storage/' . $orderlist->image) }}" alt="Blog" width="100">
															@endif
														</td>
														
														<td><a href="{{url('admin/blog/toggle-status/')}}/{{ $orderlist->id}}">
                                                                       {{ $orderlist->status ? 'Disable' : 'Enable' }}
                                                                    </a></td>
														 <td>
                                                            <ul>
															   
                                                                <li>
                                                                    <a href="{{url('admin/blog/update/')}}/{{ $orderlist->id}}">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="{{url('admin/blog/delete/')}}/{{ $orderlist->id}}" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </li>
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
                </div>
                <!-- Table End -->
                @endsection