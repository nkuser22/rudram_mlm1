@php
 use App\Models\DatabaseModel;
 $Conn = new DatabaseModel();
@endphp
<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--favicon-->
	<link rel="icon" href="{{$Conn->websiteInfo('logo')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('user/u1/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('user/u1/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('user/u1/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('user/u1/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('user/u1/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('user/u1/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('user/u1/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('user/u1/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('user/u1/assets/css/icons.css')}}" rel="stylesheet">
	<title>{{$Conn->websiteInfo('company_name')}}</title>
</head>
