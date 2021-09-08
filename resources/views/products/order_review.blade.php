@extends('layouts.frontLayout.front_design')
@section('content')




		<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order review</li>
				</ol>
			</div><!--/breadcrums-->

			
			
			
			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							
							<div class="form-group">
                        {{$userDetails->name}}
                        </div>
						<div class="form-group">
                        {{$userDetails->address}}
                        </div>
						<div class="form-group">
                        {{$userDetails->city}}
                        </div>
						<div class="form-group">
                        {{$userDetails->state}}
                        </div>
						<div class="form-group">
                        {{$userDetails->country}}
                        </div>
					<div class="form-group">
                        {{$userDetails->pincode}}
                        </div>
						<div class="form-group">
                        {{$userDetails->mobile}}
                        </div>
					
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping details</p>
							<div class="form-group">
                        {{$shippingDetails->name}}
                        </div>
						<div class="form-group">
                        {{$shippingDetails->address}}
                        </div>
						<div class="form-group">
                        {{$shippingDetails->city}}
                        </div>
						<div class="form-group">
                        {{$shippingDetails->state}}
                        </div>
						<div class="form-group">
                        {{$shippingDetails->country}}
                        </div>
					<div class="form-group">
                        {{$shippingDetails->pincode}}
                        </div>
						<div class="form-group">
                        {{$shippingDetails->mobile}}
                        </div>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
			<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php $total_amount=0;?> 
					@foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset('public/images/backend_images/products/small/'.$cart->image)}}" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->product_name}}</a></h4>
								<p>Web ID:{{$cart->product_code}} | {{$cart->size}}</p>
							</td>
							<td class="cart_price">
								<p>{{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">
									@if($cart->quantity>1)
									
									<a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
									@endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$cart->price*$cart->quantity}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/cart/delete-product')}}/{{$cart->id}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php $total_amount=$total_amount+($cart->price*$cart->quantity);?>
					@endforeach
					<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>{{$total_amount}}</td>
									</tr>
									
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr class="shipping-cost">
										<td>discount</td>
										<td>INR{{Session::get('couponamount') }}</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>{{ $grand_total=$total_amount-Session::get('couponamount')}}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					
					</tbody>
				</table>
			</div>
			<form name="paymentform" id="paymentform" action="{{url('/place-order')}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="grand_total" value="{{$grand_total}}">
			<input type="hidden" name="coupon_amount" value="{{Session::get('couponamount') }}">
			<input type="hidden" name="coupon_code"		value="{{Session::get('couponcode') }}"
			
			<div class="payment-options">
					<span>
						<label><strong>select payment method</strong></label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="cod" value="cod"><strong> Cod</strong></label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="paypal" value="paypal"><strong> Paypal</strong></label>
					</span>
					<span style="float:right">
					<button type="submit" class="btn btn-success" onclick="return selectpaymentmethod();">place order</button>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->


	





















































@endsection