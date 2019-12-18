@extends('admin.master_admin')
@section('content')
			<div class="col-lg-12" style = "padding:0px !important;color: #12278e;">
				<h1 class="page-header">
					{{ __('Đổi mật khẩu') }}
				</h1>
			</div>
			<div class = "card">
				<div class = "card-body">
					<form id = "validate_form" action="{{route('postChangePassword',$user->id)}}" method="POST" enctype="multipart/form-data" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>	
						
						<div class="form-group">
							<label>Mật khẩu cũ (*)</label>
							<input class="form-control input" id = "old_password" type = "password" name = "old_password" placeholder = "Mật khẩu cũ"  ></input>
						</div>
					
						<div class="form-group">
							<label>Mật khẩu mới (*)</label>
							<input class="form-control input" id = "password_new" type = "password" name = "password" placeholder = "Mật khẩu mới"></input>
						</div>
		
						<div class="form-group">
							<label>Nhập lại mật khẩu (*)</label>
							<input class="form-control input" id = "passwordAgain" type = "password" name = "passwordAgain" placeholder = "Nhập lại mật khẩu" ></input>
						</div>
			
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