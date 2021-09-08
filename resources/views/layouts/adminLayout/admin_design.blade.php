<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="{{asset('/js/jquery/jquery.js')}}"></script>
<link rel="stylesheet" href="{{asset('public/css/backend_css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend_css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend_css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend_css/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend_css/select2.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend_css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend_css/matrix-media.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />

<link href="{{asset('public/fonts/backend_fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('public/css/backend_css/jquery.gritter.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<!--Header-part-->

<!--close-Header-part--> 

@include('layouts.adminLayout.admin_header');
<!--top-Header-menu-->

<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
@include('layouts.adminLayout.admin_sidebar');
<!--sidebar-menu-->

@yield('content')

<!--end-main-container-part-->

<!--Footer-part-->

@include('layouts.adminLayout.admin_footer');

<!--end-Footer-part-->


<script src="{{asset('public/js/backend_js/jquery.min.js')}}"></script> 
<script src="{{asset('public/js/backend_js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('public/js/backend_js/bootstrap.min.js')}}"></script> 
<script src="{{asset('public/js/backend_js/jquery.uniform.js')}}"></script> 
<script src="{{asset('public/js/backend_js/select2.min.js')}}"></script> 
<script src="{{asset('public/js/backend_js/jquery.validate.js')}}"></script> 
<script src="{{asset('public/js/backend_js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('public/js/backend_js/matrix.js')}}"></script> 
<script src="{{asset('public/js/backend_js/matrix.form_validation.js')}}"></script>
<script src="{{asset('public/js/backend_js/matrix.tables.js')}}"></script> 
<script src="{{asset('public/js/backend_js/matrix.interface.js')}}"></script> 
<script src="{{asset('public/js/backend_js/matrix.popover.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


</body>
</html>
