<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Team extends Model
{
    use HasFactory;

    protected $table = 'users'; // Assuming the `users` table is used

    /**
     * Get direct team members by sponsor ID.
     */
    public function directs($userid)
    {
        return self::where('u_sponsor', $userid)->pluck('id')->toArray();
    }

    /**
     * Get active team members by sponsor ID.
     */
    public function myActives($userid)
    {
        return self::where('u_sponsor', $userid)->where('active_status', 1)->pluck('id')->toArray();
    }

    /**
     * Get active team members by sponsor ID with active date condition.
     */
    public function myActivesDate($userid, $endDate)
    {
        return self::where('u_sponsor', $userid)
            ->where('active_status', 1)
            ->where('active_date', '<=', $endDate)
            ->pluck('id')
            ->toArray();
    }

    /**
     * Get active team members by sponsor ID and position.
     */
    public function myActivesLeftRight($userid, $position)
    {
        return self::where('u_sponsor', $userid)
            ->where('active_status', 1)
            ->where('position', $position)
            ->pluck('id')
            ->toArray();
    }

    /**
     * Get inactive team members by sponsor ID and position.
     */
    public function myInactivesLeftRight($userid, $position)
    {
        return self::where('u_sponsor', $userid)
            ->where('active_status', 0)
            ->where('position', $position)
            ->pluck('id')
            ->toArray();
    }

    /**
     * Get inactive team members by sponsor ID.
     */
    public function myInactives($userid)
    {
        return self::where('u_sponsor', $userid)->where('active_status', 0)->pluck('id')->toArray();
    }

    /**
     * Get active team members by sponsor ID and position.
     */
    public function myActivesPosition($userid, $position)
    {
        return self::where('u_sponsor', $userid)
            ->where('position', $position)
            ->where('active_status', 1)
            ->pluck('id')
            ->toArray();
    }

    /**
     * Get all active users.
     */
    public function actives()
    {
        return self::where('active_status', 1)->pluck('id')->toArray();
    }

    /**
     * Get active users by position.
     */
    public function activesLeftRight($position)
    {
        return self::where('active_status', 1)
            ->where('position', $position)
            ->pluck('id')
            ->toArray();
    }

    /**
     * Check pool status for a user.
     */
    public function poolStatus($userId, $poolType = 'pool1')
    {
        return \DB::table('pool')
            ->where('u_id', $userId)
            ->where('pool_type', $poolType)
            ->exists() ? 'Active' : 'Not Active';
    }

    /**
     * Get pool node for a user.
     */
    public function poolNode($userid, $poolId = 1)
    {
        return \DB::table('pool')
            ->where('id', $userid)
            ->where('pool_id', $poolId)
            ->value('u_id');
    }

    /**
     * Get pool details.
     */
    public function poolDetails($id, $poolId = 1)
    {
        return \DB::table('pool')
            ->where('id', $id)
            ->where('pool_id', $poolId)
            ->first();
    }


    public function uplineTeam($userId)
    {
        $rankIds = [];
        $arr = 10; // Number of iterations
        
        for ($i = 0; $i < $arr; $i++) {
            $uCode = $userId;
            $directs = $this->upDirects($uCode);
            if (!empty($directs)) {
                foreach ($directs as $direct) {
                    $userId = $direct;
                    $rankIds[] = $direct;
                }
            }
        }
        
        return $rankIds;
    }

    

    public function myPoolLevelTeam($poolId, $level = 15)
{
    $arrIn = [$poolId];
    $ret = [];
    $i = 1;

    while (!empty($arrIn)) {
        $allDown = DB::table('pool')->select('id')->whereIn('parent_id', $arrIn)->get();
        
        if ($allDown->isNotEmpty()) {
            $arrIn = $allDown->pluck('id')->toArray();
            $ret[$i] = $arrIn;
            $i++;
            if ($i > $level) {
                break;
            }
        } else {
            $arrIn = [];
        }
    }
    
    return $ret;
}
 


public function myBinaryMatrixTeam($userId)
{
    $arrIn = [$userId];
    $ret = [];
    $i = 1;

    while (!empty($arrIn)) {
        $allDowns = DB::table('binary_pool')->select('id')->whereIn('parent_id', $arrIn)->get();
        
        if ($allDowns->isNotEmpty()) {
            $arrIn = $allDowns->pluck('id')->toArray();
            $ret[$i] = $arrIn;
            $i++;
        } else {
            $arrIn = [];
        }
    }

    $final = [];
    if (!empty($ret)) {
        array_walk_recursive($ret, function ($item) use (&$final) {
            $final[] = $item;
        });
    }

    return $final;
}



public function benPairs($uCode, $ban = 'matching')
{
    $ret = 0;

    $getMtch = DB::table('binary_matching')
        ->selectRaw("SUM($ban) as amnt")
        ->where('u_code', $uCode)
        ->first();

    if ($getMtch && $getMtch->amnt !== null) {
        $ret = $getMtch->amnt;
    }

    return $ret;
}


public function inactives()
{
    $resp = DB::table('users')->where('active_status', 0)->pluck('id')->toArray();
    return $resp ?? [];
}



public function inactivesLeftRight($position)
{
    $resp = DB::table('users')
        ->where('active_status', 0)
        ->where('position', $position)
        ->pluck('id')
        ->toArray();

    return $resp ?? [];
}



public function myGeneration($userId)
{
    $arrIn = [$userId];
    $ret = [];
    $i = 1;

    while (!empty($arrIn)) {
        $allDown = DB::table('users')->select('id')->whereIn('u_sponsor', $arrIn)->get();

        if ($allDown->isNotEmpty()) {
            $arrIn = $allDown->pluck('id')->toArray();
            $ret[$i] = $arrIn;
            $i++;
        } else {
            $arrIn = [];
        }
    }

    $final = [];
    if (!empty($ret)) {
        array_walk_recursive($ret, function ($item) use (&$final) {
            $final[] = $item;
        });
    }

    return $final;
}



public function myGenerationWithPersonal($userId, $level = 50)
{
    $arrIn = [$userId];
    $ret = [$userId];
    $i = 1;

    while (!empty($arrIn)) {
        $allDown = DB::table('users')->select('id')->whereIn('u_sponsor', $arrIn)->get();

        if ($allDown->isNotEmpty()) {
            $arrIn = $allDown->pluck('id')->toArray();
            $ret[$i] = $arrIn;
            $i++;
            if ($i > $level) {
                break;
            }
        } else {
            $arrIn = [];
        }
    }

    $final = [];
    if (!empty($ret)) {
        array_walk_recursive($ret, function ($item) use (&$final) {
            $final[] = $item;
        });
    }

    return $final;
}


public function myPoolTeam($userId, $poolId = 1, $level = 15)
{
    $arrIn = [$userId];
    $ret = [];
    $i = 1;

    while (!empty($arrIn)) {
        $allDown = DB::table('pool')
            ->where('pool_id', $poolId)
            ->whereIn('parent_id', $arrIn)
            ->get();

        if ($allDown->isNotEmpty()) {
            $arrIn = $allDown->pluck('id')->toArray();
            $ret[$i] = $arrIn;
            $i++;
            if ($i > $level) {
                break;
            }
        } else {
            $arrIn = [];
        }
    }

    return $ret;
}


public function myLevelTeam($userId, $level = 15)
{
    $arrIn = [$userId];
    $ret = [];
    $i = 1;

    while (!empty($arrIn)) {
        $allDown = DB::table('users')->select('id')->whereIn('u_sponsor', $arrIn)->get();

        if ($allDown->isNotEmpty()) {
            $arrIn = $allDown->pluck('id')->toArray();
            $ret[$i] = $arrIn;
            $i++;
            if ($i > $level) {
                break;
            }
        } else {
            $arrIn = [];
        }
    }

    return $ret;
}


    /**
     * Get all team members recursively by levels for binary structure.
     */
    public function myBinary($userid)
    {
        $arrin = [$userid];
        $final = [];

        while (!empty($arrin)) {
            $users = self::whereIn('Parentid', $arrin)->pluck('id')->toArray();
            if (!empty($users)) {
                $arrin = $users;
                $final = array_merge($final, $users);
            } else {
                $arrin = [];
            }
        }

        return $final;
    }

    /**
     * Get all active binary team members.
     */
    public function myBinaryActive($userid)
    {
        $arrin = [$userid];
        $final = [];

        while (!empty($arrin)) {
            $users = self::whereIn('Parentid', $arrin)
                ->where('active_status', 1)
                ->pluck('id')
                ->toArray();
            if (!empty($users)) {
                $arrin = $users;
                $final = array_merge($final, $users);
            } else {
                $arrin = [];
            }
        }

        return $final;
    }

    /**
     * Get team by position.
     */
    public function teamByPosition($userid, $position)
    {
        $user = self::where('Parentid', $userid)->where('position', $position)->first();
        if ($user) {
            $ret = $this->myBinary($user->id);
            $ret[] = $user->id;
            return $ret;
        }

        return [];
    }
}
