<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{

    use Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'id', 'name', 'email', 'email_verified_at', ' password ',
		'remember_token', 'created_at', 'updated_at', 'us_avatar',
		'us_type','us_phone_number','us_city','us_quan','us_gender',
		'us_code','us_xaPhuong','us_address'
		
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $primaryKey = 'id';

    public function GetAllUsers()
    {
        $data = DB::table($this->table)->get();
        return $data;
    }
}
