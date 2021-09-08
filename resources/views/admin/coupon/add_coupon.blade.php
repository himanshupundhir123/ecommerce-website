@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">category</a> <a href="#" class="current">add category</a> </div>
    <h1>Product</h1>
  </div>
  <div class="container-fluid"><hr>
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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add coupon</h5>
          </div>
          <div class="widget-content nopadding">
          <form class="form-horizontal"  method="post" action="{{url('admin/add-coupon')}}" name="add_coupon" id="add_coupon"  enctype="multipart/form-data">
            {{ csrf_field()}}
            

            <div class="control-group">

           

              <div class="control-group">
                <label class="control-label">Coupon code</label>
                <div class="controls">
                  <input type="text" name="coupon_code" id="coupon_code" minlength="5" maxlength="20" required>
                </div>
              </div>
            
              <div class="control-group">
                <label class="control-label">Amount</label>
                <div class="controls">
                  <input type="text" name="amount" id="amount" min="0">
                </div>
              </div>

              <div class="control-group" style="width:450px;">
                <label class="control-label">Amount Type</label>
                <div class="controls">
                  <select name="amount_type" id="amount_type" width="50px">
            <option value="percantage">Percantage</option>
            <option value="fixed">fixed</option>
                    </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Expiry Date</label>
                <div class="controls">
                  <input type="date" name="expiry_date" id="expiry_date">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
           
              
              <div class="form-actions">
                <input type="submit" value="add product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>






















    
    
  </div>
</div>




@endsection
