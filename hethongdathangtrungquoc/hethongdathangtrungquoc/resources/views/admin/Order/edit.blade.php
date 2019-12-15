
@extends('admin.master_admin')
@section('content')
	
	<div class = "col-lg-12">
			<h1 class="header-page">Thay đổi thông tin
				
			</h1>
	</div>
	<div class="col-lg-7" style="padding-bottom: 120px">
		<form id = "form_add" action="{!! URL::route('admin.subjectItem.postEdit',[$subjectitem->su_id,$subjectitem->su_it_id]) !!}" method="POST" enctype="multipart/form-data" >
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type = "hidden" name = "id" autofocus="autofocus" required="required" value="{!! $subjectitem->su_it_id !!}" >
			<div class="form-group">		
				<label>Tên con vật hiển thị</label>
				<input  class = "form-control" type = "text" name = "name" autofocus="autofocus" required="required" value="{!! $subjectitem->su_it_name !!}" >
			</div>	
			
			<div class="form-group">
				<label>Key để map với object khi nhận dạng r</label>
				<input  class = "form-control" type = "text" name = "api_key" autofocus="autofocus" required="required" value="{!! $subjectitem->su_it_key !!}">

			</div>
			<div class="form-group">
				<label style="display: inherit;">Đường dẫn file hình ảnh nhận dạng</label>
				<input style = "margin-top:5px" type= "file" name = "path_card" required  value="{!! $subjectitem->su_it_path_card !!}"></input>
			</div>
			<div class="form-group">
				<label style="display: inherit;">Lưu trữ đường dẫn file model 3D được upload lên cho ios</label>
				<input style = "margin-top:5px" type= "file" name = "path_3d_ios" required  value="{!! $subjectitem->su_it_path_3d_ios !!}"></input>
				
			</div>
			<div class="form-group">
				<label style="display: inherit;">Lưu trữ đường dẫn file model 3D được upload lên cho android</label>
				<input style = "margin-top:5px" type= "file" name = "path_3d_android" required  value="{!! $subjectitem->su_it_path_3d_android !!}"></input>
				
			</div>
			<div class="form-group">
				<label style="display: inherit;">Đường dẫn âm thanh của con vật, đồ vật khi có sự kiện</label>
				<input style = "margin-top:5px" type= "file" name = "it_sound" required  value="{!! $subjectitem->su_it_sound !!}"></input>
				
			</div>
			<div class="form-group">
				<label style="display: inherit;">Đường dẫn âm thanh của tên</label>
				<input style = "margin-top:5px" type= "file" name = "sound_name " required  value="{!! $subjectitem->su_it_sound_name !!}"></input>
				
			</div>
			
			<button type = "submit" class="btn btn-default btn_action" onclick="save_function()" style="background-color:#b4f1ee">Save</button>
			<button type="button" class="btn btn-default " onclick = "cancel_function()" style="margin-left: 28px;background-color:#b4f1ee">Cancel</button>
			
		</form>
	</div>

	<script>
		function cancel_function() {
			window.location.href = "{{route('admin.subject.getList',$subjectitem->su_id)}}";
		}
		
	</script>
	
@endsection()

