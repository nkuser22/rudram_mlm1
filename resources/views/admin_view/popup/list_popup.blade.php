
            @extends('admin_view.main')
            @section('content')
            <!-- Container-fluid starts-->
            <div class="page-body">
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
                                    <div class="title-header option-title d-sm-flex d-block">
                                        <h5>Popup List</h5>
                                        <div class="right-options">
                                            <ul>
                                               <!-- <li>
                                                    <a href="javascript:void(0)">import</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Export</a>
                                                </li>-->
                                                <li>
                                                    <a class="btn btn-solid" href="{{url('admin/send-popup')}}">Add Popup</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package theme-table table-product" id="table_id">
                                                <thead>
                                                    <tr>
													    <th>SR.NO.</th>
													    <th>Title</th>
														<th>Description</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
												   
												    @foreach($popups as $productlist)
													
													
                                                    <tr>
                                                        
                                                        <td>{{ $loop->iteration }}</td>   
                                                        <td>{{$productlist->title}}</td>
                                                        <td>{{$productlist->message}}</td>
                                                         <td>
                                                            <div class="table-image">
                                                              
                                                            @if($productlist->image!='')
																	<a href="{{asset('storage/'.$productlist->image)}}" target="_blank"><img class="img-fluid" src="{{asset('storage/'.$productlist->image)}}" style="width:50px; height:50px;"></a>
															@endif
															</div>
                                                        </td>
                                                        
                                                        <td class="status-danger">
														    
															@if($productlist->status==1)
															<a href="{{url('admin/send-popup/status/0')}}/{{ $productlist->id}}" > <span>Active</span></a>
															@elseif($productlist->status==0)
															<a href="{{url('admin/send-popup/status/1')}}/{{ $productlist->id}}" ><span>deactive</span></a>
															@endif
                                                           
                                                        </td>

                                                        <td>
                                                            <ul>
                                                               <!-- <li>
                                                                    <a href="order-detail.html">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>-->
                                                                
                                                                <!--<li>
                                                                    <a href="{{url('admin/product/manage_product/')}}/{{ $productlist->id}}">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="{{url('admin/send-popup/delete/')}}/{{ $productlist->id}}" onclick="return confirm('Are you sure you want to delete this item?');">
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
                <!-- Container-fluid Ends-->
                @endsection
