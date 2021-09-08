@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Thanks</li>
				</ol>
			</div>
</section>
<section id="do_action">
<div class="container">
<div class="heading" align="center">
<h3> your COD order has been placed</h3>
<p>your order number is {{Session::get('order_id')}}-- and total payble about is Inr--{{Session::get('grand_total')}}</p>
<p>please make payment by clicking on below payment button</p>












<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

<!-- Saved buttons use the "secure click" command -->
<input type="hidden" name="cmd" value="_s-xclick">

<!-- Saved buttons are identified by their button IDs -->
<input type="hidden" name="business" value="himanshupundhir1234@gmail.com">
<input type="hidden" name="item_name" value="{{Session::get('order_id')}}">
  <input type="hidden" name="item_number" value="{{Session::get('order_id')}}">
  <input type="hidden" name="amount" value="{{Session::get('grand_total')}}">
  <input type="hidden" name="currency_code" value="USD">

<!-- Saved buttons display an appropriate button image. -->
<input type="image" name="submit"
  src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_LG.gif"
  alt="PayPal - The safer, easier way to pay online">
<img alt="" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

</div>
</div>
</section>
@endsection
<?php
Session::forget('order_id');
Session::forget('grand_total');
?>