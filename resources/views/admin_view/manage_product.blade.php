@extends('admin_view.main')
@section('content')
<div class="page-body">
   
    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
					  @if (session('message'))
                                    <p style="color: green;">{{ session('message') }}</p>
                                @endif
								
								
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product Information</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form" action="{{route('product.manage_product_process')}}"method="post" enctype='multipart/form-data'>
                                    @csrf
									<div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input name="product_name" class="form-control" type="text"
                                                placeholder="Product Name"  value="{{$product_name}}"/>
										 
										  @error('product_name')
                   
											<div class="alert alert-danger" role="alert">
											{{$message}}
												</div>
										  @enderror
                                        </div>
										
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Product
                                            Type</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="product_type">
                                                <option disabled>Static Menu</option>
                                                <option>Electronics</option>
                                                <option>Clothing</option>
                                                <option>Home Appliances</option>
                                            </select>
											
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Select Category</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="category_id">
											  @foreach($category as $list)
												@if($category_id==$list->id)
											  <option selected value="{{$list->id}}">{{$list->category_name}}</option>
											   @else
											  <option  value="{{$list->id}}">{{$list->category_name}}</option>
											  @endif
											  @endforeach
                                            </select>
											 @error('category_id')
                   
											<div class="alert alert-danger" role="alert">
											{{$message}}
												</div>
										  @enderror
                                        </div>
                                    </div>

                                    <!--<div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Subcategory</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="subcategory">
                                                <option disabled>Subcategory Menu</option>
                                                <option>Ethnic Wear</option>
                                                <option>Ethnic Bottoms</option>
                                                <option>Women Western Wear</option>
                                                <option>Sandels</option>
                                                <option>Shoes</option>
                                                <option>Beauty & Grooming</option>
                                            </select>
                                        </div>
                                    </div>-->

                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Brand</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="brand">
                                                <option disabled>Brand Menu</option>
                                                <option value="puma">Puma</option>
                                                <option value="hrx">HRX</option>
                                                <option value="roadster">Roadster</option>
                                                <option value="zara">Zara</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Unit</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="unit">
                                                <option disabled>Unit Menu</option>
                                                <option value="Kilogram">Kilogram</option>
                                                <option value="Pieces">Pieces </option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Exchangeable</label>
                                        <div class="col-sm-9">
                                            <label class="switch">
                                                <input type="checkbox" name="exchangeable"><span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Refundable</label>
                                        <div class="col-sm-9">
                                            <label class="switch">
                                                <input type="checkbox" checked="" name="refundable"><span
                                                    class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Description</h5>
                                </div>

                                <div class="theme-form theme-form-2 mega-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
											
                                                <label class="form-label-title col-sm-3 mb-0">Product
                                                    Description</label>
                                                <div class="col-sm-9">
                                                    <textarea id="editor" name="product_desc">{{$product_desc}}</textarea>
													
                                                </div>
												
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product Images</h5>
                                </div>

                                <div class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Images</label>
                                        <div class="col-sm-9">
                                            <input class="form-control form-choose" type="file"
                                                id="formFile"  name="image"/>
											@error('image')
                                            <div class="alert alert-danger" role="alert">
											{{$message}}
												</div>
										  @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Multiple
                                            Image</label>
                                        <div class="col-sm-9">
                                            <input class="form-control form-choose" type="file" name="images[]"
                                                id="formFileMultiple1" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <!-- <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product Videos</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Video
                                            Provider</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="state">
                                                <option>Vimeo</option>
                                                <option>Youtube</option>
                                                <option>Dailymotion</option>
                                                <option>Vimeo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Video
                                            Link</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text"
                                                placeholder="Video Link">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>-->

                        <!--<div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product variations</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Option
                                            Name</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="state">
                                                <option>Color</option>
                                                <option>Size</option>
                                                <option>Material</option>
                                                <option>Style</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Option
                                            Value</label>
                                        <div class="col-sm-9">
                                            <div class="bs-example">
                                                <input type="text" class="form-control"
                                                    placeholder="Type tag & hit enter" id="#inputTag"
                                                    data-role="tagsinput">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <a href="#" class="add-option"><i class="ri-add-line me-2"></i> Add Another
                                    Option</a>
                            </div>
                        </div>-->

                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Shipping</h5>
                                </div>

                                <div class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Weight
                                            (kg)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="weight" type="number" placeholder="Weight">
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Dimensions
                                            (cm)</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="dimension">
                                                <option>Length</option>
                                                <option>Width</option>
                                                <option>Height</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product Price</h5>
                                </div>

                                <div class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 form-label-title">price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" placeholder="0" name="price">
											@error('price')
                                            <div class="alert alert-danger" role="alert">
											{{$message}}
												</div>
										  @enderror
                                        </div>
                                    </div>
									
									<div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 form-label-title">Sale price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" placeholder="0" name="sale_price">
											@error('sale_price')
                                            <div class="alert alert-danger" role="alert">
											{{$message}}
												</div>
										  @enderror
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product Inventory</h5>
                                </div>

                                <div class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">QUANTITY</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="product_qty">
											@error('product_qty')
                                            <div class="alert alert-danger" role="alert">
											{{$message}}
												</div>
										  @enderror
                                        </div>
                                    </div>
                                    <!--<div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Stock
                                            Status</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="state">
                                                <option>In Stock</option>
                                                <option>Out Of Stock</option>
                                                <option>On Backorder</option>
                                            </select>
                                        </div>
                                    </div>-->
                                </div>
                                <!--<table class="table variation-table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Variant</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">SKU</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Red</td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <ul class="order-option">
                                                    <li><a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#deleteModal"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Blue</td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <ul class="order-option">
                                                    <li><a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#deleteModal"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>-->
                            </div>
                        </div>
						 <input type="hidden" name="id" value="{{$id}}"/>
						 <button class="btn ms-auto theme-bg-color text-white" type="submit" >Add Product</button>
                         </form>
                        <!--<div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Link Products</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Upsells</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="search">
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Cross-Sells</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>-->

                      <!--  <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Search engine listing</h5>
                                </div>

                                <div class="seo-view">
                                    <span class="link">https://fastkart.com</span>
                                    <h5>Buy fresh vegetables & Fruits online at best price</h5>
                                    <p>Online Vegetable Store - Buy fresh vegetables & Fruits online at best
                                        prices. Order online and get free delivery.</p>
                                </div>

                                <form class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Page title</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="search"
                                                placeholder="Fresh Fruits">
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label class="form-label-title col-sm-3 mb-0">Meta
                                            description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="form-label-title col-sm-3 mb-0">URL handle</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="search"
                                                placeholder="https://fastkart.com/fresh-veggies">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Product Add End -->
@endsection