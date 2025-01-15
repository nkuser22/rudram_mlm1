<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DatabaseModel;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Rules\WalletUseable;
use App\Rules\WalletBalance;
use App\Rules\UsableWalletinwithdrawal;
use App\Rules\TransferBalance;
use App\Rules\MinWithdrawalLimit;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Transaction;
class WithdrawalController extends Controller
{
   
    public function __construct()
    {

        $Conn = new DatabaseModel();
        
        $currency=$Conn->websiteInfo('currency');
        $withdrawal_tx_charge=$Conn->websiteInfo('withdrawal_tx_charge');
        $this->withdrawaltxcharge = $withdrawal_tx_charge;
        $this->currency = $currency;
    }


    public function index(){

     
     return view('user.pages.withdrawal.list');
    }

   


    public function create(Request $request){
        $Conn = new DatabaseModel();
        $userid = auth()->id();
        $currency = (new DatabaseModel)->websiteInfo('currency');
        $charge = (new DatabaseModel)->websiteInfo('withdrawal_tx_charge');
        $available_wallets=$Conn->setting('withdrawal_wallets');
        $withdrawals = Transaction::where('tx_type', 'withdrawal')->where('u_code', $userid)->get();
        $totalAmountSum = Transaction::where('tx_type', 'withdrawal')->where('u_code', $userid)->sum('amount');
        $totalAmountStatus0 = Transaction::where('tx_type', 'withdrawal')->where('u_code', $userid)->where('status', '0')->sum('amount');
        $totalAmountStatus1 = Transaction::where('tx_type', 'withdrawal')->where('u_code', $userid)->where('status', '1')->sum('amount');
        $totalAmountStatus2 = Transaction::where('tx_type', 'withdrawal')->where('u_code', $userid)->where('status', '2')->sum('amount');

        return view('user.pages.withdrawal.store',compact('available_wallets','userid','currency','withdrawals','charge','totalAmountStatus0','totalAmountStatus1','totalAmountStatus2','totalAmountSum'));
    }
    
    public function store(Request $request)
    {

        $selectedWallet=$request->post('selected_wallet');
        $userid = auth()->id();
        
        $rules = [
            'selected_wallet' => ['required', new UsableWalletinwithdrawal],
            'amount' => [ 
            'required',
            'numeric',
            'gt:0',
              new TransferBalance($userid,$selectedWallet),
              new MinWithdrawalLimit()
            ],

        ];
        $validated = $request->validate($rules);
       
        // Fetch bank details
        $Profile=new Profile();
        
        $bankDetails = $Profile->myDefaultAccount($userid);

        // Fetch settings
        $currency = $this->currency;
       
        $withdrawalChargePercentage =$this->withdrawaltxcharge;

        $profile = Auth::user(); 
        $username = $profile->username;
        $name = $profile->name;

        
        $amount = abs($request->input('amount'));

        $txCharge = $amount * $withdrawalChargePercentage / 100;
        $finalAmount = $amount - $txCharge;
      
     
       
        $walletBalance = $this->getWalletBalance($userid, $selectedWallet);
       
        if ($walletBalance < $finalAmount) {
            Session::flash('error', 'Insufficient funds in wallet.');
            return redirect()->back();
        }
       
        // Prepare transaction data
        $transactionData = [
            'u_code' => $userid,
            'payment_detail' => json_encode($bankDetails),
            'wallet_type' => $selectedWallet,
            'tx_type' => 'withdrawal',
            'debit_credit' => 'debit',
            'date' => Carbon::now(),
            'amount' => $finalAmount,
            'tx_charge' => $txCharge,
            'status' => 0,
            'open_wallet' => $walletBalance,
            'closing_wallet' => $walletBalance - $finalAmount,
            'remark' => "$name ($username) Withdraw $currency $amount",
        ];

        // Insert transaction into the database
        $insertSuccess = DB::table('transactions')->insert($transactionData);

        if ($insertSuccess) {
            // Update wallet balances
            $this->updateWalletBalance($userid, $selectedWallet, -$amount);
            $this->updateWalletBalance($userid, 'total_withdrawal', $amount);

            Session::flash('success', "Withdrawal request successful for $currency $amount.");
            return redirect('withdrawal');
        } else {
            Session::flash('error', 'Something went wrong.');
            return redirect()->back();
        }

    }



    private function getDefaultBankAccount($userId)
    {
        // Fetch the user's default bank account
        return DB::table('useraccounts')
            ->where('u_code', $userId)
            ->where('status', 1)
            ->first();
    }


    private function getWalletBalance($userId, $walletType)
    {
       
        $wallet = new UserWallet();
	    $balance=$wallet->getWallet($userId,$walletType);
        return $balance;
    }



    private function updateWalletBalance($userId, $walletType, $amount)
    {
        // Update wallet balance
        $wallet = new UserWallet();
        $wallet->addAmount($userId,$walletType, $amount);

    }


}
