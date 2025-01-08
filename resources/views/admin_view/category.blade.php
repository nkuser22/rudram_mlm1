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
                                        <h5>All Category</h5>
                                        <form class="d-inline-flex">
                                            <a href="{{url('/admin/manage_category')}}"
                                                class="align-items-center btn btn-theme d-flex">
                                                <i data-feather="plus-square"></i>Add New
                                            </a>
                                        </form>
                                    </div>

                                    <div class="table-responsive category-table">
                                        <div>
                                            <table class="table all-package theme-table" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>SR.NO.</th>
                                                        <th>Category Name</th>
														
                                                        <th>Parent Category</th>
                                                        <th>Image</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($data as $catlist)
													 @php
													  $subcategories = Category::getSubcategories($catlist->is_parent);
													 @endphp
                                                    <tr>
                                                        <td>{{ $catlist->id}}</td>
                                                        <td>{{ $catlist->category_name}}</td>
														
														
														<?php
														if($catlist->is_parent>0){?>
                                                        <td>
														   
														   @foreach($subcategories as $subcategory)
															   {{ $subcategory->category_name }}
															@endforeach
															
														</td>
                                                        <?php
														}else{
														?>
													   <td> </td>
														<?php
															}
														?>
														
														@if($catlist->category_img!='')
                                                        <td>
                                                            <div class="table-image">
                                                                <img src="{{asset('storage/media/category/'.$catlist->category_img)}}" style="width:50px; height:50px;"
                                                                    class="img-fluid" alt="" >
                                                            </div>
                                                        </td>
                                                       

                                                        @endif
                                            

                                                        <td>
                                                            <ul>
                                                               <!-- <li>
                                                                    <a href="order-detail.html">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>-->

                                                                <li>
                                                                    <a href="{{url('admin/manage_category/')}}/{{ $catlist->id}}">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
																	
                                                                </li>

                                                                <li>
                                                                    <a href="{{url('admin/category/destroy/')}}/{{ $catlist->id}}" onclick="return confirm('Are you sure you want to delete this item?');">
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