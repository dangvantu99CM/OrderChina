<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Customer;
use App\news;
use App\Product;
use App\Service;
use App\Personnel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon; 
use Hash;

class ProfileController extends Controller
{
	
    public function getProfile($id){
		$user = DB::table('users')->where('users.id',$id)->select('users.*')->limit(1)->get();
		if(count($user)==0){
			return;
		}
		$user=$user[0];
		return view('Customer.profile',compact('user'));
	}
	// thay doi mat khau
	public function getChangePassword($id){
		$user = DB::table('users')->where('users.id',$id)->select('users.*')->limit(1)->get();
		if(count($user)==0){
			return;
		}
		$user=$user[0];
		return view('Customer.chagePassword',compact('user'));
	}
	// luu submit doi mat khau
	public function postChangePassword(Request $request, $id){
		$data = $request->all();
		$user = new user;
		$user = user::find($id);
		$this->validate($request,[
			'old_password'   => 'required',
		],[
			'old_password.required' => 'Hãy nhập lại mật khẩu cũ!',
		]);
		if(!Hash::check($data['old_password'], $user->password)){
			return back()->with(['error'=>'Mật khẩu cũ là không đúng!']);
		}else{
			$this->validate($request,[
				'password' => 'required|min:8|max:32',
				'passwordAgain' => 'required|same:password'
			],[
				'password.required' => 'Hãy nhập mật khẩu mới!',
				'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự!',
				'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự!',
				'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu!',
				'passwordAgain.same' => 'Mật khẩu nhập lại không đúng!',	
			]);
			$user->password = bcrypt($data['password']);	
			$user->save();
			return redirect()->route('getProfile',$user->id)->with(['success'=>'Sửa thành công']);	
		}
	}

	//thay doi thong tin ca nhan
	function postProfile(Request $request, $id){
		$data = $request->all();
		$birth_year = Carbon::create($data['select_year'],$data['select_month'],$data['select_day']);
		$user = new user;
		$user = user::find($id);
		$this->validate($request,[
			'name' => 'required|min:3|max:255',
			'name' => 'required|min:3|max:255',
			'address' => 'required',
			'phone_number' => 'required|min:10|max:11',
		],[
			'name.required' => 'Bạn chưa nhập tên người dùng!',
			'address.required' => 'Nhập thông tin địa chỉ là bắt buộc!',
			'phone_number.max' => 'Số điện thoại tối đa 11 số!',
			'phone_number.min' => 'Số điện thoại có ít nhất 10 số!',
		]);
		$user->name = $data['name'];
		$user->us_address = $data['address'];
		$user->us_phone_number = $data['phone_number'];;
		$user->us_gender = $data['us_gender'];;
		$user->us_birthDay = $birth_year;	
		$user->save();
		return redirect()->route('getProfile',$user->id)->with(['success'=>'Sửa thành công']);
	}
	
}