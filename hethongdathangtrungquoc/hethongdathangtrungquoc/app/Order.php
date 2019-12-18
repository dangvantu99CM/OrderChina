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
	
	public function filterByOrderStatus($or_status){
		$data = DB::table($this->table)->where("or_status",$or_status)->get();
		return $data;
	}
	
	public function findOrderBySearch($or_code,$fromDate,$toDate,$selectedCity,$selectedStatus){
		
		$query = DB::table($this->table);	
		if($or_code !== ""){
			$query->where('or_code','LIKE','%'.$or_code.'%');
		}
		if($selectedStatus != 0){
			$query->where('or_status',$selectedStatus);
		}
		if($selectedCity != 0){
			$query->where('or_store',$selectedCity);
		}
		if($fromDate != ""){
			$query->where('created_at','>=',$fromDate);
		}
		if($toDate != ""){
			$query->where('created_at','<=',$toDate);
		}
		$data=$query->get();	
		// echo "<pre>";
			// print_r($data);
		// echo "</pre>";
		
		return $data;
	}
	
}
