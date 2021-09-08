<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right"> Order # {{$orderDetails->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
                    {{$userDetails['name']}} <br>
              {{$userDetails['address']}} <br>
              {{$userDetails['city']}} <br>
              {{$userDetails['state']}} <br>
              {{$userDetails['country']}} <br>
              {{$userDetails['pincode']}} <br>
              {{$userDetails['mobile']}} <br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
                    {{$orderDetails->name}} <br>
              {{$orderDetails->address}} <br>
              {{$orderDetails->city}} <br>
              {{$orderDetails->state}} <br>
              {{$orderDetails->country}} <br>
              {{$orderDetails->pincode}} <br>
              {{$orderDetails->mobile}} <br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{$orderDetails->payment_method}}<br>
    					{{$orderDetails->user_email}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ $orderDetails->created_at}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Product Code</strong></td>
        							<td class="text-center"><strong>Name</strong></td>
        							<td class="text-center"><strong>Size</strong></td>
        							<td class="text-center"><strong>Color</strong></td>
                                    <td class="text-center"><strong>qty</strong></td>
                                    <td class="text-center"><strong>price</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line text-center) or some such thing here -->
    						
                                @foreach($orderDetails->orders as $pro)
                                    <tr>
                                    <td class="no-line text-left ">{{$pro->product_code}}</td>
                                    <td class="no-line text-center ">{{$pro->product_name}}</td>
                                    <td class="no-line text-center">{{$pro->product_size}}</td>
                                    <td class="no-line text-center ">{{$pro->product_color}}</td>
                                    <td class="no-line text-center">{{$pro->product_qty}}</td>
                                    <td class="no-line text-center">{{$pro->product_price}}</td>
                                  

                                    
                                    @endforeach
                                <!--     </tr>
                                    <tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-center">INR {{$orderDetails->grand_total}}</td>
    							</tr> -->
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="no-line text-center"><strong>Shipping(+)</strong></td>
    								<td class="no-line text-center">INR {{$orderDetails->shipping_charge}}</td>
    							</tr>
                                <tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="no-line text-center"><strong>coupon  Discount(-)</strong></td>
    								<td class="no-line text-center">INR {{$orderDetails->coupon_amount}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-center">INR {{($orderDetails->grand_total)+($orderDetails->shipping_charge)}}</td>
    							</tr>





    							







                                
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>