/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/



$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});


$(document).ready(function(){




// change price according size
$("#selSize").change(function(){
var idSize=$(this).val();
if(idSize==""){
	return false;
}
$.ajax({
	type:'get',
	url:'/get-product-price',
	data:{idSize:idSize},
	success:function(resp){
		//alert(resp);return false;
		var arr=resp.split('#');
		$("#price").val(arr[0]);	
		$("#getPrice").html("INR"+arr[0]);
		
		if(arr[1]==0){
			$("#cartButton").hide();
			$("#Availability").text("out of stock");
		}
		else
		{
			$("#cartButton").show();
			$("#Availability").text("in stock");
		}

	}
	// ,error:function(){
	// 	alert("error");
	// }
})
});


// change image according slect ige





});





// this code is used for change image
$(document).ready(function(){
$(".changeImage").click(function(){
	var image=$(this).attr('src');
	
	$(".mainImage").attr("src",image);

})
})




// this code is used for zoom image 

$(document).ready(function(){

	var $easyzoom = $('.easyzoom').easyZoom();

	// Setup thumbnails example
	var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

	$('.thumbnails').on('click', 'a', function(e) {
		var $this = $(this);

		e.preventDefault();

		// Use EasyZoom's `swap` method
		api1.swap($this.data('standard'), $this.attr('href'));
	});







	// Setup toggles example
	var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

	$('.toggle').on('click', function() {
		var $this = $(this);

		if ($this.data("active") === true) {
			$this.text("Switch on").data("active", false);
			api2.teardown();
		} else {
			$this.text("Switch off").data("active", true);
			api2._init();
		}
	});
})
$(".demo2").click(function(){
	var image=$(this).attr('href');
	var arr=image.split('#');
	var r=arr[1];
	 var a='/get-product-all/';
	 var c=a+r;
	$.ajax({

		type:'get',
		url:c,
		success:function(resp){
			alert(resp);

		}
		// ,error:function(){
		// 	alert("error");
		// }

	})
	










})
// this is check register form
$(document).ready(function(){

$("#registerform").validate({
	rules:{
		name:{
			required:true,
			minlength:3,
			accept:"[a-zA-Z]+"
		},
		password:{
			required:true,
			minlength:3
		},
		email:{
			required:true,
			email:true,
			remote:"check-email"
	
		}
	},
	messages:{
		name:"Please enter your name",
		password:{
			required:"please provide your password",
			minlength:"your password must be atleast 6 characters long "
		},
		email:{
			required:"please enter your email",
			email:"please enter valid Email",
			remote:"email already exist"
	
		}
	
	}
	
	
	
	})


// this is validation for account 
	$("#accountform").validate({
		rules:{
			name:{
				required:true,
				accept:"[a-zA-Z]+"
			},
			address:{
				required:true,
		
			},
			city:{
				required:true,
			},
			state:{
				required:true,
			},
			country:{
				required:true,
			},
			pincode:{
				required:true,
			},
			mobile:{
				required:true,
				accept:"[0-9]+"
			}
		},
		messages:{
			name:{
				required:"please enter your name",
				accept:"please enter valid name"
			},
			address:{
				required:"please provide your address"
			},
			city:{
				required:"please enter your city"
			},
			state:{
				required:"please enter your state"
			},
			country:{
				required:"please enter your country"
			},
			pincode:{
				required:"please enter your pincode"
			},
			mobile:{
				required:"please enter your mobile",
				accept:"please enter valid mobile number"
			}
		
		}
		
		
		
		})

//ending account code

//password validate
$("#passwordform").validate({
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





$("#billship").click(function(){
	if(this.checked){
		$("#shipping_name").val($("#billing_name").val());
		$("#shipping_address").val($("#billing_address").val());
		$("#shipping_city").val($("#billing_city").val());
		$("#shipping_state").val($("#billing_state").val());
		$("#shipping_country").val($("#billing_country").val());
		$("#shipping_pincode").val($("#billing_pincode").val());
		$("#shipping_mobile").val($("#billing_mobile").val());
		
	}
})














//this is check for login form
	$("#loginform").validate({
		rules:{
			
			password:{
				required:true,
			},
			email:{
				required:true,
				email:true,
				}
		},
		messages:{
			password:{
				required:"please provide your password",
			},
			email:{
				required:"please enter your email",
				email:"please enter valid Email"
			}
		
		}
		
		})	




		//this is check password

		$('#current_pwd').keyup(function(){
			var current_pwd=$("#current_pwd").val();
			
		$.ajax({
				url: "/shopping/check-user-pwd",
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
				},error:function(){
					alert("Error1");
				}

		})
		})











	




	})


	function selectpaymentmethod(){
		if($('#paypal').is(':checked') ||$('#cod').is(':checked')){
			return true;
		}
		else{
			alert("please select payment method");
		}
		return false;
		
			}
		



