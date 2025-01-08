<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

// Route::get('/',[AdminController::class,'index']);

Route::get('/', function () {
    return view('admin_view.index');
});

Route::get('admin/add_new_product', function () {
    return view('admin_view.add_new_product');
});

Route::get('admin/add-new-attributes', function () {
    return view('admin_view.add-new-attributes');
});

Route::get('admin/add-new-category', function () {
    return view('admin_view.add-new-category');
});

Route::get('admin/all_users', function () {
    return view('admin_view.all_users');
});

Route::get('admin/coupon_list', function () {
    return view('admin_view.coupon_list');
});

Route::get('admin/create_coupon', function () {
    return view('admin_view.create_coupon');
});

Route::get('admin/listpage', function () {
    return view('admin_view.listpage');
});

Route::get('admin/main', function () {
    return view('admin_view.main');
});

Route::get('admin/media', function () {
    return view('admin_view.media');
});

Route::get('admin/order_detail', function () {
    return view('admin_view.order_detail');
});

Route::get('admin/order_list', function () {
    return view('admin_view.order_list');
});

Route::get('admin/product', function () {
    return view('admin_view.product');
});

Route::get('admin/profile', function () {
    return view('admin_view.profile');
});

Route::get('admin/report', function () {
    return view('admin_view.report');
});

Route::get('admin/role', function () {
    return view('admin_view.role');
});

Route::get('admin/support', function () {
    return view('admin_view.support_ticket');
});

Route::get('admin/taxes', function () {
    return view('admin_view.taxes');
});