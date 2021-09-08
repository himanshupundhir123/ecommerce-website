@extends('layouts.frontLayout.front_design')
@section('content')


<section id="form"><!--form-->
		<div class="container">
        @if(Session::has('flash_message_success'))
        
        <div class="alert  alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>	
<strong>{!! session('flash_message_success') !!} </strong>
</div>
@endif 
@if(Session::has('flash_message_error'))
        
        <div class="alert  alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>	
<strong>{!! session('flash_message_error') !!} </strong>
</div>
@endif 
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>update account</h2>



						<form id="accountform" name="accountform" action="{{ url('/account')}}" method="post">
						{{ csrf_field() }}
							<input type="hidden"  name="id" value="{{$user_details->id}}">
							<input type="text"  id="name" name="name" value="{{$user_details->name}}" placeholder="address" />
							<input type="text" value="{{$user_details->address}}"  id="address" name="address" placeholder="address" />
							<input type="text"   value="{{$user_details->city}}"id="city" name="city" placeholder="city" />
							<input type="text" value="{{$user_details->state}}" id="state" name="state" placeholder="state" />
							<select id="country" name="country">
							<option value="">country</option>
							@foreach($country as $countries)
							<option value="{{$countries->name}}" @if($countries->name==$user_details->country) selected @endif>{{$countries->name}}</option>
							@endforeach
							</select>
							<input style="margin-top:10px" value="{{$user_details->pincode}}" type="text"  id="pincode" name="pincode" placeholder="pincode" />
							<input type="text" value="{{$user_details->mobile}}" id="mobile" name="mobile" placeholder="mobile" />

							<button type="submit" class="btn btn-default">update</button>
						</form>
						
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>update password!</h2>
						<form class="form-horizontal"  method="post" id="passwordform" name="passwordform" action="{{url('/update-user-pwd')}}">
						{{csrf_field()}}
						<div class="control-group">
                  <label class="control-label">current Password</label>
                  <div class="controls">
                    <input type="password" name="current_pwd" id="current_pwd" />
                    <span id="chkPwd"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">new password</label>
                  <div class="controls">
                    <input type="password" name="new_pwd" id="new_pwd" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">confirm password</label>
                  <div class="controls">
                    <input type="password" name="confirm_pwd" id="confirm_pwd" />
                  </div>
                </div>
				<div class="form-actions">
                  <input type="submit" value="update password" class="btn btn-success">
                </div>
						</form>
					
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	





@endsection