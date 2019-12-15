<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\news;
use App\Product;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon; 


class RegisterController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	private $destinationPath =  '/uploads/Users/';
	public function getDangki(){
		return view('Front-end.register.register');
	}
	public function postDangki(Request $request){
	
		
		$data = $request->all();
		$passAgain = $data['passwordAgain'];
		$this->validate($request,[
			'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'name' => 'required|min:3|max:255',	
			'password' => 'required|min:8|max:32',
			'passwordAgain' => 'same:password',
			'email' => 'required|email|unique:users,email',
		],[
			'avatar.image' => 'Chọn avartar người dùng với định dạng ảnh',
			'avatar.mimes' => 'ảnh đại diện người dùng phải có 1 trong các định dạng jpeg,png,jpg,gif,svg',
			'avatar.max' => 'Dung lượng tối đa của ảnh là 2048 kb',
			'name.required' => 'Bạn chưa nhập tên người dùng',
			'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
			'name.max' => 'Tên người dùng chỉ được tối đa 255 ký tự',
			'password.required' => 'Bạn chưa nhập mật khẩu',
			'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
			'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
			'passwordAgain.same' => 'Mật khẩu nhập lại không đúng',
			'email.required' => 'Bạn chưa nhập Email',
			'email.email' => 'Bạn chưa nhập đúng định dạng Email', 
			'email.unique' => 'Email đã tồn tại',
		]);
		if($passAgain !== ""){
			$this->validate($request,[
			
				'passwordAgain' => 'required',
			
			],[
				'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu'
			]);
			
		}
		$user = new User;
		if($request->hasFile('avatar')){
			$file = Input::file('avatar');
			$filename =$file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$timestamp = str_replace([' ', ':','-'], '', Carbon::now()->toDateTimeString());
			$name =$timestamp .'.'.$extension;
			$file->move(public_path($this->destinationPath), $name);
			$user->user_avartar=$this->destinationPath.$name;
		}
		else{
			$user->user_avartar = '/uploads/customers/20190627085743.png';
		}
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = bcrypt($data['password']);
		$user->user_type = 0;  
		$user->save();
		
		return redirect()->route('login')->with('thongbao','Ban da dang ki thanh cong');
	}
	
}
