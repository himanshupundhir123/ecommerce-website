<html>
<head>
</head>
<body>
<table width="700px" border="0" cellpadding="0" cellspacing="0">

        <tr><td>&nbsp himanshu thakur developer</td></tr>
  <tr><td>  <img  width="100px" height="100px "  style="display:block" src="{{asset('public/images/frontend_images/home/himanshu2.jpg')}}">
    </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Hello{{$name}}</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Thanku for shipping with us your order details are below</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Order No:{{$order_id}}</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
<table width='95%' cellpadding="5" cellspacing="5" bgcolor="#cccccc" >
<tr>
<td> Product Name</td>
<td> Product Code</td>
<td>Size </td>
<td> Color </td>
<td> Quantity</td>
<td> Unit Price</td>
</tr>
@foreach($productDetails->orders as $product)
<tr>
<td> {{ $product->product_name}}</td>
<td> {{ $product->product_code}}</td>
<td> {{ $product->product_size}}</td>
<td> {{ $product->product_color}}</td>
<td> {{ $product->product_qty}}</td>
<td> {{ $product->product_price}}</td>
</tr>
@endforeach
<tr>
<td colspan="5" align="right">shipping charges </td>
<td>{{$productDetails->shipping_charge}}</td>
</tr>
<tr>
<td colspan="5" align="right">coupon discount </td>
<td>{{$productDetails->coupon_amount}}</td>
</tr>
<tr>
<td colspan="5" align="right">grand total </td>
<td>{{$productDetails->grand_total}}</td>
</tr>
</table>
</td>
</tr>

<tr>
<td>
<table width="100%">
 <tr>
 <td width="50%">
 <table>
    <tr>
    <td>Bill to</td>
    </tr>
    <tr>
    <td>{{ $userDetails->name}}</td>
    </tr>
    <tr>
    <td>{{ $userDetails->address}}</td>
    </tr>
    <tr>
    <td>{{ $userDetails->city}}</td>
    </tr>
    <tr>
    <td>{{ $userDetails->state}}</td>
    </tr>
    <tr>
    <td>{{ $userDetails->country}}</td>
    </tr>
    <tr>
    <td>{{ $userDetails->pincode}}</td>
    </tr>
    <tr>
    <td>{{ $userDetails->mobile}}</td>
    </tr>
 </table>
  </td>
  <td width="50%">
 <table>
    <tr>
    <td>Shipp to</td>
    </tr>
    <tr>
    <td>{{ $productDetails->name}}</td>
    </tr>
    <tr>
    <td>{{ $productDetails->address}}</td>
    </tr>
    <tr>
    <td>{{ $productDetails->city}}</td>
    </tr>
    <tr>
    <td>{{ $productDetails->state}}</td>
    </tr>
    <tr>
    <td>{{ $productDetails->country}}</td>
    </tr>
    <tr>
    <td>{{ $productDetails->pincode}}</td>
    </tr>
    <tr>
    <td>{{ $productDetails->mobile}}</td>
    </tr>
 </table>
  </td>




 </tr>  

</table>
</tr>
</td>







</table>
</body>
</html>