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
                                    <h5>Add Banner</h5>
                                </div>
                                @if (session('message'))
                                    <p style="color: green;">{{ session('message') }}</p>
                                @endif
                                <form class="theme-form theme-form-2 mega-form" action="{{ route('banners.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
									
									
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Banner Title</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="title" type="text"
                                                placeholder="Banner Title" value="{{$title}}">
                                          @error('title')
                                          <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Banner
                                            Image</label>
                                        <div class="form-group col-sm-9">
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <i class="ri-upload-2-line"></i>
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
                                       <input type="hidden" name="id" value="{{$id}}">
                                    <button class="btn ms-auto theme-bg-color text-white" type="submit" >Add Banner</button>
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
