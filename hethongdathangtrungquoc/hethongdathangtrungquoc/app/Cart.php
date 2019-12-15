<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cart extends Model
{
   
	use Notifiable;
	protected $table = 'cart';
	protected $fillable = [
        'ca_id','us_id','ca_arr_pr_id','updated_at','created_at','ca_sum_price'
    ];
	
    /**
     * The attributes that should be cast to native types.
     *
     * @var array	
     */
    protected $casts = [
		'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
	protected $primaryKey = 'ca_id';
  
	public function getAllProductsByCart(){
		$data = DB::table($this->table)->get();
		return $data;
	}
	
	
}
