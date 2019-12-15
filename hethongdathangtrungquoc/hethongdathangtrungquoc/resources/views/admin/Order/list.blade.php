@extends('admin.master_admin')
@section('content')
	<div style = "padding: 0">
	
		<form method = "GET" action="{!! URL::route('admin.order.search') !!}" id="form-search">
			
			<div class = "box_order_search" class = "col-12" style = "float: left; width: 100%;padding:15px 0 !important;display: flex;justify-content: center; justify-items: center;">
			
				<div class = "col-md-1" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
					<h6 style = "margin: 0;line-height: 22px;width: 100%;">Mã đơn hàng</h6>
				</div>
				
				<div class = "col-md-9" style = "display: flex;justify-content: center;justify-items: center;">
					<div class = "col-md-9" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
						<input type = "text" placeholder = "Tìm kiếm" style = "width:100%" name = "textSearch" id="textSearch"/>
					</div>
					
					<div class = "col-md-3" style = "display: flex;justify-content: center;justify-items: center;">
						<Button type = "submit" id="SubmitSearch"
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
				
				<div class = "col-md-2" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
					<button type="button" name="reset" id="reset" class="btn btn-default" style="border-color: #ccc !important;border:1px solid #ccc !important">Reset</button>
				</div>
				
			</div>
			<div class="col-12" id="search_nc">
				@include('admin.Order.searchNangCao')
			</div>
		</form>
		
		<div class = "order-statistic" style = "float:left;width:100%;padding: 15px 0;">
			<div class = "StatisticTab col-12" style = "padding-top: 0;padding-bottom: 12px;">
		
				<div class="tab" style = "float:left;border-right: 1px solid #ccc;">
				  <button style = "height: 36px;width: 100%;background: #fff;text-align: left;padding:0px !important" class="tablinks" >Tất cả <sup>(0)&nbsp;</sup></button>
				</div>
				
				<div class="tab" style = "float:left;border-right: 1px solid #ccc;">
				  <button style = "height: 36px;width: 100%;background: #fff; text-align: left;padding:0px !important" class="tablinks" >&nbsp;Chưa thanh toán <sup>(0)&nbsp;</sup></button>
				</div>
				
				<div class="tab" style = "float:left;border-right: 1px solid #ccc;">
				  <button style = "height: 36px;width: 100%;background: #fff; text-align: left;padding:0px !important" class="tablinks" >&nbsp;Đã thanh toán chờ mua <sup>(0)&nbsp;</sup> </button>
				</div>
				
				<div class="tab" style = "float:left;border-right: 1px solid #ccc;">
				  <button style = "height: 36px;width: 100%;background: #fff; text-align: left;padding:0px !important" class="tablinks" >&nbsp;Đã mua <sup>(0)&nbsp;</sup></button>
				</div>
				
				<div class="tab" style = "float:left;border-right: 1px solid #ccc;">
				  <button style = "height: 36px;width: 100%;background: #fff; text-align: left;padding:0px !important" class="tablinks" >&nbsp;Đã tất toán <sup>(0)&nbsp;</sup></button>
				</div>
				
				<div class="tab" style = "float:left;border-right: 1px solid #ccc;">
				  <button style = "height: 36px;width: 100%;background: #fff; text-align: left;padding:0px !important" class="tablinks" >&nbsp;Đã giao hàng <sup>(0)&nbsp;</sup></button>
				</div>
				
				<div class="tab" style = "float:left;border-right: 1px solid #ccc;">
				  <button style = "height: 36px;width: 100%;background: #fff; text-align: left;padding:0px !important" class="tablinks" >&nbsp;Đã nhận hàng <sup>(0)&nbsp;</sup></button>
				</div>
				
				<div class="tab" style = "float:left;border-right: 1px solid #ccc;">
				  <button style = "height: 36px;width: 100%;background: #fff; text-align: left;padding:0px !important" class="tablinks" >&nbsp;Hết hàng <sup>(0)&nbsp;</sup></button>
				</div>
				
				<div class="tab" style = "float:left;">
				  <button style = "height: 36px;width: 100%;background: #fff; text-align: left;padding:0px !important" class="tablinks" >Thông báo khẩn <sup>(0)</sup></button>
				</div>

				
			</div>
			
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="order_dataTable">
				<thead>
					<tr>
						<th>Mã đơn hàng</th>
						<th>Số lượng sản phẩm</th>
						<th>Trạng thái</th>
						<th>Kho</th>
						<th>Ghi chú</th>
						<th>Tổng tiền</th>
						<th>Ngày tạo</th>						
						<th>Chức năng</th>														
					</tr>
				</thead>
				
			</table>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){	
		
			$('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ URL::to("admin.order.search") }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

			function alert_function(msg){
				if(confirm(msg)){
					return true;
				}
				return false;
			};	
		}
	
	</script>
	
@endsection()

