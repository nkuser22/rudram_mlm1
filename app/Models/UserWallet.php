<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\UserWallet;
use App\Models\Profile;
use App\Models\DatabaseModel;
use App\Models\Team;

class UserWallet extends Model
{
    protected $table = 'user_wallets';
    protected $fillable = ['u_code', 'balance', 'wallet_type_id', 'left_team', 'right_team', 'total_directs', 'active_directs', 'inactive_directs', 'total_gen', 'active_gen', 'unused_pins', 'total_pins'];
    
   
    public function addDirect($u_code)
    {
        $this->addAmount($u_code, 'total_directs', 1);
        $this->addAmount($u_code, 'inactive_directs', 1);
    }

    public function activeDirect($u_code){
        
         $this->addAmount($u_code,'total_directs',1);
         $this->addAmount($u_code,'total_directs',-1);        
     }
    


     public function activeGen($u_code){
        $this->addAmount($u_code,'active_gen',1);
        $sponsor= (new Profile)->profileInfo($u_code);
        if($sponsor){
            $this->activeGen($sponsor->id);
        }                
    } 
  
    public function addGen($u_code)
    {
        $profile = new Profile(); 
        
        $this->addAmount($u_code, 'total_gen', 1);
        
        $sponsor=$profile->sponsorInfo($u_code);
       
        if ($sponsor) {
            $this->addGen($sponsor->id);
        }
    }


        public function addGenUser($u_code, $user_id)
    {
        $profile = new Profile();
        $check_exists = DB::table('user_teams')->where('u_code', $u_code)->first();

        if ($check_exists) {
            $arr = json_decode($check_exists->gen_team, true);

            if (!empty($arr)) {
                array_push($arr, $user_id);
            } else {
                $arr = [$user_id];
            }

            $arr_updated = ['gen_team' => json_encode($arr)];

            DB::table('user_teams')
                ->where('u_code', $u_code)
                ->update($arr_updated);

            
            $sponsor = $profile->sponsorInfo($u_code);

            
            if ($sponsor && $sponsor->id && $sponsor->id != 0) {
                
                $this->addGenUser($sponsor->id, $user_id);
            }

        }

        return true;
    }

    
    public function addUserTeam($code)
    {
        $ge = [
            'u_code' => $code,
            'gen_team' => json_encode([])  
        ];
    
       
        DB::table('user_teams')->insert($ge);
    }


    // This method will update the wallet by adding or subtracting values
    public function updateWallet($u_code, $slug, $value)
    {
        $column = $this->getColumn($slug);

        if ($column !== false) {
            $walletExists = $this->where('u_code', $u_code)->first();
            $wallet = [$column => $value];

            if ($walletExists) {
                $this->where('u_code', $u_code)->update($wallet);
            } else {
                $wallet['u_code'] = $u_code;
                $this->create($wallet);
            }
        }
    }

 

    // This method returns the column name based on wallet type slug
    public function getColumn($type)
    {
        $walletType = DB::table('wallet_types')->where('slug', $type)->where('status', 1)->first();
        return $walletType ? $walletType->wallet_column : false;
    }

    // Add amount to the specific wallet
    public function addAmount($u_code, $slug, $amount)
    {
        $column = $this->getColumn($slug);
		
        if ($column) {
            $wallet = $this->where('u_code', $u_code)->first();
			
            if ($wallet) {
                $this->where('u_code', $u_code)->increment($column, $amount);
            } else {
                $this->create([
                    'u_code' => $u_code,
                    $column => $amount
                ]);
            }
        }
    }

    // Update wallet column with a specific amount
    public function anyUpdate($u_code, $slug, $amount)
    {
        $column = $this->getColumn($slug);
        if ($column) {
            $walletExists = $this->where('u_code', $u_code)->first();
            if ($walletExists) {
                $this->where('u_code', $u_code)->update([$column => $amount]);
            } else {
                $this->create([
                    'u_code' => $u_code,
                    $column => $amount
                ]);
            }
        }
    }

    // Retrieve wallet balance for a given user and wallet type
    public function getWallet($u_code, $slug)
    {
        $column = $this->getColumn($slug);
        if ($column) {
            $wallet = $this->where('u_code', $u_code)->first();
            return $wallet ? $wallet->{$column} : 0;
        }
        return 0;
    }

