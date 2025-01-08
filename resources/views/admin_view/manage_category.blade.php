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
                                    <h5>Add Category</h5>
                                </div>
                                @if (session('message'))
                                    <p style="color: green;">{{ session('message') }}</p>
                                @endif
                                <form class="theme-form theme-form-2 mega-form" action="{{route('category.insert')}}" method="post" enctype='multipart/form-data'>
                                    @csrf
									
									 <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Select Category
                                            Type</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="category_type">
                                                <option value="">--Select Category Type--</option>
												@foreach($catdata as $cat_list)
                                                <option value="<?= $cat_list->id;?>"><?= $cat_list->category_name;?></option>
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="category_name" type="text"
                                                placeholder="Category Name" value="{{$category_name}}">
                                          @error('category_name')
                                          <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--<div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Slug</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="category_slug" type="text"
                                                placeholder="Category Slug" value="">
                                                @error('category_slug')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                        </div>
                                                @enderror
                                        </div>
                                    </div>-->
                                    
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Category
                                            Image</label>
                                        <div class="form-group col-sm-9">
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <i class="ri-upload-2-line"></i>
                                                    <!-- <p>Choose an image file or drag it here.</p> -->
                                                </div>
                                                
                                                <input type="file" name="image" >
                                                @error('image')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                        </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn ms-auto theme-bg-color text-white" type="submit" >Add Category</button>
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
