@extends('admin.master_admin')
@section('content')


	<div class="col-lg-12">
		<h3 class="page-header">Danh sách đơn hàng
		</h3>
		
	</div>
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
			<tr>
				<th >STT</th> 
				<th >Nhóm hàng hóa</th>
				<th >Ngày tạo</th>
				<th >Ngày cập nhật</th>
				<th >Ghi chú</th>
				<th >Thành tiền</th>
				<th >Chức năng</th>														
			</tr>
		</thead>
		<tbody>
			<?php $stt=0;?>
			@foreach($order as $listOrders)
			<?php $stt++;?>
			 
			<tr>
				<td>{!! $stt !!}</td>
				<td>{!! Xem chi tiết !!}</td>
				<td>{!! $order->created_at !!}</td>
				<td>{!! $order->updated_at !!}</td>
				<td>{!! $order->or_note !!}</td>
				<td>{!! $order->or_sum_price!!}</td>
				<td>
					<a id="viewDetailOrder" href="{!! URL::route('admin.order.view', $order->or_id) !!}" title="Xem chi tiết đơn hàng" style="text-decoration: none !important;color:#f91b1b">
						<span class="glyphicon glyphicon-eye-open"></span>
					</a>
					<a id="deleteOrder" href="{!! URL::route('admin.order.delete', $order->or_id) !!}" title="Xóa đơn hàng" style="text-decoration: none !important;color:#f91b1b" onclick="return alert_function('Bạn có chắc chắn muốn xóa!')">
						<i class="fas fa-trash-alt"></i>
					</a>
				</td>
				
				<script>
				
					function alert_function(msg){
						if(confirm(msg)){
							return true;
						}
						return false;
					};	
					
					
				</script>

			</tr>
			
			@endforeach
		</tbody>
		
	</table>
		
@endsection()
