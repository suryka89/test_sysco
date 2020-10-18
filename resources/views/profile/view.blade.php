@extends('layouts.dashboard')

@section('content')
<style>
.thumbnail .media-link {
  padding: 0;
  display: block;
  height: 210px;
  position: relative;
  overflow: hidden;
  text-align: center;
  background-position: center top;
  background-repeat: no-repeat;
}
@media (min-width: 601px) and (max-width: 991px) {
  .thumbnail .media-link {
    height: 220px;
  }
}
.thumbnail .media-link .icon-view {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -40px;
  margin-top: -40px;
  opacity: 0;
  cursor:pointer;
  -webkit-animation: fadeOut .4s;
  animation: fadeOut .4s;
}
</style>
    <div class="container">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>
                    <div class="card-body">
                    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="aligner-wrapper">
                    <div class="text-center">
                        <!-- <img class="img-md rounded-circle" src="https://graph.facebook.com/v3.3/10222925554831099/picture?width=1920" style="height: auto;width: 200px;" alt="Profile image">
 -->
                         <a class="media-link" href="#" style="">
                         <img class="img-md rounded-circle" id="blah" src='<?php 
                                if( \Storage::disk('public')->exists(\Auth::user()->avatar)  ){ 
                                    echo \Storage::url(\Auth::user()->avatar);
                                }else if(\Auth::user()->social_type != null)
                                {
                                    echo \Auth::user()->avatar;
                                } else {
                                    echo (\Storage::url("images/user/default.jpg"));
                                } 
                            ?>' style="height: auto;width: 200px;" alt="Profile image">
                            
                                {!! Form::model(\Auth::user(), [
                                    'method' => 'POST',
                                    'url' => '/profile/update/avatar',
                                    'class' => 'form-horizontal',
                                    'files' => true
                                ]) !!}
                      
                                <span id="inppic" class="set_image">
                                    <label class="" for="imgInp">
                                        <span><i class="fa fa-pencil" style="cursor: pointer;"></i></span>
                                    </label>
                                    <input type="file" style="display:none;" id="imgInp" name="avatar" />
                                </span>
                                <span id="savepic" style="display:none;">
                                    <span class="signup_btn" onclick="abnv('inppic'); change_state('normal');" 
                                     data-ing="{{ __('saving')}}..." 
                                     data-success="{{ __('profile_picture_saved_successfully')}}"
                                      data-unsuccessful="{{ __('edit_failed') }} {{ __('try_again!') }}"
                                       data-reload="no" >
                                        <span><i class="fa fa-save" style="cursor: pointer;"></i></span>
                                    </span>
                                </span>
                                {!! Form::close() !!}
                        </a>
                                <p class="mb-1 mt-3">{{ Auth::user()->name }}</p>
                                <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body performane-indicator-card">
                <form method="POST" action="{{ route('update_profile') }}">
                    @csrf
                <div class="d-sm-flex">
                    <h4 class="card-title flex-shrink-1">{{ __('Profile information')}}</h4>
                    <p class="m-sm-0 ml-sm-auto flex-shrink-0">
                </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">{{ __('Name') }}</span>
                        <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">{{ __('Password') }}</span>
                        <input id="password" type="password" class="form-control validatePass @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <span class="focus-input100 password"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">{{ __('Confirm Password') }}</span>
                        <input id="password_confirm" type="password" class="form-control validatePass" name="password_confirmation"  autocomplete="new-password">
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                                <button type="submit" class="btn btn-primary">
                                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
                    </div>
                </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
	function abnv(thiss){
        // console.log(thiss);
		$('#savepic').hide();
		$('#inppic').hide();
		$('#'+thiss).show();
	}
	function change_state(va){
		$('#state').val(va);
	}

	$('.user-profile-img').on('mouseenter',function(){
		//$('.pic_changer').show('fast');
	});

	//$('.set_image').on('click',function(){
	//    $('#imgInp').click();
	//});

	$('.user-profile-img').on('mouseleave',function(){
		if($('#state').val() == 'normal'){
			//$('.pic_changer').hide('fast');
		}
	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#blah').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
			abnv('savepic');
			change_state('saving');
		}
	}

	$("#imgInp").change(function() {
		readURL(this);
    });

    $("#imgInp").on("change",function(e)
    {
        $(".signup_btn").click();
    });
    
    
	window.addEventListener("keydown", checkKeyPressed, false);
	 
	function checkKeyPressed(e) {
		if (e.keyCode == "13") {
			$(":focus").closest('form').find('.submit_button').click();
		}
	}
</script>
@stop
