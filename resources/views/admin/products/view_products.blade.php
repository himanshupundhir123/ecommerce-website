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
            <h5>view categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Category Id</th>
                  <th>Category  Name </th>
                  <th>Product name</th>
                  <th>Product code</th>
                  <th>Product Color</th>
                  <th>price</th>
                  <th>image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($products as $product)
                <tr class="gradeX">
                
                  <td>{{$product->id}}</td>
                  <td>{{$product->category_id}}</td>
                  <td>{{$product->category_name}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_code}}</td>
                  <td>{{$product->product_color}}</td>
                  <td>{{$product->price}}</td>
                  <td>
                  @if(!empty($product->image))
                  <img src="{{asset('public/images/backend_images/products/small/'.$product->image)}}">
                  @endif
                  </td>
                  <td class="center"><a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">view</a>
                  <a href="{{url('/admin/edit-product')}}/{{$product->id}}" class="btn btn-primary btn-mini">Edit</a>
                  <a href="{{url('/admin/add-attribute')}}/{{$product->id}}" class="btn btn-success btn-mini">add</a>
                  <a href="{{url('/admin/add-images')}}/{{$product->id}}" class="btn btn-primary btn-mini">image</a>
                  <a rel="{{$product->id}}" rel1="{{url('/admin/delete-product')}}/{{$product->id}}"  <?php /* href="{{url('/admin/delete-product')}}/{{$product->id}}"*/ ?> href="javascript:" class="btn btn-danger btn-mini deletRecord">Delete</a>
                  </div></td>
                </tr>
                
          
            <div id="myModal{{$product->id}}" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>{{$product->product_name}}Full details</h3>
              </div>
              <div class="modal-body">
                <p>Product Id:{{$product->id}} </p>
                <p>category Id:{{$product->category_id}} </p>
                <p>Product Name:{{$product->name}} </p>
                <p>Product Code:{{$product->product_code}} </p>
                <p>Product color:{{$product->product_color}} </p>
                <p>Product price:{{$product->price}} </p>
                <p>Product description:{{$product->description}} </p>
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