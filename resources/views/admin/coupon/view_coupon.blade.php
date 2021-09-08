@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables</h1>
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
            <h5>view coupon</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Coupon Id</th>
                  <th>Coupon Code</th>
                  <th>Amount</th>
                  <th>Amount type</th>
                  <th>expiry date</th>
                  <th>status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($coupon as $product)
                <tr class="gradeX">
                
                  <td>{{$product->id}}</td>
                  <td>{{$product->coupon_code}}</td>
                  <td>{{$product->amount}}
                  @if($product->amount_type=="percantage") % @else INR @endif
                  </td>
                  <td>{{$product->amount_type}} </td>
                  <td>{{$product->expiry_date}}</td>
                  <td>@if($product->status==1) Active @else InActive @endif
                  </td>
                <td class="center">
                  <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">view</a>
                  <a href="{{url('/admin/edit-coupon')}}/{{$product->id}}" class="btn btn-primary btn-mini">Edit</a>
                  
                  <a rel="{{$product->id}}" rel1="{{url('/admin/delete-product')}}/{{$product->id}}"  <?php /* href="{{url('/admin/delete-product')}}/{{$product->id}}"*/ ?> href="javascript:" class="btn btn-danger btn-mini deletRecord">Delete</a>
                  </td>
                </tr>
                
          
            <div id="myModal{{$product->id}}" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <!-- <h3>{{$product->product_name}}Full details</h3> -->
              </div>
              <div class="modal-body">
                <p>Coupon Id:{{$product->id}} </p>
                <p>Coupon Code:{{$product->coupon_code}} </p>
                <p>Amount:{{$product->amount}} </p>
                <p>Amount type:{{$product->amount_type}} </p>
                <p>expiry date:{{$product->expiry_date}} </p>
                <p>status:{{$product->status}} </p>
              </div>
            </div>
 
           
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