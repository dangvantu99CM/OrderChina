<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use DB;
class Economy extends Model
{
   
    use Notifiable;
    protected $table = 'economy';
    protected $fillable = [
          'eco_id','eco_tien_nap','updated_at','created_at','eco_tien_coc','eco_tien_tat_toan',
          'eco_tien_khieu_nai','eco_tien_van_chuyen','eco_tien_hoan_tra','eco_cong_no','eco_status','or_id'
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
  	protected $primaryKey = 'eco_id';
  
    public function getAllRecords(){
      $data = DB::table($this->table)->get();
      return $data;
    }
	
	
	
	
}
