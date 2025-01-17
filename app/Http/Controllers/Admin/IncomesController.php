<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\DatabaseModel;
class IncomesController extends Controller
{
    


    public function report(Request $request)
    {
        $slugs = $name = $request->query('source');
       
        // $allIncome = \App\Models\WalletType::where('wallet_type', 'income')->where('status', 1)->where('plan_type', 1)->get();
        // $slugs = $allIncome->pluck('slug')->toArray();
        
        $query = Transaction::where('tx_type', 'income')->where('source', $slugs)->select('*')->get();
        $total = Transaction::where('tx_type', 'income')->where('source', $slugs)->sum('amount');


        // Apply filters dynamically
		if ($request->has('username') && $request->username) {
			$query->where('users.username', 'LIKE', '%' . $request->username . '%');
		}
		

       // $incomes = $query->paginate(10);

       
        return view('admin_view.incomes.report', ['incomes' => $query, 'slugs' => $slugs , 'total' => $total]);
        
    }
}
