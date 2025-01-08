<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\DatabaseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
   public function index(Request $request){
	   $Conn = new DatabaseModel();
      $currency=$Conn->websiteInfo('currency');
      $totalAmount = Transaction::sum('amount');
	   //$transactions = Transaction::orderBy('created_at', 'desc')->paginate(10); 
      $todayAmount = Transaction::whereDate('created_at', Carbon::today())->sum('amount');
      $yesterdayAmount = Transaction::whereDate('created_at', Carbon::yesterday())->sum('amount'); 


     
      // Base query
		 $query = DB::table('transactions')->join('users', 'transactions.u_code', '=', 'users.id')
		 ->select(
			 'transactions.*',
			 'users.username',
			 'users.name'
		 )
		 ->orderBy('created_at', 'desc');
 
		// Apply filters dynamically
		if ($request->has('username') && $request->username) {
			$query->where('users.username', 'LIKE', '%' . $request->username . '%');
		}
		if ($request->has('name') && $request->name) {
			$query->where('users.name', 'LIKE', '%' . $request->name . '%');
		}
		
		if ($request->has('from_date') && $request->from_date) {
			$query->whereDate('transactions.created_at', '>=', $request->from_date);
		}
		if ($request->has('to_date') && $request->to_date) {
			$query->whereDate('transactions.created_at', '<=', $request->to_date);
		}

		if (isset($request['tx_type'])) {
			$query->where('tx_type', $request['tx_type']);
		}
	
		// Get filtered data with pagination
		$transactions = $query->paginate(10);
      
	   return view('admin_view.transactions.transaction',compact('transactions','totalAmount','todayAmount','yesterdayAmount','currency'));
   }
}
