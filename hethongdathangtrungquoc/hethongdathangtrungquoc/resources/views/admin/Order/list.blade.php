@extends('admin.master_admin')
@section('content')
	<style>
		
		.tablinks{
			height: 36px;
			background: #fff;
			text-align: left;
			padding: 0 10px;
		}
	
		.tab {
			overflow: hidden;
			border: 1px solid #ccc;
			background-color: #f1f1f1;
		}

		.tab .tablinks{
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
	<div style = "padding: 0">
	
		<div>
			
			<div class = "box_order_search" class = "col-12" style = "float: left; width: 100%;padding:15px 0 !important;display: flex;justify-content: center; justify-items: center;">
			
				<div class = "col-md-2" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
					<h6 style = "margin: 0;line-height: 22px;width: 100%;">Mã đơn hàng</h6>
				</div>
				
				<div class = "col-md-9" style = "display: flex;justify-content: center;justify-items: center;">
					<div class = "col-md-9" style = "padding:0;display: flex;justify-content: center;justify-items: center;">
						<input type = "text" placeholder = "Tìm kiếm" style = "width:100%" name = "textSearch" id="textSearch"/>
					</div>
					
					<div class = "col-md-3" style = "display: flex;justify-content: center;justify-items: center;">
						<Button type = "button" id="SubmitSearch"
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
				
				<div class = "col-md-1">
					<Input type = "button" value="Reset" onclick = "resetSearch()"></Input>
				</div>
				
			</div>
			<div class="col-12" id="search_nc">
				@include('admin.Order.searchNangCao')
			</div>
		</div>
		
		<div class="tab col-12" style=" margin-bottom: 12px;">
			<button style="" class="tablinks" onclick="openTabFilter(event, 'tat_ca')">Tất cả <sup>(0)</sup></button>
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
						<th >STT</th>
						<th >Ngày tạo</th>
						<th >Mã đơn hàng</th>
						<th >Ghi chú</th>
						<th >Số sảm phẩm</th>
						<th >Tổng tiền (VNĐ)</th>
						<th >Trạng thái</th>
						<th >Thao tác</th>								
					</tr>
				</thead>
				<tbody id = "show_result">
					
					<?php $stt=0;?>
					@foreach($listOrders as $item)
					
					<?php 
						$stt++;
						$countProduct = 0;
						if($item->or_arr_id_products !== NULL){
							$countProduct = count(json_decode($item->or_arr_id_products));
						}
					?>
					
					<tr>
						<td>{!! $stt !!}</td>
						<td>{!! $item->created_at !!}</td>
						<td>{!! $item->or_code !!}</td>	
						<td>{!! $item->or_note !!}</td>	
						<td>{!! $countProduct !!}</td>
						<td>{!! $item->or_sum_price !!}</td>	
						<td>
							@switch($item->or_status)
								@case(1)
									<span>Chưa thanh toán</span>
									@break
								@case(2)
									<span>Đã thanh toán - chờ mua</span>
									@break
								@case(3)
									<span>Đã mua xong</span>
									@break
								@case(4)
									<span>Đã tất toán</span>
									@break
								@case(5)
									<span>Đã giao</span>
									@break
								@case(6)
									<span>Đã nhận</span>
									@break
								@default
									<span>Hết hạn</span>
							@endswitch
						</td>	
						<td>
							<a 
								style="color: #337ab7;;cursor: pointer;"  
								href="" 
							>
								<span class="glyphicon glyphicon-eye-open" title = "Xem chi tiết đơn hàng"></span>
							</a>
							<a 
								style="color: red;cursor: pointer;"  
								href="{!! URL::route('admin.order.delete', $item->or_id) !!}" 
								onclick="return alert_function('Bạn có chắc chắn muốn hủy đơn hàng này!')">
								<script>
									function alert_function(msg){
										if(confirm(msg)){
											return true;
										}
										return false;
									};	
								</script>
								<span class="glyphicon glyphicon-trash" title = "Hủy đơn hàng"></span>
							</a>
							
						</td>	
					</tr>
					
				
				</tbody>
				<!--
				============================= Xác nhận đặt hàng của khách hàng =======================
				-->
				<div  id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Thêm người dùng</h4>
								</div>
								<div class="modal-body" style="font-size:14px">
									<div class="col-12" style="padding-bottom:20px">

										<form id="form_add" action="{{route('admin.user.postAdd')}}" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">

											<div class="form-group">
												<label>Tên người dùng</label>
												<input class="form-control" type="text" name="name">
											</div>

											<div class="form-group">
												<label>Email</label>
												<input class="form-control" type="text" name="email">
											</div>
											
											<div class="form-group">
												<label>Mật khẩu</label>
												<input class="form-control" type="password" name="password">
											</div>	

											<button type="submit" id="submit" class="btn btn-default" style="background-color:#b4f1ee" onclick="save_function()">Lưu</button> 
											
											<button type="button" class="btn btn-default " onclick="cancel_function()" style="margin-left: 28px;background-color:#b4f1ee">Cancel</button>

										</form>

									</div>
									<script>
										function cancel_function() {
											window.location.href = "{{route('admin.user.getList')}}";
										}
									</script>
								</div>
						</div>
					</div>
				</div>	
				@endforeach
			</table>
		</div>
	</div>
	
	
	<script type="text/javascript">
		$(document).ready(function(){	
		
			var selectedCityVal = "";
			var selectedStatusVal = "";
			
			$('#SubmitSearch').on('click',function(){
				var getValueInputSearch = $("#textSearch").val();
				var fromDate = new Date($("#begin_day").val());	
				var toDate = new Date($("#finish_day").val());
				var  url= '{{route("admin.order.search")}}';
				$.ajax({
					type: 'GET',
					url:url,
					data: {
						'textSearch': getValueInputSearch,
						'begin_day':fromDate,
						'finish_day':toDate,
						'city_select':selectedCityVal,
						'status_select':selectedStatusVal
					},
					success:function(data){
						$('#show_result').html(data);
					}
				});
			})
			$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
			
			$("#city_select").change(function () {
				selectedCityVal = $("#city_select option:selected").val();
			});
			
			$("#status_select").change(function () {
				selectedStatusVal = $("#status_select option:selected").val();
			});
			
			function resetSearch(){
				console.log("aaaaaaaaaaaaa");
			}
					
			function alert_function(msg){
				if(confirm(msg)){
					return true;
				}
				return false;
			};	
			function clickFilterByStatusOrder(id_status){
				var getElementById = document.getElementById(id_status);
				var getElementByClass = document.getElementByClassName("tablinks");
				for(let i = 0; i < getElementByClass.length; i++){
					getElementByClass[i].style.background = "#fff";
				}
				getElementById.style.background = "#ccc"
			}
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
		})
		
	</script>
	
@endsection()

