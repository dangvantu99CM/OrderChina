@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style = "font-weight: bold; font-size: 16px;" class="card-header">{{ __('Đăng ký') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
						
						 <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Upload profile') }}</label>
							<div class = "profile col-md-6" >
								<img style = "margin-left:0 !important;margin-right:0 !important " id="avar" name = "avar" class="mx-auto d-block img-circle" width="30%" height="100%" alt="avatar" src="/uploads/customers/20190627085743.png" accept="image/*"/>
							</div>
							<div class="col-md-6 offset-md-4" style = "padding: 15px;">
							
                                <input id="user_avartar" type="file" class="form-control" name="avatar" style = "border:none; padding:0" required onchange="readURL(this);">
								
                            </div>
							<script>
								function readURL(input) {
										
										if (input.files && input.files[0]) {
											
											var reader = new FileReader();

											reader.onload = function (e) {
												$('#avar')
													.attr('src', e.target.result)
													.width(150)
													.height(150)
											};
											reader.readAsDataURL(input.files[0]);
										}
								}
								
							</script>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style = "margin-right:20px" type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
								<a href = ""  class = "cancel" style = "padding: 8px;border: 1px solid #ccc;border-radius: 3px;text-decoration: none !important;color: #000 !important;"> {{ __('Cancel') }}</a>
                            </div>
                        </div>
				
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
