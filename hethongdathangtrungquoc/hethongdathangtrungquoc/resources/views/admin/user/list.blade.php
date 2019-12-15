@extends('admin.master_admin')
@section('content')
<?php
	$addUser = true;
?>
<div class="col-lg-12" style = "padding:0px !important">
	<h1 class="page-header">
		Danh sách người dùng 
		<a title="Thêm người dùng" style="float: right;color:#4ed7e4">
			<button style="color: #fff;background-color: #149c89;font-weight:bold" class="btn btn-default" data-toggle="modal" data-target="#myModal">Thêm mới người dùng</button>
		</a>
	</h1>
</div>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>

			<th style="background-color:#50bbc5;color: #fff;">STT</th>
			<th style="background-color:#50bbc5;color: #fff;">Tên người dùng</th>
			<th style="background-color:#50bbc5;color: #fff;">Email</th>
			<th style="background-color:#50bbc5;color: #fff;">Số điện thoại</th>
			<th style="background-color:#50bbc5;color: #fff;">Địa chỉ</th>
			<th style="background-color:#50bbc5;color: #fff;">Giới tính</th>
			<th style="background-color:#50bbc5;color: #fff;">Ngày tạo</th>
			<th style="background-color:#50bbc5;color: #fff;">Ngày cập nhật</th>
			<th style="background-color:#50bbc5;color: #fff;">Chức năng</th>

		</tr>
	</thead>
	<tbody>
		<?php $stt = 0;?>
		@foreach($listUsers as $item)
		<?php $stt++; ?>
		<tr>
			<td>{!! $stt !!}</td>
			<td>{!! $item->name !!}</td>
			<td>{!! $item->email !!}</td>
			<td>{!! $item->us_phone_number !!}</td>
			<td>
				{!! $item->us_xaPhuong,$item->us_quan,$item->us_city !!}
			</td>
			<td>
				@if($item->us_gender == 1)
				    <?php
						echo "Nam";
					?>
				@endif
				@if($item->us_type== 0)
					<?php
						echo "Nữ";
					?>
				@endif
			</td>
			<td>{!! $item->created_at !!}</td>
			<td>{!! $item->updated_at !!}</td>
			
			<td style="text-align: center">
				<a id="viewDetailOrder" href="{!! URL::route('admin.order.view', $item->id) !!}" title="Xem chi tiết đơn hàng người dùng" style="text-decoration: none !important;color:#f91b1b" data-toggle="modal" data-target="#viewUser" onclick = "viewUser()">
					&nbsp;<span class="glyphicon glyphicon-eye-open"></span>
				</a>
				<a href="{!! URL::route('admin.user.edit', $item->id) !!}" style="font-weight:bold">
					&nbsp;<span class="glyphicon glyphicon-edit"></span>
				</a>
				<a id="deleteItem" href="{!! URL::route('admin.user.delete', $item->id) !!}" title="Xóa khách hàng" style="text-decoration: none !important;color:#f91b1b" onclick="return alert_function('Bạn có chắc chắn muốn xóa!')">
					&nbsp;<span class="glyphicon glyphicon-trash"></span>
					<script>
						function alert_function(msg) {
							if (confirm(msg)) {
								return true;
							}
							return false;
						};
					</script>
				</a>
			</td>
		</tr>
		@endforeach

	</tbody>


</table>

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

@endsection()