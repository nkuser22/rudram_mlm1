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
						@if(session()->has('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{session('message')}}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						@endif
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Popup Notification</h5>
                                </div>
                               
                               <form action="{{ route('showpopups.send') }}" method="POST" enctype="multipart/form-data">
								@csrf
								
								<div class="mb-3">
									<label for="title" class="form-label">Title</label>
									<input type="text" name="title" id="title" class="form-control" required>
								</div>
							   
								<div class="mb-3">
									<label for="message" class="form-label">Message</label>
									<textarea name="message" id="message" rows="4" class="form-control" required></textarea>
									 @error('message')
								  <div class="alert alert-danger" role="alert">
									{{$message}}
										</div>
									@enderror
								</div>
								
							    <div class="mb-3">
									<label for="title" class="form-label">Popup Image</label>
									<input type="file" name="image" id="title" class="form-control" required>
								</div>
							   
								<button type="submit" class="btn btn-primary">Add Popup</button>
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
