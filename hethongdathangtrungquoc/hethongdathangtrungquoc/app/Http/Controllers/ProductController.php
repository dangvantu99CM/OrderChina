<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use URL;

class ProductController extends Controller
{
	private $destinationPath =  '/uploads/License/';

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function getList()
	{
		$product = new Product;
		$dataProduct = $product->getAllProducts();
		$listProducts = array();
		$listProducts = $dataProduct;
		return view('admin.product.list', compact('listProducts'));
	}
	public function getAdd()
	{
		$urlPost=URL::route('admin.license.postAdd');
		$title="Thêm mới license";
		$license =new License;
		$license->li_key = $this->getCode(10);
		$license->li_desc=$license->li_key;
		$license->su_it_arr =array();
		$subjectTree=$this->getAllSubjectByLicense([],"web");
		return view('admin.license.edit', compact('title','urlPost','license','subjectTree'));
	}
	//add
	public function postAdd(Request $request)
	{
		$this->validate($request,[
			'li_key'=>"required",
			'li_limit'=>'required|numeric|min:1',
			"su_it_arr"    => "required|array|min:2",
		], [
		  'li_key.required' => 'Vui lòng tạo KEY',
		  'li_limit.required' => 'Vui lòng nhập số lượng máy có thể kích hoạt',
		  'li_limit.numeric' => 'Số lượng máy có thể kích hoạt phải là số',
		  'su_it_arr.required' => 'Vui lòng chọn các mô hình có thể nhận dạng',
		  'su_it_arr.min' => 'Số lượng mô hình có thể nhận dạng ít nhất 2'
		]);
		$data = $request->all();
		$license = new License();
		$su_it_arr=$data['su_it_arr'];
		if($su_it_arr==null){
			$su_it_arr=array();
		}
		for($i=0;$i<count($su_it_arr);$i++){
			 $su_it_arr[$i]=intval($su_it_arr[$i]);
		}
		$li_active=(isset($data['li_active']) &&$data['li_active']!=null)?1:0;
		$license->li_key = $data['li_key'];
		$license->li_desc = $data['li_desc'];
		$license->li_limit = intval($data['li_limit']);
		$license->su_it_arr = json_encode($su_it_arr);
		$license->li_nr_active = 0;
		$license->li_active = $li_active;
		$license->save();
		return redirect()->route('admin.license.getList')->with(['success' => 'Thêm thành công']);
	}
	
	//edit
	public function getEdit($li_id)
	{
		$license = License::find($li_id);
		if ($license == null) {
			return $this->getList()->with(['error' =>  'Không tồn tại License này']);
		}
		$title="Chỉnh sửa license: ".$license->li_desc;
		$urlPost=URL::route('admin.license.edit', $license->li_id);
		$license->su_it_arr = json_decode($license->su_it_arr);
		$subjectTree=$this->getAllSubjectByLicense([],"web");
		return view('admin.license.edit', compact('title','urlPost','license','subjectTree'));
	}
	public function postEdit($li_id, Request $request)
	{
		$this->validate($request,[
			'li_key'=>"required",
			'li_limit'=>'required|numeric|min:1',
			"su_it_arr"    => "required|array|min:2",
		], [
		  'li_key.required' => 'Vui lòng tạo KEY',
		  'li_limit.required' => 'Vui lòng nhập số lượng máy có thể kích hoạt',
		  'li_limit.numeric' => 'Số lượng máy có thể kích hoạt phải là số',
		  'su_it_arr.required' => 'Vui lòng chọn các mô hình có thể nhận dạng',
		  'su_it_arr.min' => 'Số lượng mô hình có thể nhận dạng ít nhất 2'
		]);
		$data = $request->all();
		$license = License::find($li_id);
		if($license==null){
			return redirect()->route('admin.license.getList')->with(['error' => 'Sửa không thành công']);
		}
		$su_it_arr=$data['su_it_arr'];
		if($su_it_arr==null){
			$su_it_arr=array();
		}
		for($i=0;$i<count($su_it_arr);$i++){
			 $su_it_arr[$i]=intval($su_it_arr[$i]);
		}
		$li_active=(isset($data['li_active']) &&$data['li_active']!=null)?1:0;
		$license->li_desc = $data['li_desc'];
		$license->li_limit = intval($data['li_limit']);
		$license->su_it_arr = json_encode($su_it_arr);
		$license->li_active = $li_active;
		$license->save();
		return redirect()->route('admin.license.getList')->with(['success' => 'Sửa thành công']);
	}
	//End auto gen Key

	//delete
	public function getDelete($li_id)
	{
		License::destroy($li_id);
		return redirect()->route('admin.license.getList')->with(['success' => 'Xóa thành công']);
	}

	public function getAjaxListLicenseActive($li_id)
	{
		$license_active = LicenseActive::where("li_id",$li_id)->get();
		if ($license_active == null) {
			$license_active=array();
		}
		return view('admin.license.list_license_active_ajax', compact('license_active'));
	}
	public function getAjaxToggleStatusLicenseActive($li_ac_id)
	{
		$license_active = LicenseActive::find($li_ac_id);
		if ($license_active != null) {
			$license_active->li_ac_active=($license_active->li_ac_active==1?0:1);
			$license_active->save();
		}
		
	}
	
}
