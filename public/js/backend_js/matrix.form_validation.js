
$(document).ready(function(){

		$('#current_pwd').keyup(function(){
			var current_pwd=$("#current_pwd").val();
			
		$.ajax({
				url: "/shopping/admin/check-pwd",
                type: 'get',
				data:{current_pwd:current_pwd},
				success:function(resp){
					if(resp=="false"){
						$("#chkPwd").html("<font color='red'>current password is incorrect </font>")
					}
					else
					{
						if(resp=="true"){
							$("#chkPwd").html("<font color='green'>current password is correct </font>")
						}
					}
				} 
				// ,error:function(){
				// 	alert("Error1");
				// }

		})
		});
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#add_category").validate({
		rules:{
			category_name:{
				required:true,
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	//add product validation
	$("#add_product").validate({
		rules:{
			product_name:{
				required:true,
			},
			product_color:{
				required:true,
			},
			product_code:{
				required:true,
			},
			price:{
				required:true,
				number:true,
			},
		image:{
				required:true,
			},
			category_id:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});


	//edit add_product validation
	$("#add_product").validate({
		rules:{
			product_name:{
				required:true,
			},
			product_color:{
				required:true,
			},
			product_code:{
				required:true,
			},
			price:{
				required:true,
				number:true,
			},
			category_id:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
		new_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			},
		confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}

		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});



	$('#delcat').click(function(){
		if(confirm('Are you sure you want to delte this category')){
			return true;
		}
		return false
	})


	$('#delproduct').click(function(){
		if(confirm('Are you sure you want to delte this product')){
			return true;
		}
		return false
	})


	// this is used delete product
	$(".deletRecord").click(function() {

		var id=$(this).attr('rel');
		var deleteFunction=$(this).attr('rel1');
		
		swal({
			title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
		},
		function(){
			window.location.href=deleteFunction;
		}
		)
		return false;
	});

// delete attribute image
	$(".deletImage").click(function() {

		var id=$(this).attr('rel');
		var deleteFunction=$(this).attr('rel1');
		
		swal({
			title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
		},
		function(){
			window.location.href=deleteFunction;
		}
		)
		return false;
	});
//delete here


	// this is used for delte product attribute
	$(".deletAttribute").click(function() {

		var id=$(this).attr('rel');
		var deleteFunction=$(this).attr('rel1');
		
		swal({
			title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
		},
		function(){
			window.location.href=deleteFunction;
		}
		)
		return false;
	});

	

// add remove fields in form






});
$(document).ready(function(){
	var maxFieldLimit = 50; //Input fields increment limitation
	var add_more_button = $('.add_button'); //Add button selector
	var Fieldwrapper = $('.input_field_wrapper'); //Input field wrapper
	var fieldHTML = '<div style="margin-left:180px;"><input type="text" name="sku[]" id="sku" placeholder="SKU" style="width:150px"/>&nbsp;<input type="text" name="size[]" id="size" placeholder="SIZE" style="width:150px"/>&nbsp;<input type="text" name="price[]" id="price" placeholder="PRICE" style="width:150px"/>&nbsp;<input type="text" name="stock[]" id="stock" placeholder="STOCK" style="width:150px"/><a href="javascript:void(0);" class="remove_button" style="padding:0px 10px;" title="Remove field">Remove</a></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(add_more_button).click(function(){ //Once add button is clicked
		if(x < maxFieldLimit){ //Check maximum number of input fields
			x++; //Increment field counter
			$(Fieldwrapper).append(fieldHTML); // Add field html
		}
	});
	$(Fieldwrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});  









});
	

	
