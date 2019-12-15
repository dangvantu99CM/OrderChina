@extends('admin.master_admin')
@section('content')
<div class = "right-content" style = "padding: 0">
	
		<form method = "GET" action="" enctype="multipart/form-data">
			<div class = "box_order_search col-md-12" style = "float: left; width: 100%;padding:15px 0 !important;justify-content: center;justify-items: center;display: flex;height: 52px;">
			
				<div class = "col-md-2" style = "padding:0;">
					<h6 style = "margin: 0;line-height: 22px;">Mã đơn hàng</h6>
				</div>
				
				<div class = "col-md-7" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
					<input type = "text" placeholder = "Tìm kiếm" style = "width:100%" name = "textSearch"/>
				</div>
				
					
				<div class = "col-md-3" style = "display: flex;justify-content: center;justify-items: center;">
					<Button type = " " id="SubmitSearch"
						style = "   
							background-color: #2D7FCB;
							background-image: linear-gradient(#5698D5, #2D7FCB);
							border: 1px solid #2D7FCB;
							color: #FFFFFF;
							text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
							text-transform: uppercase;"
					>
					Tìm kiếm
					</Button>
				</div>
				
				<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
					<h6 style = "line-height: 22px;margin:0 !important;width: 100%;">Thời gian</h6>
				</div>
				
				<div class = "col-md-2" style = "justify-content: center;justify-items: center;display: flex;padding-right:0 !important">
					<input type="date" name="begin_day" placeholder = "Từ" style = "width:100%"/>
				</div>
				&nbsp;-&nbsp	
				<div class = "col-md-2" style = "justify-content: center;justify-items: center;display: flex;padding-left: 0;">
					<input type="date" name="finish_day" value = "Đến" style = "width:100%"/>
				</div>
				
			</div>
			
		</form>
		
		<div class = "data_table">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr> 
						<th >Thời gian</th>
						<th >Mã đơn hàng</th>
						<th >Tiền đơn hàng đã mua</th>
						<th >Tiền cọc</th>
						<th >Tiền tất toán</th>
						<th >Tiền khiếu nại</th>
						<th >Tiền hoàn trả</th>	
						<th >Còn nợ</th>							
					</tr>
				</thead>
				<tbody>
					
				</tbody>
				
			</table>
		</div>
	</div>
@endsection()