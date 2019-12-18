<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use URL;

class OrderController extends Controller
{
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function getList()
	{
		$order = new Order;
		$dataOrder = $order->getAllOrders();
		$listOrders = array();
		$listOrders = $dataOrder;
		return view('admin.Order.list', compact('listOrders'));
	}

	//delete
	public function getDelete($or_id)
	{
		Order::destroy($or_id);
		return redirect()->route('admin.order.list')->with(['success' => 'Xóa thành công']);
	}
	
	
	public function getSearch(Request $request){
		
		$order = new Order();
		$output = '';
		$or_code = $_GET["textSearch"];	
		$fromDate = $_GET["begin_day"];	
		$toDate = $_GET["finish_day"];	
		$or_store = $_GET["city_select"];	
		$or_status = $_GET["status_select"];
		$result = $order->findOrderBySearch($or_code,$fromDate,$toDate,$or_store,$or_status);
		if(sizeof($result) !== 0){
			$countProduct = count(json_decode($result[0]->or_arr_id_products));
			foreach ($result as $key => $order) {
				$output .= '<tr>
					<td>' . $order->or_code . '</td>
					<td>' . $countProduct . '</td>
					<td>' . $order->or_note . '</td>
					<td>' . $order->or_sum_price . '</td>
					<td>' . $order->or_status . '</td>
					<td>' . $order->created_at . '</td>
				</tr>';
			}
			echo "output =====".$output;
			return Response($output);
		}
		return "";
	}
	
	public function filterByOrderStatus(Request $request){
		$order = new Order();
		$result = $order->findOrderByOrderStatus($request->id);
		echo $result;
		return Response($result);
	}
		
	public function getOrderShop(){
		return view('admin.Order.orderListShop');
	}
	
	public function trackingOrderList(){
		return view('admin.Order.trackingByOrder');
	}
	
	public function card(){
		return view('admin.Order.card');
	}
	
	public function getOrder($or_code){
		
	}
	
}
