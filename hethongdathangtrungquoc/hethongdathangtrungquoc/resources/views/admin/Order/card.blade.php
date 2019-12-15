@extends('admin.master_admin')
@section('content')
	<style>
		.number{
			font-weight: bold;
			display: block;
			float: left;
			margin-right: 10px;
			width: 20px;
			height: 20px;
			text-align: center;
			line-height: 20px;
			-moz-border-radius: 100%;
			-webkit-border-radius: 100%;
			border-radius: 100%;
			color: #fff;
			background: #65C178;   
		}
		.xac_nhan{
			 margin-right: 36px;
			 margin-bottom:4px
		}
		#steps{
			list-style: none;
			border-bottom: 1px solid #555;
			padding-bottom: 3px;
			height: 20px;
			margin: 0 0 15px 0;
			float: left;
			width: 100%;
		}
	
		#page-tl{
			float: left;
			width: 100%;
			margin-top: 20px;
			margin-bottom: 10px;
		}
		.submit{
			text-decoration: none;
			background-color: #2D7FCB;
			background-image: linear-gradient(#5698D5, #2D7FCB);
			border: 1px solid #2D7FCB;
			color: #FFFFFF;
			text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
			text-transform: uppercase;
			padding: 5px 10px
		}
	</style>
	<div class = "card" style="float: left; width: 100%;">
		<div id="page-tl" >
			<h2 style="margin:0;float: left;">Giỏ hàng</h2>
			<span style="float: right;display: block;"><a href="javascript:;" class="upload_excel button button-30 submit" style="text-decoration: none">Import excel</a></span>
		</div>
		<ul id="steps" style="padding:0;list-style:none">	
			<li class="active xac_nhan" style="display:inline-block"><span class="number">1</span>Cho vào giỏ hàng</li>
			<li class = "xac_nhan" style="display:inline-block"><span class="number" >2</span>Xác nhận</li>
			<li class = "xac_nhan" style="display:inline-block"><span class="number">3</span>Thanh toán</li>
			<li class = "xac_nhan"  style="display:inline-block"><span class="number" >4</span>Mua hàng</li>
			<li class = "xac_nhan" style="display:inline-block"><span class="number" style="display:inline-block">5</span>Giao hàng</li>
			<li class = "xac_nhan" style="display:inline-block"><span class="number" style="display:inline-block">6</span>Nhận hàng</li>
		</ul>
		<div class="carhd" style="color: #fff;
				background: #626262;
				padding: 8px 10px;
				margin: 10px 0;
				text-transform: uppercase;
				font-weight: bold;
				float: left;
				width: 100%;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td style="text-align: left;">Sản phẩm</td>
					<td style="text-align: right;" class="w100 textright">Đơn giá (te)</td>
					<td style="text-align: right;" class="w100">Số lượng</td>
					<td style="text-align: right;" class="w100 textright">Tổng tiền (te)</td>
					<td style="text-align: right;" class="w100 ">&nbsp;</td>
				</tr>
			</table>
		</div>
		<!--
		<div><br>Chưa có sản phẩm nào trong giỏ hàng!</div>

		<div id="dialog-message" title="Đặt hàng bằng Excel">
			<div style="padding: 20px 0;">
				<p>
					Tải file mẫu <strong><a href="" style="color:#0069ac; outline: none;">Tại đây</a> </strong>
				</p>
				<P>
					<form enctype="multipart/form-data" id="upload-sumbit" >
						Đính kèm file: <input type="file" value="" name="file" style="outline: none;">  <button type="submit" class="button button-30 submit">Upload</button>
					</form>
				</p>
					<div class="alert alert-error"></div>
					<div class="alert alert-success"></div>
				<p>
				</p>
			 </div>
		</div>
		-->
	</div>
@endsection()