@extends('admin.master_admin')
@section('content')


	<div class="col-lg-12">
		<h3 class="page-header">Danh sách chi tiết chủ đề {{$su_id}}
			<a title ="Thêm tin tức" href="{!! URL::route('admin.subjectItem.add',$su_id) !!}" style="float: right;color:#4ed7e4" >
				<button style="color: #fff;background-color: #149c89;font-weight:bold" class="btn btn-default" data-toggle="modal" data-target="#myModal">Thêm Item</button>
			</a>
		</h3>
		
	</div>
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
			<tr>
			
				<th >STT</th> 
				<th >Name</th>
				<th >Key</th>
				<th >Card</th>
				<th >Model3D ios	</th>
				<th >Model3D android</th>
				<th >Sound tương tác</th>
				<th >Sound tên</th>
				<th >&nbsp;</th>
				
																		
			</tr>
		</thead>
		<tbody>
			<?php $stt=0;?>
			@foreach($subject as $item)
			<?php $stt++;?>
			 
			<tr>
				<td>{!! $stt !!}</td>
				<td>{!! $item->su_it_name !!}</td>
				<td>{!! $item->su_it_key !!}</td>
				<td><img src="{!! $item->su_it_path_card !!}" width="64px" height="64px"></td>
				<td><a href="{!! URL::route('admin.subjectItem.downloadAssets',[$item->su_id,$item->su_it_id,'model3DIOS'])!!}" title="{!! $item->su_it_path_3d_ios !!}">Download</a>
					<br>
					Version: {!! $item->su_it_version_ios !!}
				</td>
				
				<td><a href="{!! URL::route('admin.subjectItem.downloadAssets',[$item->su_id,$item->su_it_id,'model3DAndroid'])!!}" title="{!! $item->su_it_path_3d_android !!}">Download</a>
					<br>
					Version: {!! $item->su_it_version_android !!}
				</td>
				<td><a href="{!! URL::route('admin.subjectItem.downloadAssets',[$item->su_id,$item->su_it_id,'sound'])!!}" title="{!! $item->su_it_sound !!}">Download</a></td>
				<td><a href="{!! URL::route('admin.subjectItem.downloadAssets',[$item->su_id,$item->su_it_id,'soundN'])!!}" title="{!! $item->su_it_sound_name !!}">Download</a></td>
				
				<td style="text-align: center">
					<a href="{!! URL::route('admin.subjectItem.edit',[$item->su_id, $item->su_it_id]) !!}" style="color: #fff;background-color: #149c89;font-weight:bold;font-size:8px" class="btn btn-default" ><i class="fas fa-user-edit"></i></a>
					<a id = "deleteItem"  href="{!! URL::route('admin.subjectItem.delete',[$item->su_id, $item->su_it_id]) !!}" title="Xóa khách hàng" style="text-decoration: none !important;color:#f91b1b" onclick="return alert_function('Bạn có chắc chắn muốn xóa!')">
						<i class="fas fa-trash-alt"></i>
						<script>
							function alert_function(msg){
								if(confirm(msg)){
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
		
@endsection()
