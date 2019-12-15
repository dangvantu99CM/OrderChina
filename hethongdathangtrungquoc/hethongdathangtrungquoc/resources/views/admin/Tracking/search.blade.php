@extends('admin.master_admin')
@section('content')
	
	<div style = "padding: 0">
	
		<form method = "GET" action="{!! URL::route('admin.order.search') !!}" id="form-search">
			
			<div class = "box_order_search" class = "col-12" style = "float: left; width: 100%;padding:15px 0 !important;display: flex;justify-content: center; justify-items: center;">
			
				<div class = "col-md-2" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
					<h6 style = "margin: 0;line-height: 22px;width: 100%;font-weight: bold;font-size: 16px;">Tracking number</h6>
				</div>
				
				<div class = "col-md-10" style = "display: flex;justify-content: center;justify-items: center;">
					<div class = "col-md-9" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
						<input type = "text" placeholder = "Tracking number" style = "width:100%" name = "textSearch" id="search"/>
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
				</div>	
			</div>
		</form>
	
		<div class = "data_table">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>STT</th> 
						<th>Hàng hóa</th>
						<th>Tracking number</th>
						<th>Cân nặng</th>
						<th>Tổng tiền</th>													
					</tr>
				</thead>
				<tbody>
					
				</tbody>
				
			</table>
		</div>
	</div>
	<script>
		
	</script>
	
@endsection()

