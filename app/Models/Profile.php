<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Rank;
use Illuminate\Support\Facades\DB;
class Profile extends Model
{
    use HasFactory;

    public function getIdByUsername($username)
    {
        return User::where('username', $username)->value('id') ?: false;
    }

    public function getIdByUsernameInfo($username)
    {
        return User::where('username', $username)->value('u_code') ?: false;
    }

    public function getProfileInfoUsers($id, $param = '*')
    {
        return User::select($param)->where('u_code', $id)->first() ?: false;
    }

    public function myDefaultAccount($u_code)
    {
        $account = \DB::table('user_payment_methods')
            ->where('u_code', $u_code)
            ->where('status', 1)
            ->first();

        if ($account) {
            $default = $account->default_account;
            $accounts = $account->accounts ? json_decode($account->accounts, true) : [];
            return $accounts[$default] ?? [];
        }

        return [];
    }

    public function myRankPercentage($u_code)
    {
        return Rank::where('u_code', $u_code)
            ->where('is_complete', 1)
            ->orderByDesc('rank_per')
            ->value('rank_per') ?: 0;
    }

    public function myRank($u_code)
    {
        return Rank::where('u_code', $u_code)
            ->where('is_complete', 1)
            ->orderByDesc('rank_id')
            ->value('rank_id') ?: false;
    }

    public function myRankArray($u_code, $rank_id)
    {
        return Rank::where('u_code', $u_code)
            ->where('rank_id', $rank_id)
            ->where('is_complete', 1)
            ->first() ?: false;
    }

    public function profileInfo($id, $param = '*')
    {
        return User::select($param)->where('id', $id)->first() ?: false;
    }

    public function franchiseInfo($id, $param = '*')
    {
        return \DB::table('franchise_users')
            ->select($param)
            ->where('id', $id)
            ->first() ?: false;
    }

    public function getSponsor($userId)
    {
        return User::where('id', $userId)->value('u_sponsor') ?: false;
    }

    public function getParentId($userId)
    {
        return User::where('id', $userId)->value('Parentid') ?: false;
    }

    public function sponsorInfo($userId, $param = '*')
    {
        $sponsorId = $this->getSponsor($userId);
        return $sponsorId ? User::select($param)->where('id', $sponsorId)->first() : false;
    }
     

    public function Parentid($userId)
{
    
    $parentId = DB::table('users')
        ->where('id', $userId)
        ->value('Parentid');  

    
    $ret = ($parentId && $parentId != 0 && $parentId != '' ? $parentId : false);

    return $ret;
}
    public function parentInfo($userId, $param = '*')
    {
        $parentId = $this->getParentId($userId);
        return $parentId ? User::select($param)->where('id', $parentId)->first() : false;
    }

    public function poolParent($matrixId)
    {
        return \DB::table('pool')->where('id', $matrixId)->value('parent_id') ?: false;
    }

    public function poolInfo($matrixId)
    {
        return \DB::table('pool')->where('id', $matrixId)->first() ?: false;
    }

    public function columnLike($str, $column)
    {
        return User::where($column, 'like', "%$str%")->pluck('id')->toArray();
    }

    public function columnLikeFranchise($str, $column)
    {
        return \DB::table('franchise_users')
            ->where($column, 'like', "%$str%")
            ->pluck('id')
            ->toArray();
    }

    public function thousandsCurrencyFormat($num)
    {
        if ($num > 1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = ['k', 'm', 'b', 't'];
            $x_count_parts = count($x_array) - 1;
            $x_display = $x_array[0] . (isset($x_array[1][0]) && (int)$x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];
            return $x_display;
        }

        return $num;
    }

    public function levelIncome($lvl, $roi_ids)
    {
        return Transaction::where('tx_type', 'income')
            ->where('source', 'level')
            ->where('roi_id', $roi_ids)
            ->where('tx_record', $lvl)
            ->whereDate('date', now())
            ->sum('amount');
    }

    public function levelInfoUsers($lvl, $roi_ids)
    {
        return Transaction::where('tx_type', 'income')
            ->where('source', 'level')
            ->where('roi_id', $roi_ids)
            ->where('tx_record', $lvl)
            ->whereDate('date', now())
            ->value('u_code') ?: false;
    }

    public function totalIncomeEducationPackage()
    {
        $userIds = User::where('package_type', 'Education')
            ->where('active_status', 1)
            ->pluck('id');

        return Transaction::whereIn('u_code', $userIds)
            ->where('tx_type', 'income')
            ->sum('amount');
    }

    public function totalIncomeTradingPackage()
    {
        $userIds = User::where('package_type', 'Trading')
            ->where('active_status', 1)
            ->pluck('id');

        return Transaction::whereIn('u_code', $userIds)
            ->where('tx_type', 'income')
            ->sum('amount');
    }

    public function sumArrays($array1, $array2)
    {
        return array_map(function ($value, $index) use ($array2) {
            return $value + ($array2[$index] ?? 0);
        }, $array1, array_keys($array1));
    }
}
