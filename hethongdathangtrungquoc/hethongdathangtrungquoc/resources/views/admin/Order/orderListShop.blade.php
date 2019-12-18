@extends('admin.master_admin')
@section('content')
	<style>
		.tab {
			overflow: hidden;
			border: 1px solid #ccc;
			background-color: #f1f1f1;
		}

		.tab button {
			background-color: inherit;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			transition: 0.3s;
			font-size: 17px;
		}

		.tab button:hover {
			background-color: #ddd;
		}

		.tab button.active {
			background-color: #ccc;
		}

		.tabcontent {
			display: none;
			padding: 6px 12px;
			border: 1px solid #ccc;
			border-top: none;
		}
	</style>
	<div class = "right-content" style = "padding: 0">
			<div class = "filter" style = "float: left">
				<div class = "box_order_search" class = "col-md-12" style = "float: left; width: 100%;padding:15px 0 !important;justify-content: center;justify-items: center;display: flex;height: 52px;">
					<div class = "col-md-1" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
						<h6 style = "line-height: 22px;margin:0 !important;width: 100%;">Thời gian</h6>
					</div>
					<div class = "col-md-3" style = "justify-content: center;justify-items: center;display: flex;">
						<input type="date" name="bday" placeholder = "Từ" style = "width:100%"/>
					</div>
					<div class = "col-md-3" style = "justify-content: center;justify-items: center;display: flex;">
						<input type="date" value = "Đến" style = "width:100%"/>
					</div>
					<div class = "col-md-1" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
						<h6 style = "line-height: 22px;margin:0 !important">Mã vận đơn</h6>
					</div>
					<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
						<input type = "text" style = "width:100%"/>
					</div>
					<div class = "col-md-1" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
						<h6 style = "line-height: 22px;margin:0 !important">Mã Shop</h6>
					</div>
					<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
						<input type = "text" style = "width:100%"/>
					</div>
				</div>
				
				<div class = "col-md-12 filter_2" style  ="float:left;width:100%;padding: 15px 0 !important;height: 60px;justify-items: center;display: flex; justify-content: center;">
					<div class = "col-md-1" style = "padding:0 !important">
						<h6 style = "line-height: 30px;margin:0 !important">Tên chủ shop</h6>
					</div>
					<div class = "col-md-3" style = "justify-content: center; justify-items: center;display: flex;">
						<input type = "text" style = "width:100%"/>
					</div>
					<div class = "col-md-3" style = "justify-content: center; justify-items: center;display: flex;">
						<input type = "checkbox" style = "position: absolute;top: 4px;left: 39px;"/>
						<h6 style = "margin:0 !important;justify-content: center;justify-items: center;display: flex;line-height: 30px;">Chưa có mã vận đơn</h6>
					</div>
					<div class = "col-md-3" style = "justify-content: center; justify-items: center;display: flex;">
						<input type = "checkbox" style = "position: absolute;top: 4px;left: 39px;"/>
						<h6 style = "margin:0 !important;    justify-content: center;justify-items: center;display: flex;line-height: 30px;">Có thông báo khẩn</h6>
					</div>
					<div class = "col-md-2" style = "justify-content: center; justify-items: center;display: flex;">
						<input type = "search" class = "btn btn-success" value  = "Tìm kiếm" style = "width:100%"/>
					</div>	
				</div>
				
			</div>	
		<div class="tab col-12" style=" margin-bottom: 12px;">
			<button style="padding: 6px !important;font-size: 15px;    margin-right: 30px;" class="tablinks" onclick="openTabFilter(event, 'tat_ca')">Tất cả <sup>(0)</sup></button>
			<button style="padding: 6px !important;font-size: 15px;    margin-right: 30px;" class="tablinks" onclick="openTabFilter(event, 'chua_xu_ly')">Chưa xử lý<sup>(0)</sup></button>
			<button style="padding: 6px !important;font-size: 15px;    margin-right: 30px;" class="tablinks" onclick="openTabFilter(event, 'qc_da_nhan')">QC đã nhận<sup>(0)</sup></button>
			<button style="padding: 6px !important;font-size: 15px;    margin-right: 30px;" class="tablinks" onclick="openTabFilter(event, 'da_kiem')">Đã kiểm<sup>(0)</sup></button>
			<button style="padding: 6px !important;font-size: 15px;    margin-right: 30px;" class="tablinks" onclick="openTabFilter(event, 'da_giao')">Đã giao<sup>(0)</sup></button>
			<button style="padding: 6px !important;font-size: 15px;    margin-right: 30px;" class="tablinks" onclick="openTabFilter(event, 'da_nhan')">Đã nhận<sup>(0)</sup></button>
			<button style="padding: 6px !important;font-size: 15px;    margin-right: 30px;"class="tablinks" onclick="openTabFilter(event, 'het_hang')">Hết hàng<sup>(0)</sup></button>
			<button style="padding: 6px !important;font-size: 15px;" class="tablinks" onclick="openTabFilter(event, 'dang_khieu_nai')">Đang khiếu nại<sup>(0)</sup></button>
		</div>
		<div class = "content">
			<div id="tat_ca" class="tabcontent">
			  <h3>London</h3>
			  <p>London is the capital city of England.</p>
			</div>

			<div id="chua_xu_ly" class="tabcontent">
			  <h3>Paris</h3>
			  <p>Paris is the capital of France.</p> 
			</div>

			<div id="qc_da_nhan" class="tabcontent">
			  <h3>Tokyo</h3>
			  <p>Tokyo is the capital of Japan.</p>
			</div>
			
			<div id="het_hang" class="tabcontent">
			  <h3>Tokyo</h3>
			  <p>Tokyo is the capital of Japan.</p>
			</div>
			
			<div id="da_kiem" class="tabcontent">
			  <h3>Tokyo</h3>
			  <p>Tokyo is the capital of Japan.</p>
			</div>
			
			<div id="da_giao" class="tabcontent">
			  <h3>Tokyo</h3>
			  <p>Tokyo is the capital of Japan.</p>
			</div>
			
			<div id="dang_khieu_nai" class="tabcontent">
			  <h3>Tokyo</h3>
			  <p>Tokyo is the capital of Japan.</p>
			</div>
			
		</div>
		<div class = "data_table">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th >Mã đơn hàng</th>
						<th >Số lượng</th>
						<th >Mã shop</th>
						<th >Tổng tiền</th>
						<th >Trạng thái</th>
						<th >Mã đơn vận</th>	
						<th >Tên chủ shop</th>								
					</tr>
				</thead>
				<tbody>
					
				</tbody>
				
			</table>
		</div>
	</div>
	
	<script>
		function openTabFilter(evt, id_tag) {
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablinks");
		  for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }
		  document.getElementById(id_tag).style.display = "block";
		  evt.currentTarget.className += " active";
		}
	</script>
@endsection(