<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Economy;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EconomyController extends Controller
{
  
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  // protected $listData;
	public function getList()
	{	
		return view("admin.Economi.list");
	}

	public function thu_chi(){
		return view('admin.Economi.thu_chi');
	}

	public function don_hang(){	
		return view('admin.Economi.don_hang');
	}
	public function nap_tien(){
		return view('admin.Economi.nap_tien');
	}
  
	public function getData(){
		$economy = new Economy;
		$order = new Order;
		$dataEconomy = $economy->getAllRecords();
		$convertDataToArray = array();
		$convertDataToArray = $dataEconomy;
		$listData = array();
		for($i = 0; $i < count($dataEconomy); $i++){
			$getOrder = $order->findOrderById($convertDataToArray[$i]->or_id);
			$convertDataToArray[$i]->order = $getOrder;
		}
		$listData = $convertDataToArray;
		return $listData;
	}
  
	public function getOrder($or_id){
		
	}

  public function postAdd(Request $request)
  {
    //	$this->authorize('admin');
    $data = $request->all();
    $this->validate($request, [
      'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'name' => 'required|min:3|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8|max:32',
      'passwordAgain' => 'same:password'
    ], [
      'avatar.image' => 'Chọn avartar người dùng với định dạng ảnh',
      'avatar.mimes' => 'ảnh đại diện người dùng phải có 1 trong các định dạng jpeg,png,jpg,gif,svg',
      'avatar.max' => 'Dung lượng tối đa của ảnh là 2048 kb',
      'name.required' => 'Bạn chưa nhập tên người dùng',
      'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
      'name.max' => 'Tên người dùng chỉ được tối đa 255 ký tự',
      'email.required' => 'Bạn chưa nhập Email',
      'email.email' => 'Bạn chưa nhập đúng định dạng Email',
      'email.unique' => 'Email đã tồn tại',
      'password.required' => 'Bạn chưa nhập mật khẩu',
      'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
      'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
      'passwordAgain.same' => 'Mật khẩu nhập lại không đúng'
    ]);
  
    $user = new User;
    if ($request->hasFile('avatar')) {
      $file = Input::file('avatar');
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $timestamp = str_replace([' ', ':', '-'], '', Carbon::now()->toDateTimeString());
      $name = $timestamp . '.' . $extension;
      $file->move(public_path($this->destinationPath), $name);
      $user->user_avartar = $this->destinationPath . $name;
    } else {
      $user->user_avartar = '';
    }
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = bcrypt($data['password']);

    $user->save();
    return redirect()->route('admin.user.getList')->with(['success' => 'Thêm thành công']);
  }
  public function getDelete($id)
  {
    User::destroy($id);
    return redirect()->route('admin.user.getList')->with(['success' => 'Xóa thành công']);
  }
  public function getEdit($id)
  {
    $user = DB::table('users')->where('users.id', $id)->select('users.*')->limit(1)->get();
    if (count($user) == 0) {
      return $this->getList();
    }
    $user = $user[0];
    return view('admin.user.edit', compact('user'));
  }
  public function postEdit($id, Request $request)
  {

    $data = $request->all();

    $this->validate($request, [
      'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'name' => 'required|min:3|max:255',
    ], [
      'name.required' => 'Bạn chưa nhập tên người dùng',
      'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
      'name.max' => 'Tên người dùng chỉ được tối đa 255 ký tự',
      'avatar.image' => 'Chọn avartar người dùng với định dạng ảnh',
      'avatar.mimes' => 'ảnh đại diện người dùng phải có 1 trong các định dạng jpeg,png,jpg,gif,svg',
      'avatar.max' => 'Dung lượng tối đa của ảnh là 2048 kb',
    ]);
    $user = user::find($id);
    $user->name = $data['name'];
	$user->user_phone_number = $data['phoneNumber'];
	$user->user_xaPhuong = $data['user_xaPhuong'];
	$user->user_city = $data['user_city'];
	$user->user_quan = $data['user_quan'];
	$user->user_code = $data['user_code'];

    if ($request->changePass == "on") {
      $this->validate($request, [

        'password' => 'required|min:8|max:32',
        'passwordAgain' => 'required|same:password'
      ], [

        'password.required' => 'Bạn chưa nhập mật khẩu',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        'password.max' => 'Mật khẩu chỉ được tối đa 32 ký tự',
        'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
        'passwordAgain.same' => 'Mật khẩu nhập lại không đúng',

      ]);
      $user->password = bcrypt($data['password']);
    }
    if ($request->changeEmail == "on") {
      $this->validate($request, [

        'email' => 'required|email|unique:users,email',

      ], [
        'email.required' => 'Bạn chưa nhập Email',
        'email.email' => 'Bạn chưa nhập đúng định dạng Email',
        'email.unique' => 'Email đã tồn tại',
      ]);
      $user->email = $data['email'];
    }

    $user_avartar = '/uploads/Users' . $user->user_avartar;
    if ($request->hasFile('avatar')) {
      $file = Input::file('avatar');
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $timestamp = str_replace([' ', ':', '-'], '', Carbon::now()->toDateTimeString());
      $name = $timestamp . '.' . $extension;
      $file->move(public_path($this->destinationPath), $name);
      $user->user_avartar = $this->destinationPath . $name;
    }
    $user->save();
    return redirect()->route('admin.user.getList')->with(['success'=>'Sửa thành công']);
  }
  
	public function search(){
			
		echo "aaaaaaaaaaaaa";
		// $or_id = $_GET['textSearch'];
		// echo $or_id;
		// $order = Order::find($or_id);
		// echo $order;
		// if($order != null){
			// return;
		// }else{
			// return view('admin.order.list', compact('order'));
		// }
		// echo "aaaaaaaaa";
		// $or_id = Input::get('textSearch', '');
		// echo "$or_id";
	}

}
