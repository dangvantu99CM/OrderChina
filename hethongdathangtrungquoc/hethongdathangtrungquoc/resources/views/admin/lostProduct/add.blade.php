@extends('admin.master_admin')
@section('content')
		
			<div class = "col-lg-12">
			
				<h1 class="page-header">Thêm item
					
				</h1>
					
			</div>
			<div class="col-lg-12" style="padding-bottom:120px">
				<form id = "form_add" action="{{route('admin.subjectItem.postAdd',$su_id)}}" method="POST" enctype="multipart/form-data" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label>Tên con vật hiển thị</label>
						<input class="form-control" type = "text" name = "name" >
					</div>
					<div class="form-group">
						<label>Key để map với object khi nhận dạng ra	</label>
						<input class="form-control" type = "text" name = "api_key" >
					</div>
					<div class="form-group">
						<label style="display: inherit;">Đường dẫn file hình ảnh nhận dạng</label>
							
							<input style = "margin-top:5px" type= "file" name = "file" required ></input>
							
					</div>
					<div class="form-group">
						<label style="display: inherit;">Lưu trữ đường dẫn file model 3D được upload lên cho ios</label>
							
							<input style = "margin-top:5px" type= "file" name = "file1" required onchange="readURL(this);"></input>
							
					</div>
					<div class="form-group">
						<label style="display: inherit;">Lưu trữ đường dẫn file model 3D được upload lên cho android</label>
							
							<input style = "margin-top:5px" type= "file" name = "file2" required onchange="readURL(this);"></input>
							
					</div>
					<div class="form-group">
						<label style="display: inherit;">Đường dẫn âm thanh của con vật, đồ vật khi có sự kiện</label>
							
							<input style = "margin-top:5px" type= "file" name = "file3" required onchange="readURL(this);"></input>
							
					</div>
					<div class="form-group">
						<label style="display: inherit;">Đường dẫn âm thanh của tên</label>
							
							<input style = "margin-top:5px" type= "file" name = "file4" required onchange="readURL(this);"></input>
							
					</div>
					<button type = "submit" class="btn btn-default" style="background-color:#b4f1ee">Save</button>
					<button type="button" class="btn btn-default " onclick = "cancel_function()" style="margin-left: 28px;background-color:#b4f1ee">Cancel</button>
				</form>
			</div>
		
		<script>
		function cancel_function() {
			window.location.href = "{{route('admin.subjectItem.getList',$su_id)}}";
		}
		
	</script>
		

@endsection()

