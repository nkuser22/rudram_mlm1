<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Front 

use App\Http\controllers\Front\FrontController;
use App\Http\controllers\Front\LoginController;
use App\Http\controllers\Front\RegisterController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\PasswordResetController;
use App\Http\Controllers\Front\ForgotPasswordController;
use App\Http\Controllers\Front\BlogsController;
use App\Http\Controllers\Front\WishlistController;


// Admin
use App\Http\controllers\Admin\AdminController;
use App\Http\controllers\Admin\ProductController;
use App\Http\controllers\Admin\CategoryController;
use App\Http\controllers\Admin\BannerController;
use App\Http\controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\AdminWalletController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\WithdrawalAdminController;



//  User 
use App\Http\controllers\User\DashboardController;
use App\Http\Controllers\User\FundController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\TeamController;
use App\Http\Controllers\User\Investment;
use App\Http\Controllers\User\CompanyPayMethodController;
use App\Http\Controllers\User\UseraccountsController;
use App\Http\Controllers\User\WithdrawalController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

	Route::fallback(function () {
		abort(404);
	});

	// Front Route

	Route::get('/',[FrontController::class,'index']);
	Route::get('/shop',[FrontController::class,'shop']);
	Route::get('/newyear',[FrontController::class,'happynewyear']);
	Route::get('/login', [LoginController::class, 'showLoginForm']);
	Route::post('/login', [LoginController::class, 'login'])->name('login');
	Route::get('/register-success', [FrontController::class, 'successPage']);

	Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
	Route::post('/register', [RegisterController::class, 'register'])->name('register');
	Route::get('/get-states/{country_id}', [RegisterController::class, 'getStates']);
	Route::get('/get-cities/{state_id}', [RegisterController::class, 'getCities']);
    Route::post('/register/check-sponsor-exist', [RegisterController::class, 'checkSponsorExist']);

	// Route to show the cart
	Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

	// Route to add product to cart
	Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

	// Route to remove product from cart
	Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

	Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
	Route::post('/cart/destroy', [CartController::class, 'destroyCart'])->name('cart.destroy');



	// checkout
	Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
	Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
	Route::get('/checkout/success/{order_id}', [CheckoutController::class, 'success'])->name('checkout.success');
	// contact
	Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
	Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

	// forgot password process start
	Route::get('/user-forgot', [ForgotPasswordController::class, 'index']);
	Route::post('/forgot-password/verify', [ForgotPasswordController::class, 'verify'])->name('forgot-password.verify');
	Route::get('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('verify-otp');
	Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp']);
	Route::get('/change-password', [ForgotPasswordController::class, 'changePassword'])->name('change-password');
	Route::post('/change-password', [ForgotPasswordController::class, 'changePassword']);
	// forgot password process end

	// blog process start
	Route::get('/blog-list', [BlogsController::class, 'index']);
	Route::get('/blog/{id}', [BlogsController::class, 'show'])->name('blog.show');
	// blog process end
	
	
	// wishlist
	Route::get('/wishlist', function () {
		return view('front.pages.wishlist.wishlist');
	 });
	Route::get('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
	Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
	Route::get('/wishlistpage', [WishlistController::class, 'showWishlist']);
    
	Route::get('/product/{id}', [FrontController::class, 'productShow'])->name('product.show');


	Route::get('/about', function () {
		return view('front.pages.about');
	 });


	 Route::get('/otp', function () {
		return view('front.pages.otp');
	 });
	 

    


	// Admin 
	Route::get('/admin',[AdminController::class,'index']);
	Route::get('/admin/login',[AdminController::class,'index']);
	Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');
	//admin login 
	Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware('admin_login');
	Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
	Route::get('/admin/edit-user/{id}', [AdminController::class, 'editUserProfile'])->name('admin.editUser');
	Route::post('/update-user/{id}', [AdminController::class, 'updateUserProfile'])->name('admin.updateUser');
    Route::post('/admin/login-as-user/{id}', [AdminController::class, 'loginAsUser'])->name('admin.login-as-user');
    Route::post('/admin/users/update-block-status', [AdminController::class, 'updateBlockStatus']);


    Route::get('/admin/payment-method/edit/{id}', [PaymentMethodController::class, 'edit'])->name('payment-method.edit');
    Route::post('/admin/payment-method', [PaymentMethodController::class, 'update'])->name('payment-method.update');




	Route::get('/admin/product',[ProductController::class,'index']);


  // category crud st
  Route::get('admin/category',[CategoryController::class,'index']);
  Route::get('admin/manage_category',[CategoryController::class,'manage_category']);
  Route::post('admin/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.insert');
  //edit
  Route::get('admin/manage_category/{id}',[CategoryController::class,'manage_category']);
  
  //Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);
  Route::get('admin/category/destroy/{id}',[CategoryController::class,'destroy']);
  
  // category crud end
  

  // Product crud st
    Route::get('admin/product',[ProductController::class,'index']);
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
	Route::post('admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
   
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);
    // Product crud end

    // Orders crud st
   Route::get('/admin/orders',[OrderController::class,'index']);
   Route::get('/admin/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
   Route::put('admin/orders/{order}/updateStatus', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
   // Order tracking route
   Route::get('admin/order/{orderId}/tracking', [OrderController::class, 'showOrderTracking'])->name('admin.orders.tracking');
   // download Orders
   Route::get('/download-orders', [OrderController::class, 'downloadOrders'])->name('download.orders');

   Route::get('/admin-invoice/{id}', [OrderController::class, 'invoice']);
   // Order crud end
   
   Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('transactions.index');
   
   // chng paswword
  
    // Show the change password form
    Route::get('/admin/change-password', [AdminController::class, 'showChangePasswordForm']);
    
    // Handle the password update
    Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.update-password');

    
    // Fund route
    Route::get('/admin/addfund', [AdminWalletController::class, 'showWalletForm'])->name('admin.wallet.form');
    Route::post('/admin/wallet/add-funds', [AdminWalletController::class, 'addFunds'])->name('admin.wallet.addFunds');
	Route::get('/admin/fund-history', [AdminWalletController::class, 'showFundHistory']);
    Route::get('/admin/download-fund-history', [AdminWalletController::class, 'downloadFundHistory'])->name('admin.downloadFundHistory');
	
	Route::get('/admin/fund/pending', [AdminWalletController::class, 'pendingFund']);
	Route::get('/admin/fund/approved', [AdminWalletController::class, 'approvedFund']);
	Route::get('/admin/fund/cancelled', [AdminWalletController::class, 'cancelledFund']);
	Route::patch('/funds/{id}/approve', [AdminWalletController::class, 'approve'])->name('funds.approve');
    Route::patch('/funds/{id}/reject', [AdminWalletController::class, 'reject'])->name('funds.reject');


 // Withdrawal route
	Route::get('/admin/payout/pending', [WithdrawalAdminController::class, 'pendingPayout']);
	Route::get('/admin/payout/approved', [WithdrawalAdminController::class, 'approvedPayout']);
	Route::get('/admin/payout/cancelled', [WithdrawalAdminController::class, 'cancelledPayout']);
	Route::patch('/payout/{id}/approve', [WithdrawalAdminController::class, 'approve'])->name('payouts.approve');
    Route::patch('/payout/{id}/reject', [WithdrawalAdminController::class, 'reject'])->name('payouts.reject');

	// support route
	Route::get('/admin/support/pending', [SupportController::class, 'index'])->name('tickets.index'); 
    Route::delete('/{id}', [SupportController::class, 'destroy'])->name('tickets.destroy'); 
    Route::post('/tickets/{id}/reply', [SupportController::class, 'reply'])->name('tickets.reply');
	
	// notification route
	Route::get('/admin/send-notification', [NotificationController::class, 'index'])->name('notifications.send');
	Route::post('/admin/send-notification', [NotificationController::class, 'showNotifications'])->name('notifications.send');

   // popup route
    Route::get('/admin/send-popup-show', [NotificationController::class, 'showpopup']);
    Route::get('/admin/send-popup', [NotificationController::class, 'popupadd'])->name('showpopups.send');
	Route::post('/admin/send-popup', [NotificationController::class, 'sendPopup'])->name('showpopups.send');
    Route::get('admin/send-popup/delete/{id}',[NotificationController::class,'delete']);
    Route::get('admin/send-popup/status/{status}/{id}',[NotificationController::class,'status']);
	
	// contact us
	Route::get('/admin/contact', [AdminController::class, 'contactHistory']);


// logout admin
    Route::get('admin/logout', function () {
     
    session()->forget('admin_login');
    session()->forget('admin_id');
    session()->flash('error','Logout Successfully!');
    return redirect('admin/login');
    
    });


	// Banner route

	Route::get('/admin/banners', [BannerController::class, 'index'])->name('banners.index'); // List all banners
	Route::get('/admin/banners/create', [BannerController::class, 'addbanner']);
	Route::post('/admin/banners/create', [BannerController::class, 'create'])->name('banners.create');
	Route::get('/admin/banners/update/{id}', [BannerController::class, 'addbanner']);
	Route::post('/admin/banners/update/{id}', [BannerController::class, 'update'])->name('banners.update');
	Route::get('/admin/banners/delete/{id}', [BannerController::class, 'delete'])->name('banners.delete');
	Route::get('/admin/banners/toggle-status/{id}', [BannerController::class, 'toggleStatus'])->name('banners.toggleStatus');



	// Blog route end
	Route::get('/admin/blog', [BlogController::class, 'index'])->name('blog.index'); // List all blog
	Route::get('/admin/blog/create', [BlogController::class, 'addBlog']);
	Route::post('/admin/blog/create', [BlogController::class, 'create'])->name('blogs.create');
	Route::get('/admin/blog/update/{id}', [BlogController::class, 'addBlog']);
	Route::get('/admin/blog/delete/{id}', [BlogController::class, 'delete'])->name('blogs.delete');
	Route::get('/admin/blog/toggle-status/{id}', [BlogController::class, 'toggleStatus'])->name('blogs.toggleStatus');





	Route::get('admin/coupon_list', function () {
	   return view('admin_view.coupon_list');
	});

	Route::get('admin/create_coupon', function () {
	   return view('admin_view.create_coupon');
	});

	Route::get('admin/listpage', function () {
	   return view('admin_view.listpage');
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





	  //Users Controller route

	  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
	  Route::get('/user-profile', [DashboardController::class, 'userProfile']);
	  Route::post('/user-profile', [DashboardController::class, 'update'])->name('profile.update');
	  Route::post('/update-password', [DashboardController::class, 'updatePassword'])->name('user-password.update');
	  Route::get('/user-transactions', [DashboardController::class, 'transactions']);
	  Route::get('/user-orders', [DashboardController::class, 'orders']);
	  Route::get('/user-invoice/{id}', [DashboardController::class, 'invoice']);
	  
	  // Routes for users

	Route::get('/user-funds', [FundController::class, 'index'])->name('user.funds.index');
	Route::get('/user-funds/create', [FundController::class, 'create'])->name('user.funds.create');
	Route::post('/user-funds', [FundController::class, 'store'])->name('user.funds.store');
	Route::get('/user-funds-history', [FundController::class, 'fundRequestHistory']);
    Route::post('/fund/getPaymentMethod', [FundController::class, 'getPaymentMethod'])->name('fund.getPaymentMethod');
	Route::post('/fund/getPaymentMethodImage', [FundController::class, 'getPaymentMethodImage'])->name('fund.getPaymentMethodImage');
	
	
	// Ticket route

	Route::get('/user-tickets', [TicketController::class, 'index'])->name('tickets.index'); 
	Route::get('/user-tickets/create', [TicketController::class, 'create']);
	Route::post('/user-tickets/create', [TicketController::class, 'addticket'])->name('user.tickets.create');
    
// Investment
	Route::get('/user-packages', [Investment::class, 'index'])->name('packages.index'); 
	Route::get('/user-packages/create', [Investment::class, 'create']);
	Route::post('/user-packages/create', [Investment::class, 'buypackages'])->name('user.packages.create');

	Route::post('/user-packages/verify-username', [Investment::class, 'verifyUsername']);

	// UserAccount payment
	Route::get('/user-accounts', [UseraccountsController::class, 'index']);
	Route::post('/user-accounts/store', [UseraccountsController::class, 'store'])->name('accounts.store');
	Route::post('/accounts/getSection', [UseraccountsController::class, 'getSection'])->name('accounts.getSection');
	Route::post('/accounts/defaultAccount/{id}', [UseraccountsController::class, 'defaultAccount'])->name('accounts.defaultAccount');
	Route::post('/accounts/addDelete/{id}', [UseraccountsController::class, 'addDelete'])->name('accounts.addDelete');
    

    // Withdrawal
	Route::get('/user-withdrawal-list', [WithdrawalController::class, 'index']);
    Route::get('/withdrawal', [WithdrawalController::class, 'create']); 
	Route::post('/user-withdrawal', [WithdrawalController::class, 'store'])->name('user.withdraw.store'); 



	// Team 
	Route::get('/user-directs', [TeamController::class, 'teamDirect']);
	Route::get('/user-teams', [TeamController::class, 'teamGeneration']);

	
  Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to the homepage or login page
  })->name('logout');
  

