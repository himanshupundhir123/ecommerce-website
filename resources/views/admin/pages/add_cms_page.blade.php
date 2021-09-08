@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">category</a> <a href="#" class="current">add cms page</a> </div>
    <h1>add cms page</h1>
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
            <h5>add cms page</h5>
          </div>
          <div class="widget-content nopadding">
          <form class="form-horizontal"  method="post" action="{{url('admin/add-cms-page')}}" name="add_cms_page" id="add_cms_page" novalidate="novalidate" enctype="multipart/form-data">
            {{ csrf_field()}}
            

            <div class="control-group">

            

              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="text" name="title" id="title">
                </div>
              </div>
            
              <div class="control-group">
                <label class="control-label">cms page url</label>
                <div class="controls">
                  <input type="text" name="url" id="url">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">description</label>
                <div class="controls">
                  <input type="text" name="description" id="description">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Meta Title</label>
                <div class="controls">
                  <input type="text" name="meta_title" id="meta_title">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">description</label>
                <div class="controls">
                  <input type="text" name="meta_description" id="meta_description">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">keyword</label>
                <div class="controls">
                  <input type="text" name="meta_keyword" id="meta_keyword">
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
