<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
   
	use Notifiable;
	protected $table = 'product';
	protected $fillable = [
        'pr_id',
		'pr_name',
		'pr_desc',
		'pr_price',
		'pr_origin',
		'pr_status',
		'pr_code',
		'pr_type',
		'pr_origin'
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
	protected $primaryKey = 'pr_id';
  
	public function getAllProducts(){
		$data = DB::table($this->table)->get();
		return $data;
	}
	
}
