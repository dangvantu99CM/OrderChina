@extends('admin.master_admin')
@section('content')
	<style>
		.label_add{
			display:inline-block
		}
		.data_input{
			display:inline-block
		}
	</style>
	<div class = "col-lg-12">
		<h3 class="header-page">Thêm Tracking	</h3>
	</div>
	<div class="col-lg-12" style="padding-bottom: 120px">
		<form id = "form_add" action="{!! URL::route('admin.order.tracking_order_list') !!}" method="POST" enctype="multipart/form-data" >
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type = "hidden" name = "id" autofocus="autofocus" required="required">
			<div class="form-group">		
				<label>Loại hàng hóa</label>
				<select class="form-control" name = "mode" required="required">
					<option value="0" selected>--- Loại hàng hóa ---</option>
					<option value="1">0</option>
					<option value="2">1</option>
					<option value="3">2</option>		
				</select>		
			</div>				
			<div class="form-group">		
				<label class = "label_add">Tracking Number</label>
				<input  placeholder = "Tracking Number" class = "form-control data_input" type = "text" name = "tracking_number" autofocus="autofocus" required="required">
			</div>	
			
			<div class="form-group">
				<label class = "label_add">Giá trị kiện hàng(NDT)</label>
				<input  placeholder = "Giá trị kiện hàng(NDT)" class = "form-control data_input" type = "text" name = "gia_tri_kien_hang" autofocus="autofocus" required="required">
			</div>
			
			<div class="form-group">
				<label class = "label_add">Cân nặng</label>
				<input  placeholder = "Cân nặng" class = "form-control data_input" type = "text" name = "can_nang" autofocus="autofocus" required="required">
			</div>
			
			<button type = "submit" class="btn btn-default btn_action" onclick="save_function()" style="background-color:#b4f1ee">Save</button>
			
			
		</form>
	</div>

@endsection()