    // Update the user's direct teams
    public function directUpdate($u_code)
    {
        $directs = $this->team->directs($u_code);
        $myActives = $this->team->myActives($u_code);

        $total = count($directs);
        $myActivesTotal = count($myActives);
        $inactive = $total - $myActivesTotal;

        $update = [
            'total_directs' => $total,
            'active_directs' => $myActivesTotal,
            'inactive_directs' => $inactive,
        ];

        $this->where('u_code', $u_code)->update($update);

        $sponsor = $this->profile->sponsor($u_code);
        if ($sponsor) {
            $this->directUpdate($sponsor);
        }
    }

    // Update generation values based on the user's team
    public function generationUpdate($u_code)
    {
        $actives = $this->team->actives();
        $myGeneration = $this->team->myGeneration($u_code);

        $activeGen = array_intersect($myGeneration, $actives);

        $update = [
            'total_gen' => count($myGeneration),
            'active_gen' => count($activeGen),
        ];

        $this->where('u_code', $u_code)->update($update);

        $sponsor = $this->profile->sponsor($u_code);
        if ($sponsor) {
            $this->generationUpdate($sponsor);
        }
    }

    // Add pins to user's wallet
    public function addPin($u_code, $noOfPins = 1)
    {
        $this->addAmount($u_code, 'total_pins', $noOfPins);
        $this->addAmount($u_code, 'unused_pins', $noOfPins);
    }

    // Deduct pins from the user's wallet
    public function usedPin($u_code, $noOfPins = 1)
    {
        $this->addAmount($u_code, 'unused_pins', -$noOfPins);
    }

   


    public function updateBinary($u_code){
        $Conn = new DatabaseModel();
        $binary_count_type=$Conn->setting('binary_count_type');
        if($binary_count_type=='bv'){
            $left_team=$this->teamByBusiness($u_code,1);
            $right_team=$this->teamByBusiness($u_code,2);
        }else{
             $left_team=$this->teamByPv($u_code,1);
             $right_team=$this->teamByPv($u_code,2);
        }
        if($left_team!=''){
            $this->anyUpdate($u_code,'left_team',$left_team);
        }
        if($right_team!=''){
            $this->anyUpdate($u_code,'right_team',$right_team);
        }
        $profile = new Profile();
        $Parentid=$profile->Parentid($u_code);
        if($Parentid){
            $this->updateBinary($Parentid);
        }
        return true ;

    }



    public function teamByBusiness($userId, $position)
{
    $Team = new Team();
    $myTeams = $Team->teamByPosition($userId, $position);
    
    $totalPersonalPv = 0;
    
    if (!empty($myTeams)) {
       
        $implode = implode(',', $myTeams);

        
        $personalBvQuery = DB::table('orders')
            ->whereIn('u_code', $myTeams)
            ->where('status', '1')
            ->sum('order_bv');

        
        $totalPersonalPv = $personalBvQuery ? $personalBvQuery : 0;
    }
    
   
    $personalCarryQuery = DB::table('dummy_carry')
        ->where('u_code', $userId)
        ->where('position', $position)
        ->where('status', '1')
        ->sum('carry');

    
    $totalDummyCarry = $personalCarryQuery ? $personalCarryQuery : 0;

    
    return $totalPersonalPv + $totalDummyCarry;
}




public function teamByPv($userId, $position)
{
    $Team = new Team();
    $myTeams = $Team->teamByPosition($userId, $position);
    
    $totalPersonalPv = 0;

    if (!empty($myTeams)) {
      
        $implode = implode(',', $myTeams);
        $personalPvQuery = DB::table('orders')
            ->whereIn('u_code', $myTeams)
            ->where('status', '1')
            ->where('tx_type', 'purchase')
            ->sum('pv'); 
        
        
        $totalPersonalPv = $personalPvQuery ? $personalPvQuery : 0;
    }
    
   
    $personalCarryQuery = DB::table('dummy_carry')
        ->where('u_code', $userId)
        ->where('position', $position)
        ->where('status', '1')
        ->sum('carry'); 

    
    $totalDummyCarry = $personalCarryQuery ? $personalCarryQuery : 0;

    // Return the total business (personal PV + dummy carry)
    return $totalPersonalPv + $totalDummyCarry;
}

	
	
	
	
		public function currentPayoutId()
	{
		$payout_id = DB::table('company_payout')->max('id');
		return $payout_id ? $payout_id + 1 : 1;
	}

