@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>
    <h1>Orders</h1>
  </div>
  <div class="container-fluid">
  @if(Session::has('flash_message_success'))
        
        <div class="alert  alert-success">
<button type="button" class="close" data-dismiss="alert">×</button>	
<strong>{!! session('flash_message_success') !!} </strong>
</div>
@endif 
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>view orders</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order Id</th>
                  <th>Order Date</th>
                  <th>Customer Name </th>
                  <th>Customer Email</th>
                  <th>Ordered Products</th>
                  <th>Order Amount</th>
                  <th>Order status</th>
                  <th>payment Method</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                <tr class="gradeX">
                
                  <td>{{$order->id}}</td>
                  <td>{{$order->created_at}}</td>
                  <td>{{$order->name}}</td>
                  <td>{{$order->user_email}}</td>
                  <td class="center">
                      @foreach($order->orders as $pro)
                      {{$pro->product_code}}
                      ({{$pro->product_qty}})
                      <br>
                      @endforeach
                  </td>
                  <td>{{$order->grand_total}}</td>
                  <td>{{$order->order_status}}</td>
                  <td>{{$order->payment_method}}</td>
                  <td class="center">
                <a target="_blank" href="{{ url('admin/view-order/'.$order->id)}}" class="btn btn-success btn-mini">View order Details</a>
                <a target="_blank" href="{{ url('admin/view-invoice/'.$order->id)}}" class="btn btn-info btn-mini">View order invoice</a>
                    </td>
                 
                
                </tr>
                
          
           
 
           
            </div>
          
        
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

















@endsection