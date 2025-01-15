<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'mobile',
        'country',
        'state_id',
        'city_id',
        'image',
        'password',
        'u_sponsor',
        'created_at',
        'updated_at',
    ];  

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
	
	
	public static function getIdByUsername(string $username): ?int
    {
        $user = self::where('username', $username)->first();

        return $user ? $user->id : null;
    }
	
	 public static function usernameExists(string $username): bool
    {
        return self::where('username', $username)->exists();
    }


     

     // Relationships
     public function country()
     {
         return $this->belongsTo(Country::class, 'country_id');
     }
 
     public function state()
     {
         return $this->belongsTo(State::class, 'state_id');
     }
 
     public function city()
     {
         return $this->belongsTo(City::class, 'city_id');
     }
 
     // Custom Query
     public static function getUsersWithLocation()
     {
         return self::select(
                 'users.id',
                 'users.name',
                 'users.email',
                 'users.username',
                 'users.mobile',
                 'users.created_at',
                 'countries.name as country',
                 'states.name as state',
                 'cities.name as city'
             )
             ->leftJoin('countries', 'users.country', '=', 'countries.id')
             ->leftJoin('states', 'users.state_id', '=', 'states.id')
             ->leftJoin('cities', 'users.city_id', '=', 'cities.id')
             ->get();
     }



     public function getUserLevel($userId)
{
    $level = 0; 

    
    while ($userId) {
        $user = User::find($userId);

        if ($user && $user->u_sponsor) {
            $level++; 
            $userId = $user->u_sponsor; 
        } else {
            break; 
        }
    }

    return $level;
}
	
    public function getActiveID()
        {
            $mxId = DB::table('users')
                ->where('active_status', '=', 1)
                ->max('active_id');

            $activeId = ($mxId ? $mxId : 0) + 1;

            return $activeId;
        }
  
}
