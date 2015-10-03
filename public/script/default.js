$(document).ready(function(){

	var logInFormStatus = false;
	var regFormStatus = false;
	var groupStatus = false;

	$(window).scroll(function(){
		if ($(window).scrollTop() > 50) {
			$(".navbar").addClass('navbar-fixed-top');
			$("#login-field").slideUp("slow");			
			$("#register-field").slideUp("slow");
			logInFormStatus = false;
			regFormStatus = false;
		}
		if ($(window).scrollTop() < 50) {
			$(".navbar").removeClass('navbar-fixed-top');
		}
	});

	$("#login-toggle").click(function(){
		$("#login-field").slideToggle("slow");
		logInFormStatus = true;
		if(regFormStatus) {
			$("#register-field").slideUp("slow");
			regFormStatus = false;
		}
	});

	$("#register-toggle").click(function(){
		$("#register-field").slideToggle("slow");
		regFormStatus = true;
		if(logInFormStatus) {{
			$("#login-field").slideUp("slow");
			logInFormStatus = false;
		}}
	});


	$("#group-panel").click(function(){
		$("#group-field").slideToggle("slow");
//		groupStatus = true;
	});
/*
	$(window).resize(function(){
		if($(window).width() < 975){
			$(".profile-icon").hide();
			$(".group-icon").hide();
		}
		else{
			$(".profile-icon").show();
			$(".group-icon").show();
		}	
	});
*/
	/*$(".user-group").click(function(){
		 //If kaya ng by whole na i-load
		$("#group-feed").load("/script/sample.html")

		//$("#welcome-note").load("/script/sample.html")
		$('#welcome-note').html('<h2>This is something here.</h2>');
		//$(".feed-text").load("/script/sample2.txt")
	    $('.feed-text').html('This is some text that I just typed right now!');
    });

	$("#inbox-panel").click(function(){
		 //If kaya ng by whole na i-load
		$("#group-feed").load("/script/sample2.html")

		$("#welcome-note").load("/script/sample2.html")
		$(".feed-text").load("/script/sample.txt")
	});	*/
	
	$("#valid").click(function(){
		$("#dimmer").fadeToggle("fast");
		$("#pop-up").toggle("slow");
	});

/*
	$("#firstName").val("Angelo");
	$("#middleName").val("Capa");
	$("#lastName").val("Guiam");
	$("#email").val("asdfg@gmail.com");
	$("#username").val("asdfg@gmail.com");
	$("#password").val("asdfg@gmail.com");
	$("#retypePassword").val("asdfg@gmail.com");
	$("#studentNumber").val("2013-09868");
*/

});