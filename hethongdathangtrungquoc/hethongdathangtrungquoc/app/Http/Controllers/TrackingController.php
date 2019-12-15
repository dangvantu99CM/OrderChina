<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TrackingController extends Controller
{
 
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function getList()
  {
    $tracking = new Tracking;
    $getAllRecords = $tracking->getAllTracking();
    $listRecords = array();
    $listRecords = $getAllRecords;
    return view('admin.Tracking.list', compact('listRecords'));
  }
  
   // add
  public function getAdd()
  {
     return view('admin.Tracking.add');
  }

  // add
  public function postAdd(Request $request)
  {
    $data = $request->all();
    $tracking = new Tracking();
    $tracking->tr_number = $data['tr_number'];
    $tracking->tr_weight = $data['tr_weight'];
    $tracking->tr_product_type = $data['tr_product_type'];
    $tracking->save();
    return redirect()->route('admin.tracking.add')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thành công']);
  }

  public function getDelete($id)
  {
    Tracking::destroy($id);
    return redirect()->route('admin.Tracking.list')->with(['success' => 'Xóa thành công']);
  }
  public function getEdit($id)
  {
    $tracking = DB::table('tracking')->where('tracking.id', $id)->select('tracking.*')->limit(1)->get();
    if (count($tracking) == 0) {
      return $this->getList();
    }
    $tracking = $tracking[0];
    return view('admin.tracking.add', compact('tracking'));
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
    ]);
    $tracking = tracking::find($id);
    $tracking->tr_number = $data['tr_number'];
	$tracking->tr_weight = $data['tr_weight'];
	$tracking->tr_product_type = $data['tr_product_type'];
	$tracking->tr_address = $data['tr_address'];
    $tracking->save();
    return redirect()->route('admin.tracking.list')->with(['success'=>'Sửa thành công']);
  }
  
	public function search(){
		return view('admin.Tracking.search');
	}
	
	public function get_search(){
		return "ccccccccc";
	}
	

}
