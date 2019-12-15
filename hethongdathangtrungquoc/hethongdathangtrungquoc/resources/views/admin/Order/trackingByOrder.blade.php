@extends('admin.master_admin')
@section('content')
	
	<div class = "right-content" style = "padding: 0">
		<div class = "box_order_search" class = "col-12" style = "float: left; width: 100%;padding:15px 0 !important;display: flex;justify-content: center; justify-items: center;">
			<div class = "col-md-1" style = "padding:0;display: flex;justify-items: center;">
				<h6>Mã đơn hàng</h6>
			</div>
			<div class = "col-md-8" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
				<input type = "text" placeholder = "Tìm kiếm" style = "width:100%"/>
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
				<a style = "display: block;justify-content: center;justify-items: center;padding: 0 6px;line-height: 33px;cursor:pointer" id = "mo_rong" onclick="mo_rong('search_nc','mo_rong','thu_gon')" >Mở rộng</a>
				<a style = "display: none;justify-content: center;justify-items: center;padding: 0 6px;line-height: 33px;cursor:pointer" id = "thu_gon" onclick="thu_gon('search_nc','mo_rong','thu_gon')" >Thu gọn</a>
			</div>	
		</div>
		<div class="col-12" id="search_nc" style="display:none">
			@include('admin.Order.searchNangCao')
		</div>
		<div class = "data_table">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th >STT</th> 
						<th >Ngày tạo</th>
						<th >Mã đơn hàng</th>
						<th >Tracking</th>
						<th >Số kg</th>
						<th >Ngày về VN</th>
						<th >Trạng thái</th>														
					</tr>
				</thead>
				<tbody>
					
				</tbody>
				
			</table>
		</div>
	</div>
	<script>
		function mo_rong(id,mo_rong,thu_gon){
			let getElement = document.getElementById(id);
			let getElMoRong = document.getElementById(mo_rong);
			let getElThuGon = document.getElementById(thu_gon);
			console.log(getElement,getElMoRong,getElThuGon);
			getElement.style.display="block";
			getElMoRong.style.display="none";
			getElThuGon.style.display="block";
		}
		function thu_gon(id,mo_rong,thu_gon){
			let getElement = document.getElementById(id);
			let getElMoRong = document.getElementById(mo_rong);
			let getElThuGon = document.getElementById(thu_gon);
			console.log(getElement,getElMoRong,getElThuGon);
			getElement.style.display="none";
			getElMoRong.style.display="block";
			getElThuGon.style.display="none";
		}
	</script>
@endsection()