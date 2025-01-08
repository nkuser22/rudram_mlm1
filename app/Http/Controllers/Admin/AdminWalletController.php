<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\WalletType;
use App\Models\Transaction;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class AdminWalletController extends Controller
{
   public function showWalletForm()
    {
		
        $usersWallets = WalletType::where('wallet_type', 'wallet')
		->where('status', 1)
		->get();
 
        return view('admin_view.fund.addfund', compact('usersWallets'));
    }

    public function addFunds(Request $request)
    {
		
        $request->validate([
			'username' => 'required',
			'user_wallets' => 'required',
			'amount' => 'required|numeric|min:0.01',
		]);

		
        $userId = User::getIdByUsername($request->username); 
		if (!$userId) {
			
			return back()->with('error', 'User not found.');
		}
		
		
		// transaction entry
		if(!empty($userId)){
		 $this->saveTransaction($userId,$request->user_wallets,$request->amount);
		}
		return back()->with('success', "Funds added successfully to {$request->user_wallets}'s wallet!");
    }
	
	
	 // Function to save transaction entry
	private function saveTransaction($userId,$wallet_type,$amt)
	{
		$transaction = new Transaction();
		$transaction->u_code = $userId; 
		$transaction->tx_type ='AdminFund';
		$transaction->date = date('Y-m-d H:i:s');
		$transaction->debit_credit = 'credit';
        $transaction->wallet_type = $wallet_type;		
		$transaction->amount = $amt;
		$transaction->tx_record = 1;
		$transaction->status = '1';
		$transaction->remark = 'Added fund by admin of amount ' .$amt; 
		$transaction->save();
		
		$wallet = new UserWallet();
        $wallet->addAmount($userId,$wallet_type,$amt);
    
	}
	
	
	 // To show the transaction history
    public function showFundHistory(Request $request)
    {
     
		 // Base query
		 $query = DB::table('transactions')->join('users', 'transactions.u_code', '=', 'users.id')
		 ->select(
			 'transactions.*',
			 'users.username',
			 'users.name'
		 )
		 ->where('transactions.tx_type', 'AdminFund');
 
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
	
		// Get filtered data with pagination
		$fundHistory = $query->paginate(10);

        return view('admin_view.fund.addfundhistory', compact('fundHistory'));
    }
	
	
	
	


	public function downloadFundHistory()
	{
		
		$transactions = Transaction::where('tx_type', 'AdminFund')->latest()->get();
        $csvData = "User Name,Amount,Wallet Type,Remarks,Transaction Type,Date\n";
        foreach ($transactions as $transaction) {
			$user = DB::table('users')->where('id', $transaction->u_code)->first();
													
			$csvData .= "{$user->username},{$transaction->amount},{$transaction->wallet_type},";
			$csvData .= "{$transaction->remark},{$transaction->tx_type},{$transaction->created_at}\n";
		}
        return Response::make($csvData, 200, [
			'Content-Type' => 'text/csv',
			'Content-Disposition' => 'attachment; filename="fund_history.csv"',
		]);
	}
	
	
	
	
	
	
	
	
	public function checkUsername($username)
{
    $user = User::where('username', $username)->first();

    if ($user) {
        return response()->json(['exists' => true, 'name' => $user->name]);
    } else {
        return response()->json(['exists' => false]);
    }
}




	public function pendingFund(){
		
		$pendingFunds = Transaction::where('tx_type', 'fundRequest')
		->where('status', 0)
		->get();
		return view('admin_view.fund.pending_request',compact('pendingFunds'));
	}
	
	
	public function approvedFund(){
		
	$approvedFunds = Transaction::where('tx_type', 'fundRequest')
		->where('status', 1)
		->get();
    return view('admin_view.fund.approved_request',compact('approvedFunds'));	
	}
	
	
	
	public function cancelledFund(){
		
	$cancelledFunds = Transaction::where('tx_type', 'fundRequest')
		->where('status', 2)
		->get();
    return view('admin_view.fund.cancelled_request',compact('cancelledFunds'));	
	}
	
	
	
	public function approve($id) {
		$fundrequest = Transaction::where('id', $id)
		->where('tx_type', 'fundRequest')
		->get();
		$userId=$fundrequest[0]->u_code;
		$amt=$fundrequest[0]->amount;
		$wallet_type=$fundrequest[0]->wallet_type;
		
		$fund = Transaction::findOrFail($id);
		$fund->status = 1; // approved
		$query=$fund->save();
		
		return redirect('admin/fund/pending')->with('message', 'Fund approved successfully.');
		
	}

	public function reject(Request $request,$id) {
		$fundrequest_exists = Transaction::where('id', $id)
		->where('tx_type', 'fundRequest')
		->get();
		$reason=$request->post('reason');
		$request->validate([
			'reason' => 'required',
			
		]);
		if($fundrequest_exists){
		$fund = Transaction::findOrFail($id);
		$fund->status = 2;
        $fund->reason =$reason;		// Rejected
		$fund->save();
		}
       
		return redirect()->back()->with('message', 'Fund rejected successfully.');
	}




}
