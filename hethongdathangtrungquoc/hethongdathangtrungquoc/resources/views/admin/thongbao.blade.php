<div class="message">
		@if(Session::has('success'))
			<div class="alert alert-success ms-success" role="alert">
				 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Done ! </strong> {!! Session::get('success')!!}
			</div>
		@elseif(Session::has('error'))
			<div class="alert alert-danger ms-error" role="alert">
				 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>Error ! </strong>{!! Session::get('error') !!}
			</div>
		@endif
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
</div>