	public function currentFranchisePayoutId()
	{
		$max_payout_id = DB::table('transaction_franchise')
			->where('tx_type', 'payout')
			->max('payout_id');
		
		return $max_payout_id ? $max_payout_id + 1 : 1;
	}


	public function debit($usrId, $params = [])
	{
		$query = DB::table('transaction')
			->selectRaw('SUM(amount) as total, SUM(tx_charge) as charges')
			->where('u_code', $usrId)
			->where('debit_credit', 'debit');
			
		if (array_key_exists('tx_type', $params)) {
			$query->whereIn('tx_type', (array) $params['tx_type']);
		}

		if (array_key_exists('status', $params)) {
			$query->whereIn('status', (array) $params['status']);
		} else {
			$query->where('status', 1);
		}

		if (array_key_exists('wallet_type', $params)) {
			$query->where('wallet_type', $params['wallet_type']);
		}

		$result = $query->first();
		return $result ? $result->total + $result->charges : 0;
	}

	public function credit($usrId, $params = [])
	{
		$query = DB::table('transaction')
			->selectRaw('SUM(amount) as total, SUM(tx_charge) as charges')
			->where('u_code', $usrId)
			->where('debit_credit', 'credit');

		if (array_key_exists('tx_type', $params)) {
			$query->whereIn('tx_type', (array) $params['tx_type']);
		}

		if (array_key_exists('status', $params)) {
			$query->whereIn('status', (array) $params['status']);
		} else {
			$query->where('status', 1);
		}

		if (array_key_exists('wallet_type', $params)) {
			$query->where('wallet_type', $params['wallet_type']);
		}

		$result = $query->first();
		return $result ? $result->total - $result->charges : 0;
	}


	public function income($usrId, $wallet_type)
	{
		$walletTypes = DB::table('wallet_types')
			->where('count_in_wallet', $wallet_type)
			->where('status', 1)
			->where('wallet_type', 'income')
			->pluck('slug')
			->toArray();

		if (empty($walletTypes)) {
			return 0;
		}

		$transaction = DB::table('transaction')
			->selectRaw('SUM(amount) - SUM(tx_charge) as total')
			->where('wallet_type', $wallet_type)
			->where('u_code', $usrId)
			->whereIn('source', $walletTypes)
			->where('status', 1)
			->first();

		return $transaction ? $transaction->total : 0;
	}

		
		public function balance($usrId, $wallet_type = 'main_wallet')
	{
		$credit = [
			'tx_type' => ['admin_credit', 'transfer', 'added_btc', 'convert_recieve'],
			'wallet_type' => $wallet_type
		];

		$debit = [
			'tx_type' => ['transfer', 'withdrawal', 'pin_purchase', 'topup', 'product_purchase', 'payout', 'convert_send'],
			'wallet_type' => $wallet_type,
			'status' => [1, 0]
		];

		$income = $this->income($usrId, $wallet_type);
		$totalIncome = $this->totalIncome($usrId, $wallet_type);
		$totalCredit = $this->credit($usrId, $credit);
		$totalDebit = $this->debit($usrId, $debit);

		return $totalCredit - $totalDebit + $income + $totalIncome;
	}
	
	
	 public function paidEarning($usrId, $tx_type)
{
    $paidAmts = DB::table('transaction')
        ->where('u_code', $usrId)
        ->where('tx_type', $tx_type)
        ->where('status', 1)
        ->sum('amount');

    return $paidAmts ?: 0;
}

public function payableEarning($usrId, $tx_type)
{
    $paidAmts = DB::table('transaction')
        ->where('u_code', $usrId)
        ->where('tx_type', $tx_type)
        ->where('status', 0)
        ->sum('amount');

    return $paidAmts ?: 0;
}


public function generatedPayoutByIncome($u_code, $source)
{
    $paidAmts = DB::table('transaction')
        ->where('u_code', $u_code)
        ->where('tx_type', 'income')
        ->where('payout_status', 1)
        ->where('source', $source)
        ->selectRaw('SUM(amount) - SUM(tx_charge) as amt')
        ->first();

    return $paidAmts ? $paidAmts->amt : 0;
}

public function pendingPayoutByIncome($u_code, $source)
{
    $paidAmts = DB::table('transaction')
        ->where('u_code', $u_code)
        ->where('tx_type', 'income')
        ->where('payout_status', 0)
        ->where('source', $source)
        ->selectRaw('SUM(amount) - SUM(tx_charge) as amt')
        ->first();

    return $paidAmts ? $paidAmts->amt : 0;
}






}
