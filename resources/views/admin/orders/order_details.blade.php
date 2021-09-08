@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Order Details</a> <a href="#" class="current">Widgets</a> </div>
    <h1> Order:{{$orderDetails->id}}</h1>
  </div>
  <div class="container-fluid">
    <hr>
    @if(Session::has('flash_message_success'))
        
        <div class="alert  alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>	
<strong>{!! session('flash_message_success') !!} </strong>
</div>
@endif 
    <div class="row-fluid">
      <div class="span6">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Order Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              
              <tbody>
                <tr>
                  <td class="taskDesc"> Order Date</td>
                  <td class="taskStatus">{{ $orderDetails->created_at}}</span></td>
                 
                </tr>
                <tr>
                  <td class="taskDesc"></i> Order Status</td>
                  <td class="taskStatus">{{$orderDetails->order_status}}</span></td>
                 </tr>
                 <tr>
                  <td class="taskDesc"></i> Order total</td>
                  <td class="taskStatus">{{$orderDetails->grand_total}}</span></td>
                 </tr>
                 <tr>
                  <td class="taskDesc"></i> shipping charges</td>
                  <td class="taskStatus">{{$orderDetails->shipping_charge}}</span></td>
                 </tr>
                 <tr>
                  <td class="taskDesc"></i> coupon code</td>
                  <td class="taskStatus">{{$orderDetails->coupon_code}}</span></td>
                 </tr>
                 <tr>
                  <td class="taskDesc"></i>Coupon amount</td>
                  <td class="taskStatus">{{$orderDetails->coupon_amount}}</span></td>
                 </tr>
                 <tr>
                  <td class="taskDesc"></i>Payment Method</td>
                  <td class="taskStatus">{{$orderDetails->payment_method}}</span></td>
                 </tr>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-ok"></i></span>
                <h5>Billing Address</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content"> {{$userDetails['name']}} <br>
              {{$userDetails['address']}} <br>
              {{$userDetails['city']}} <br>
              {{$userDetails['state']}} <br>
              {{$userDetails['country']}} <br>
              {{$userDetails['pincode']}} <br>
              {{$userDetails['mobile']}} <br>
</div>
            </div>
          </div>
       
      </div>
        
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>customer Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              
            <tbody>
                <tr>
                  <td class="taskDesc"> customer Name</td>
                  <td class="taskStatus">{{$orderDetails->name}}</span></td>
                 
                </tr>
                <tr>
                  <td class="taskDesc"></i>customer email</td>
                  <td class="taskStatus">{{$orderDetails->user_email}}</span></td>
                  
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-ok"></i></span>
                <h5>Update status</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
            <div class="widget-content">
            <form action="{{url('admin/update-order-status')}}" method="post">{{ csrf_field()}}
            <input type="hidden" name="order_id" value="{{$orderDetails->id}}">
            <table width="100%">
            <tr>
            <td>
            <select name="order_status" id="order_status" class="control-label" required="">
            <option value="New" @if($orderDetails->order_status=="New") selected @endif>New</option>
            <option value="Pending"  @if($orderDetails->order_status=="Pending") selected @endif>Pending</option>
            <option value="Cancelled"  @if($orderDetails->order_status=="Cancelled") selected @endif>Cancelled</option>
            <option value="InProcess"  @if($orderDetails->order_status=="InProcess") selected @endif>In Process</option>
            <option value="Shipped"  @if($orderDetails->order_status=="Shipped") selected @endif>Shipped</option>
            <option value="Delivered"  @if($orderDetails->order_status=="Delivered") selected @endif>Delivered</option>
            <option value="paid"  @if($orderDetails->order_status=="paid") selected @endif>Paid</option>
            </select></td>
            <td>
            <input type="submit" value="update status"></td>
            </tr>
            </table>
            </form>
            </div>
            </div>
          </div>
       
      </div>




        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-ok"></i></span>
                <h5>Shipping address</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
            <div class="widget-content"> {{$userDetails['name']}} <br>
              {{$orderDetails->address}} <br>
              {{$orderDetails->city}} <br>
              {{$orderDetails->state}} <br>
              {{$orderDetails->country}} <br>
              {{$orderDetails->pincode}} <br>
              {{$orderDetails->mobile}} <br>
            </div>
            </div>
          </div>
       
      </div>
    </div>
    <hr>
    <!-- <div class="row-fluid">
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
            <h5>Browesr statistics</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Browser</th>
                  <th>Visits</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Chrome</td>
                  <td>8850</td>
                </tr>
                <tr>
                  <td>Firefox</td>
                  <td>5670</td>
                </tr>
                <tr>
                  <td>Internet Explorer</td>
                  <td>4130</td>
                </tr>
                <tr>
                  <td>Opera</td>
                  <td>1574</td>
                </tr>
                <tr>
                  <td>Safari</td>
                  <td>1044</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-arrow-right"></i> </span>
            <h5>Website statistics</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Site</th>
                  <th>Visits</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">Themeforest.com</a></td>
                  <td>12444</td>
                </tr>
                <tr>
                  <td><a href="#">Themedesigner.in</a></td>
                  <td>10455</td>
                </tr>
                <tr>
                  <td><a href="#">Themedesigner.in</a></td>
                  <td>8455</td>
                </tr>
                <tr>
                  <td><a href="#">Themedesigner.in</a></td>
                  <td>4456</td>
                </tr>
                <tr>
                  <td><a href="#">Themedesigner.in</a></td>
                  <td>2210</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
            <h5>Visited Pages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Page</th>
                  <th>Visits</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">Freebies</a></td>
                  <td>8550</td>
                </tr>
                <tr>
                  <td><a href="#">Blog</a></td>
                  <td>7550</td>
                </tr>
                <tr>
                  <td><a href="#">Work</a></td>
                  <td>5247</td>
                </tr>
                <tr>
                  <td><a href="#">site template</a></td>
                  <td>4880</td>
                </tr>
                <tr>
                  <td><a href="#">All categories</a></td>
                  <td>4801</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th>product code</th>
<th>Product Name</th>
<th>Product Size</th>
<th>Product Color</th>
<th>Product Price</th>
<th>Product Qty</th>
</tr>
</thead>
<tbody>
@foreach($orderDetails->orders as $pro)
<tr>
<td>{{$pro->product_code}}</td>
<td>{{$pro->product_name}}</td>
<td>{{$pro->product_size}}</td>
<td>{{$pro->product_color}}</td>
<td>{{$pro->product_price}}</td>
<td>{{$pro->product_qty}}</td>

</tr>
@endforeach
</tbody>
</table>

</div>
@endsection