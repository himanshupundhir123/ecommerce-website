@extends('layouts.frontLayout.front_design')
@section('content')



<section id="form"><!--form-->
		<div class="container">
			<div class="row">
			@if(Session::has('flash_message_error'))
        
        <div class="alert  alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>	
<strong>{!! session('flash_message_error') !!} </strong>
</div>
@endif 
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2> bill to</h2>
						<form action="{{url('/checkout')}}" method="post" id="billingform" name="billingfomr">
						{{csrf_field()}}
							<input type="text" name="billing_name"  id="billing_name" value="{{$userDetails->name}}"placeholder="billing name" />
							<input type="text" name="billing_address" id="billing_address" value="{{$userDetails->address}}" placeholder="billing Address" />
							<input type="text" name="billing_city" id="billing_city" value="{{$userDetails->city}}" placeholder="Billing city"/>
                            <input type="text" name="billing_state" id="billing_state" value="{{$userDetails->state}}" placeholder="BIlling state" />
                            
                            <select id="billing_country" name="billing_country">
							<option value="">country</option>
							@foreach($country as $countries)
							<option value="{{$countries->name}}" @if($countries->name==$userDetails->country) selected @endif>{{$countries->name}}</option>
							@endforeach
							</select>









                            <input style="margin-top:10px" name="billing_pincode" id="billing_pincode" type="text"  value="{{$userDetails->pincode}}" placeholder="Billing pincode" />
                            <input type="text" name="billing_mobile" id="billing_mobile" value="{{$userDetails->mobile}}" placeholder="Mobile" />
                            <div class="form-check">
                            <input type="checkbox" style=" height: 20px;
    margin-left: -162px;"id="billship">
                            <label class="form-check-label" for="materialunchecked">
                                billing address and shipping address same</label>
                            </div>
							
							
						
					</div><!--/login form-->
				</div>
				<!-- <div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div> -->
				<div class="col-sm-4">
					<!--sign up form-->
						<h2> shipp to!</h2>
					
							<input class="form-control" type="text" name="shipping_name" id="shipping_name"  placeholder="Shipping Name"/>
							<input class="form-control" name="shipping_address" id="shipping_address" type="text" placeholder="Shipping  Address"/>
                            <input class="form-control"name="shipping_city" id="shipping_city" type="text" placeholder="Shipping city"/>
                            <input class="form-control"name="shipping_state" id="shipping_state" type="text" placeholder="Shipping state"/>
                            <select class="form-control"id="shipping_country" name="shipping_country">
							<option value="">country</option>
							@foreach($country as $countries)
							<option value="{{$countries->name}}">{{$countries->name}}</option>
							@endforeach
							</select>
                            <input class="form-control" style="margin-top:10px" name="shipping_pincode" id="shipping_pincode" type="text" placeholder="Shipping pincode"/>
                            <input class="form-control"name="shipping_mobile" id="shipping_mobile"  type="text" placeholder="Shipping Mobile"/>
							<button type="submit" class="btn btn-default">checkout</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	






@endsection