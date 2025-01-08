
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
                                        <h5>Products List</h5>
                                        <div class="right-options">
                                            <ul>
                                               <!-- <li>
                                                    <a href="javascript:void(0)">import</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Export</a>
                                                </li>-->
                                                <li>
                                                    <a class="btn btn-solid" href="{{url('admin/product/manage_product')}}">Add Product</a>
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
													    <th>Product Name</th>
														<th>Product Type</th>
                                                        <th>Product Image</th>
                                                        <th>Product Multiple Image</th>
                                                        <th>Category</th>
                                                        <th>Current Qty</th>
                                                        <th>Price</th>
														<th>Sale Price</th>
                                                        <th>Status</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
												   
												    @foreach($data as $productlist)

                                                    <?php
                                                  //  print_r($productlist->multi_img);
                                                   
                                                    ?>
                                                    <tr>
                                                        
                                                        <td>{{ $loop->iteration }}</td>   
                                                        <td>{{$productlist->product_name}}</td>
                                                        <td>{{$productlist->product_type}}</td>
                                                         <td>
                                                            <div class="table-image">
                                                              
                                                            @if($productlist->product_img!='')
																	<a href="{{asset('storage/media/products/'.$productlist->product_img)}}" target="_blank"><img class="img-fluid" src="{{asset('storage/media/products/'.$productlist->product_img)}}" style="width:50px; height:50px;"></a>
															@endif
															</div>
                                                        </td>

                                                        <td>
                                                        <div class="table-image">
                                                            @if(!empty($productlist->multi_img))
                                                                @php
                                                                    $multiImages = json_decode($productlist->multi_img, true);
                                                                   // print_r($multiImages);
                                                                    
                                                                @endphp

                                                                @foreach($multiImages as $image)
                                                                 
                                                                    <a href="{{ asset('storage/' . $image) }}" target="_blank">
                                                                        <img class="img-fluid" src="{{ asset('storage/' . $image) }}" style="width:50px; height:50px; margin-right:5px;">
                                                                    </a>
                                                                @endforeach
                                                            @else
                                                                <span>No Images</span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                        <td>{{$productlist->product_type}}</td>
                                                        <td>
														  @if ($productlist->product_qty > 0)
																{{ $productlist->product_qty }}
															@else
																<span class="text-danger">Out of Stock</span>
															@endif
														
														
														</td>
                                                        <td class="td-price">${{number_format($productlist->price,2)}}</td>
														<td class="td-price">${{number_format($productlist->sale_price,2)}}</td>
                                                        <td class="status-danger">
														    
															@if($productlist->status==1)
															<a href="{{url('admin/product/status/0')}}/{{ $productlist->id}}" > <span>Active</span></a>
															@elseif($productlist->status==0)
															<a href="{{url('admin/product/status/1')}}/{{ $productlist->id}}" ><span>deactive</span></a>
															@endif
                                                           
                                                        </td>

                                                        <td>
                                                            <ul>
                                                               <!-- <li>
                                                                    <a href="order-detail.html">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>-->
                                                                
                                                                <li>
                                                                    <a href="{{url('admin/product/manage_product/')}}/{{ $productlist->id}}">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{url('admin/product/delete/')}}/{{ $productlist->id}}" onclick="return confirm('Are you sure you want to delete this item?');">
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
