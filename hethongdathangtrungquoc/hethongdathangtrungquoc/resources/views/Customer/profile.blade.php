@extends('admin.master_admin')
@section('content')
			<style>
				.profile_head_table{
					width: 160px;
					padding: 10px;
					text-align: left;
					padding-left:0 !important
				}
				.profile_data_table{
					text-align: left;
				}
			</style>
			<div class="col-lg-12" style = "padding:0px !important;color: #12278e;">
				<h1 class="page-header">
					{{ __('Thông tin cá nhân') }}
				</h1>
			</div>
			<div class = "card">
				<div class = "card-body">
					<form id = "validate_form" action="{{route('postProfile',$user->id)}}" method="POST" enctype="multipart/form-data" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>	
						
						<table style="width:100%">
							<tr>
								<th class = "profile_head_table">Tài khoản</th>
								<td class = "profile_data_table"><strong style="color: red;font-weight: 700;">{!!$user->name!!}<strong></td>
							</tr>
							<tr>
								<th class = "profile_head_table">Họ và tên (*)</th>
								<td class = "profile_data_table"><input style = "width: 32% !important;" class = "form-control"id = "name" type = "text" name = "name"  placeholder = "Họ và tên" value = "{!!$user->name!!}"></input></td>
							</tr>
							<tr>
								<th class = "profile_head_table">Ngày sinh</th>
								<td class = "profile_data_table">
									<?php
										$getDay = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->us_birthDay)->day;		
										$getMonth = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->us_birthDay)->month;
										$getYear = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->us_birthDay)->year;
									?>
									<select name = "select_day" id = "select_day">
										@for($i = 1; $i <= 31; $i++)
											<option value="{{ $i }}" @if("$getDay" == "$i") selected @endif>{{ $i }}</option>
										@endfor
									</select>
									<select name = "select_month" id = "select_month">
										@for($i = 1; $i <= 12; $i++)
											<option value="{{ $i }}" @if("$getMonth" == "$i") selected @endif>{{ $i }}</option>
										@endfor
									</select>
									<select name = "select_year" id = "select_year">
										@for($i = 1900; $i <= 2069; $i++)
											<option value="{{ $i }}" @if("$getYear" == "$i") selected @endif>{{ $i }}</option>
										@endfor
									</select>
								</td>
							</tr>
							<tr>
								<th class = "profile_head_table">Giới tính</th>
								<td class = "profile_data_table">
									<select name = "us_gender" id = "us_gender">
										<option value="0" @if("$user->us_gender" == 0) selected @endif>Nam</option>
										<option value="1" @if("$user->us_gender" == 1) selected @endif>Nữ</option>
									</select>
								</td>
							</tr>
							<tr>
								<th class = "profile_head_table">Điện thoại (*)</th>
								<td class = "profile_data_table">
									<input style = "width: 32% !important;" class = "form-control" id = "phone_number" type = "number" name = "phone_number"  placeholder = "Số điện thoại" value = "{!!$user->us_phone_number!!}"></input>
								</td>
							</tr>
							<tr>
								<th class = "profile_head_table">Mã khách hàng (*)</th>
								<td class = "profile_data_table">{!!$user->us_code!!}</td>
							</tr>
							<tr>
								<th class = "profile_head_table">Địa chỉ (*)</th>
								<td class = "profile_data_table">
									<input style = "width: 32% !important;" class = "form-control" id = "address" type = "text" name = "address"  placeholder = "Địa chỉ" value = "{!!$user->us_address!!}">
									</input>
								</td>
							</tr>
							
							<tr>
								<th class = "profile_head_table">Tỉnh / Thành phố (*)</th>
								<td class = "profile_data_table">
									<select class = "form-control" style="width: 32% !important;">
										<option>
										</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<th class = "profile_head_table">Quận / Huyện (*)</th>
								<td class = "profile_data_table">
									<select class = "form-control" style="width: 32% !important;">
										<option>
										</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<th class = "profile_head_table">Phường / Xã (*)</th>
								<td class = "profile_data_table">
									<select class = "form-control" style="width: 32% !important;">
										<option>
										</option>
									</select>
								</td>
							</tr>
							
						</table>
						
						<div class="form-group row mb-0">
		
							<div class="save" style = "padding:15px">
								<button type="submit" class="btn btn-primary" style = "margin-right: 20px;">
									{{ __('Lưu thay đổi') }}
								</button>
							</div>
							
						</div>
					</form>
				</div>
			</div>
		<script>
			
		</script>
@endsection()