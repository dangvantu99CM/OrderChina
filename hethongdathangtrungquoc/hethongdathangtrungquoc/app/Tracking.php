<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use DB;
class Tracking extends Model
{
   
	use Notifiable;
	protected $table = 'tracking';
	protected $fillable = [
        'tr_id','tr_desc','tr_number','tr_weight','tr_product_type','tr_address'
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
	protected $primaryKey = 'tr_id';
  
	public function getAllTracking(){
		$data = DB::table($this->table)->get();
		return $data;
	}
	
	
}
