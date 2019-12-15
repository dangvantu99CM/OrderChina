<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use DB;
class Order extends Model
{
   
	use Notifiable;
	protected $table = 'orders';
	protected $fillable = [
        'or_id','or_code','or_arr_id_products','updated_at','created_at','or_id_user','or_note','or_status','or_sum_price','or_store'
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
	protected $primaryKey = 'or_id';
  
	public function getAllOrders(){
		$data = DB::table($this->table)->get();
		return $data;
	}
	
	public function findOrderById($or_id){
		$data = DB::table($this->table)->where("or_id",$or_id)->get();
		return $data;
	}
	
	public function findOrderByOrderCode($or_code){
		$data = DB::table($this->table)->where("or_code",$or_code)->get();
		return $data;
	}
	
	
	
	
}
