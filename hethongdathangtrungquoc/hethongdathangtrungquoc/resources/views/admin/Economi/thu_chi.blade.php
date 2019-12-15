@extends('admin.master_admin')
@section('content')
<div class = "right-content " style = "padding: 0">
	
		<form method = "GET" action="" enctype="multipart/form-data">
			<div class = "box_order_search col-md-12" style = "float: left; width: 100%;padding:15px 0 !important;justify-content: center;justify-items: center;display: flex;height: 52px;border-bottom: 1px solid #ccc;
				margin-bottom: 15px;">
				<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
					<strong style = "line-height: 22px;margin:0 !important;width: 100%;">Thời gian</strong>
				</div>
				
				<div class = "col-md-2" style = "justify-content: center;justify-items: center;display: flex;padding-right:0 !important">
					<input type="date" name="begin_day" placeholder = "Từ" style = "width:100%"/>
				</div>
				&nbsp;-&nbsp	
				<div class = "col-md-2" style = "justify-content: center;justify-items: center;display: flex;padding-left: 0;">
					<input type="date" name="finish_day" value = "Đến" style = "width:100%"/>
				</div>
				
				<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
					<strong style = "line-height: 22px;margin:0 !important">Kiểu tài chính</strong>
				</div>
				
				<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
					<select name = "status_select">
						<option>Tất cả</option>
						<option>Tiền nạp</option>
						<option>Tiền cọc</option>
						<option>Tiền tất toán</option>
						<option>Tiền khiếu nại</option>
						<option>Tiền vận chuyển</option>
					</select>
				</div>
				
				<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
					<strong style = "line-height: 22px;margin:0 !important">Tình trạng nạp</strong>
				</div>
				<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
					<select name = "city_select">
						<option>Tất cả</option>
						<option>Chưa duyệt</option>
						<option>Đã duyệt</option>
					</select>
				</div>
				
				<div class = "col-md-2" style = "display: flex;justify-content: center;justify-items: center;">
					<input type = "submit" value = "Tìm kiếm" style = "
					
						display:inline-block;
						background-color: #2D7FCB;
						background-image: linear-gradient(#5698D5, #2D7FCB);
						border: 1px solid #2D7FCB;
						color: #FFFFFF;
						text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
						text-transform: uppercase;
						"
					/>
				</div>
				
			</div>
			
		</form>
		
		<div class="thongke_taichinh" style="border-bottom: 1px solid #ccc;margin-bottom: 15px;">
				
		</div>
		
		<div class = "data_table">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th >STT</th> 
						<th >Thời gian</th>
						<th >Mã ĐH/VC</th>
						<th >Tiền nạp</th>
						<th >Tiền cọc</th>
						<th >Tiền tất toán</th>
						<th >Tiền khiếu nại</th>
						<th >Tiền vận chuyển</th>	
						<th >Tiền hoàn trả</th>	
						<th >Công nợ</th>	
						<th >Trạng thái</th>							
					</tr>
				</thead>
				<tbody>
					
				</tbody>
				
			</table>
			
		</div>
	</div>
@endsection()