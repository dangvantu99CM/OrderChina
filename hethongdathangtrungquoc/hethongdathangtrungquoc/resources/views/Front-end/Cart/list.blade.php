<div class = "data_table">
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
			<tr>
				<th >STT</th> 
				<th >Sản phẩm</th>
				<th >Số lượng sản phẩm</th>
				<th >Đơn giá</th>
				<th >Tổng tiền</th>
				<th >Trạng thái</th>
				<th >Chức năng</th>														
			</tr>
		</thead>
		<tbody>
			<?php 
				$stt=0;
				$listProduct = array();
				
			?>
			
			@foreach($listProduct as $product)
			<?php $stt++;?>
				
			<tr>
				<td>{!! $stt !!}</td>
				<td>{!! $record->or_arr_products !!}</td>
				<td>{!! $record->created_at !!}</td>
				<td>{!! $record->updated_at !!}</td>
				<td>{!! $record->or_note !!}</td>
				<td>{!! $record->or_sum_price!!}</td>
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
</div>