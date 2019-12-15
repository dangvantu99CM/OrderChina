	<div id = "search_nang_cao" class = "col-md-12" style = "float: left; width: 100%;padding:15px 0 !important;justify-content: center;justify-items: center;display: flex;height: 52px;">
		<div class = "col-md-1" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
			<h6 style = "line-height: 22px;margin:0 !important;width: 100%;">Thời gian</h6>
		</div>
		<div class = "col-md-3" style = "justify-content: center;justify-items: center;display: flex;">
			<input type="date" name="begin_day" placeholder = "Từ" style = "width:100%" id = "begin_day"/>
		</div>&nbsp;-&nbsp
		<div class = "col-md-3" style = "justify-content: center;justify-items: center;display: flex;">
			<input type="date" name="finish_day"  placeholder = "đến" style = "width:100%" id = "finish_day"/>
		</div>
		<div class = "col-md-1" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
			<h6 style = "line-height: 22px;margin:0 !important">Kho</h6>
		</div>
		<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
			<select name = "city_select" id="city_select">
				<option value="0">Tất cả</option>
				<option value="1">Hà nội</option>
				<option value="2">Thành phố HCM</option>
			</select>
		</div>
		<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
			<h6 style = "line-height: 22px;margin:0 !important">Trạng thái</h6>
		</div>
		<div class = "col-md-2" style = "padding:0;justify-content: center; justify-items: center;display: flex;">
			<select name = "status_select" id="status_select">
				<option value="0">Tất cả</option>
				<option value="1">Chưa thanh toán</option>
				<option value="2">Đã Thanh toán - chờ mua</option>
				<option value="3">Đã mua xong</option>
				<option value="4">Đã tất toán</option>
				<option value="5">Đã giao</option>
				<option value="6">Đã nhận</option>
				<option value="7">Hết hàng</option>
			</select>
		</div>
	</div>


