<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DatabaseModel extends Model
{
    protected $table = 'your_table_name'; // Add the correct table name
    
    public function runQuery($select, $table, $where)
	{
		$query = DB::table($table)->select($select);

		
		foreach ($where as $column => $value) {
			$query->where($column, $value);
		}

		
		$res = $query->get();

	   
		if ($res->isEmpty()) {
			return false;
		}

		return $res; 
	}


    public function getInsertId($table, $insertData)
    {
        $insertId = DB::table($table)->insertGetId($insertData);
        return $insertId ?: false;
    }

    public function updateQuery($table, $set, $where)
    {
        $updated = DB::table($table)->where($where)->update($set);
        return $updated ? true : false;
    }

    // Website Info
	   public function websiteInfo($label)
	{
		if (Session::has('website_info')) {
		   
			$websiteInfo = Session::get('website_info');
			return $websiteInfo[$label] ?? false;
		}
		$res = $this->runQuery(['value', 'label'], 'website_info', ['status' => 1]);
		if ($res) {
		   
			$websiteInfo = $res->pluck('value', 'label')->toArray();
			Session::put('website_info', $websiteInfo);
			  
			return $websiteInfo[$label] ?? false;
		}

	  
		return false;
	}



    // Settings
    public function setting($label)
    {
        Session::forget('advance_setting');
        
        if (Session::has('advance_setting') && array_key_exists($label, Session::get('advance_setting'))) {
            return Session::get('advance_setting')[$label];
        } else {
           
            $res = DB::table('advanced_info')
            ->select('*')
            ->where('status', 1)
            ->get();
           
            if ($res) {
                $arr= $res->pluck('value', 'label')->toArray();
                Session::put('advance_setting', $arr);
                return $arr[$label] ?? false;
            }
            return false;
        }
    }

    

    // Plan Settings (Refactored)
    public function planSetting($param)
    {
        $regType = Session::get('reg_plan');
        $res = $this->runQuery($regType, 'website_settings', ['slug' => $param]);
        return $res ? $res[0]->$regType : false;
    }

 

    // Server Time (Laravel)
    public function serverTime()
    {
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = time();
        $dateTime = date("d-m-Y (D) H:i:s", $timestamp);
        return "<b>Server Time: $dateTime</b>";
    }

   

  
}
