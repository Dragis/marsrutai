

$( document ).ready(function() {
  user = {};
  user.type = "passenger";


  $( "#selectUserType-passenger" ).on( "click", function() {
    $("#selectUserType-driver").removeClass("btn-primary");
    $("#selectUserType-passenger").addClass("btn-primary");
  	user.type = "passenger";
  });

  $( "#selectUserType-driver" ).on( "click", function() {
    $("#selectUserType-driver").addClass("btn-primary");
    $("#selectUserType-passenger").removeClass("btn-primary");
    user.type = "driver";
  });

  $( "#action-register" ).on( "click", function() {
  	user.username = $("#username").val();
  	user.password = $("#password").val();

	$.ajax({
		url: 'inc/action-register.php',
		type: 'POST',
		dataType: 'json',
		data: {user: user},
	})
	.always(function(rez) {
		console.log(rez);
		console.log(rez.responseText);
		if (rez.success) {
			window.location.href = 'login.php';
		} else {
			$("#errorMessage").html(rez.error);
		}
	});

  });

  $( "#action-login" ).on( "click", function() {
  	user.username = $("#username").val();
  	user.password = $("#password").val();
  	console.log(user);
	$.ajax({
		url: 'inc/action-login.php',
		type: 'POST',
		dataType: 'json',
		data: {user: user},
	})
	.always(function(rez) {
		console.log(rez);
		if (rez.success) {
			window.location.href = 'index.php';
		} else {
			$("#errorMessage").html(rez.error);
		}
	});

  });



});

