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
                  <th>Page Id</th>
                  <th>title</th>
                  <th>url </th>
                  <th>Meta Title</th>
                  <th>Meta Description</th>
                  <th>Meta Keyword </th>
                  <th>status</th>
                  <th>created on</th>
                
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($cmspages as $product)
                <tr class="gradeX">
                
                  <td>{{$product->id}}</td>
                  <td>{{$product->title}}</td>
                  <td>{{$product->url}}</td>
                  <td>{{$product->meta_title}}</td>
                  <td>{{$product->meta_description}}</td>
                  <td>{{$product->meta_keyword}}</td>
                  <td>@if($product->status==1)Active @else inActive @endif</td>
                  <td>{{$product->created_at}}</td>
            
                  
                  <td class="center"><a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">view</a>
                  <a href="{{url('/admin/edit-cms-page')}}/{{$product->id}}" class="btn btn-primary btn-mini">Edit</a>
                  <a href="{{url('/admin/delete-cms_page')}}/{{$product->id}}" class="btn btn-danger btn-mini">delete</a>
          
        
                  </div></td>
                </tr>





                <div id="myModal{{$product->id}}" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>{{$product->product_name}}Full details</h3>
              </div>
              <div class="modal-body">
                <p>Id: {{$product->id}} </p>
                <p>title Id: {{$product->title}} </p>
                <p>url: {{$product->url}} </p>
                <p>status: @if($product->status==1)Active @else inActive @endif </p>
                <p>description: {{$product->description}} </p>
                <p>created_at: {{$product->created_at}} </p>
                
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