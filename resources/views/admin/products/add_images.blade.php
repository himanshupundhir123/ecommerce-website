@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">category</a> <a href="#" class="current">add category</a> </div>
    <h1> add Product attribute</h1>
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
            <h5>Add product attribute</h5>
          </div>
          <div class="widget-content nopadding">

          <form class="form-horizontal"  method="post" action="{{url('admin/add-images')}}/{{$productDetails->id}}" name="add_attribute" id="add_attribute"   enctype="multipart/form-data">
            {{ csrf_field()}}

                        <div class="control-group">
                <label class="control-label">Product Name</label>
                <label class="control-label"><strong>{{$productDetails->product_name}}</strong></label>
                <!-- <div class="controls">
                  <input type="text" name="product_name" id="product_name">
                </div> -->
              </div>
            
              
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label"><strong>{{$productDetails->product_code}}</strong></label>
              </div>            
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image[]" id="image" multiple="multiple">
                </div>
              </div>
            

    
              <div class="form-actions">
                <input type="submit" value="add attribute" class="btn btn-success">
              </div>
                </form>
    </div>
     </div>
      </div>
    </div>
    


















    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>view attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Image Id</th>
                  <th>Product Id</th>
                  <th>Image </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($productsImage as $image)
              <tr>
              <td>{{$image->id}}</td>
              <td>{{$image->product_id}}
              <td><img src="{{asset('public/images/backend_images/products/small/'.$image->image)}}" width="50" height="50"></td>
              <td><a rel="{{$image->id}}" rel1="{{url('/admin/delete-image')}}/{{$image->id}}"  <?php /* href="{{url('/admin/delete-product')}}/{{$product->id}}"*/ ?> href="javascript:" class="btn btn-danger btn-mini deletImage">Delete</a></td>
              </tr>
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
