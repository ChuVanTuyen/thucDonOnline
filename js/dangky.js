$(document).ready(function() {
	var email, username, password, repassword;
	var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	email = $("[name='email']").val();	
	$("#email").change(function(event) {
		if(regex.test(email)){
			$(".email_mess").show();
			$("#email").addClass('form_border-red');
		}
	});
	$("#email").keydown(function(event) {
		$("[name='username']").removeClass('form_border-red');
		$(".email_mess").hide();
	});
});