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
use App\Models\Companypaymethod;
class WithdrawalAdminController extends Controller
{
    
	public function __construct()
    {
        $this->type='withdrawal';  
      
    }


    public function pendingPayout(){
		
		$pendingFunds = Transaction::where('tx_type', $this->type)
		->where('status', 0)
		->get();
		
		$companyPaymentMethods = Companypaymethod::where('status', 1)->get();
		$fields = [];
		foreach ($companyPaymentMethods as $paymentMethod) {
			$fields[$paymentMethod->unique_name] = json_decode($paymentMethod->fields_required, true);
		}
		return view('admin_view.payout.pending_request',compact('pendingFunds','fields'));
	}
	
	
	public function approvedPayout(){
		
	$approvedFunds = Transaction::where('tx_type',$this->type)
		->where('status', 1)
		->get();

	$companyPaymentMethods = Companypaymethod::where('status', 1)->get();
	$fields = [];
	foreach ($companyPaymentMethods as $paymentMethod) {
		$fields[$paymentMethod->unique_name] = json_decode($paymentMethod->fields_required, true);
	}
    return view('admin_view.payout.approved_request',compact('approvedFunds','fields'));	
	}
	
	
	
	public function cancelledPayout(){
		
	$cancelledFunds = Transaction::where('tx_type',$this->type)
		->where('status', 2)
		->get();

	$companyPaymentMethods = Companypaymethod::where('status', 1)->get();
	$fields = [];
	foreach ($companyPaymentMethods as $paymentMethod) {
		$fields[$paymentMethod->unique_name] = json_decode($paymentMethod->fields_required, true);
	}
    return view('admin_view.payout.cancelled_request',compact('cancelledFunds','fields'));	
	}




    public function approve($id) {
		$fundrequest = Transaction::where('id', $id)
		->where('tx_type', $this->type)
		->get();
		$userId=$fundrequest[0]->u_code;
		$amt=$fundrequest[0]->amount;
		$wallet_type=$fundrequest[0]->wallet_type;
		
		$fund = Transaction::findOrFail($id);
		$fund->status = 1; // approved
		$query=$fund->save();
		if($query){

			$wallet = new UserWallet();
            $wallet->addAmount($userId,$wallet_type,$amt);
		}
		
		return redirect('admin/payout/pending')->with('message', 'Withdrawal approved successfully.');
		
	}

	public function reject(Request $request,$id) {
		$fundrequest_exists = Transaction::where('id', $id)
		->where('tx_type', $this->type)
		->get();
		$userId=$fundrequest_exists[0]->u_code;
		$amt=$fundrequest_exists[0]->amount+$fundrequest_exists[0]->tx_charge;
		$wallet_type=$fundrequest_exists[0]->wallet_type;
		$reason=$request->post('reason');
		$request->validate([
			'reason' => 'required',
			
		]);
		if($fundrequest_exists){
		$fund = Transaction::findOrFail($id);
		$fund->status = 2;
        $fund->reason =$reason;		// Rejected
		$query=$fund->save();
		if($query){

			$wallet = new UserWallet();
            $wallet->addAmount($userId,$wallet_type,$amt);
			$wallet->addAmount($userId,'total_withdrawal',-$amt);
		}
		
		}
       
		return redirect()->back()->with('message', 'Withdrawal rejected successfully.');
	}

}
