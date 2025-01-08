@extends('admin_view.main')
@section('content')
@php
    use App\Models\Category;

   
@endphp
    
           <!-- Container-fluid starts-->
           <div class="page-body">
                <!-- All User Table Start -->
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
                                        <h5>All Banners</h5>
                                        <form class="d-inline-flex">
                                            <a href="{{url('/admin/banners/create')}}"
                                                class="align-items-center btn btn-theme d-flex">
                                                <i data-feather="plus-square"></i>Add New Banner
                                            </a>
                                        </form>
                                    </div>

                                    <div class="table-responsive category-table">
                                        <div>
                                            <table class="table all-package theme-table" id="myTable">
                                               
												<thead>
													<tr>
                                                        <th>SR.No.</th>
														<th>Title</th>
														<th>Image</th>
														<th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($banners as $banner)
														<tr>
                                                            <td>{{ $loop->iteration }}</td>  
															<td>{{ $banner->title }}</td>
															<td>
																@if ($banner->image)
																	<img src="{{ asset('storage/' . $banner->image) }}" alt="Banner" width="100">
																@endif
															</td>
															<td>{{ $banner->status ? 'Enabled' : 'Disabled' }}</td>
															

                                                           <td>
                                                            <ul>
                                                               <li>
                                                                    <a href="{{ route('banners.toggleStatus', $banner->id) }}">
                                                                       {{ $banner->status ? 'Disable' : 'Enable' }}
                                                                    </a>
                                                                </li>
                                                                
                                                                <li>
                                                                <a href="{{ route('banners.update', $banner->id) }}">
                                                                   <i class="ri-pencil-line"></i>
                                                                 </a>
                                                                 </li>
                                                                

                                                                <li>
                                                                    <a href="{{ route('banners.delete', $banner->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
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
                <!-- All User Table Ends-->
@endsection