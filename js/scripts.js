
$( document ).ready(function() {
	Search = {};
	Stop = {};
	Search.Limit = 10;

	drawRoutes(Search);
});


$( "#searchFrom" ).on( "input", function() {
	Search.searchFrom = $( "#searchFrom" ).val();
	drawRoutes(Search);
});

$( "#searchTo" ).on( "input", function() {
	Search.searchTo = $( "#searchTo" ).val();
	drawRoutes(Search);
});

$( "#searchDriver" ).on( "input", function() {
	Search.searchDriver = $( "#searchDriver" ).val();
	drawRoutes(Search);
});

$( "#datepicker" ).on( "change", function() {
	Search.Date = $( "#datepicker" ).val();
	drawRoutes(Search);
});

$( "#limit" ).on( "change", function() {
	Search.Limit = $( "#limit" ).val();
	drawRoutes(Search);
});

$('body').on('click', '.SingleStop', function () {
	if (Stop.StopID != $(this).data("stopid")) {
		Stop.RouteID = $(this).data("routeid");
		Stop.StopID = $(this).data("stopid");

		$(".Sliden").slideUp('fast');
		$(".Sliden").removeClass('Sliden');
		$(".SingleStop-active").removeClass('SingleStop-active');

		$("#Aplication-"+Stop.RouteID).slideDown('fast');
		$("#Aplication-"+Stop.RouteID).addClass('Sliden');
		$(this).addClass('SingleStop-active');
	} else {
		Stop.RouteID = 0;
		Stop.StopID = 0;
		Stop.Baggage = 0;
		$(".Sliden").slideUp('fast');
		$(".Sliden").removeClass('Sliden');
		$(".SingleStop-active").removeClass('SingleStop-active');
	}
});

$('body').on('click', '.SingleStop-driver', function () {
	if (Stop.StopID != $(this).data("stopid")) {
		Stop.RouteID = $(this).data("routeid");
		Stop.StopID = $(this).data("stopid");

		$(".Sliden").slideUp('fast');
		$(".Sliden").removeClass('Sliden');
		$(".SingleStop-active").removeClass('SingleStop-active');

		$("#Aplication-"+Stop.RouteID).slideDown('fast');
		$("#Aplication-"+Stop.RouteID).addClass('Sliden');
		$(this).addClass('SingleStop-active');

		$.ajax({
			url: 'inc/showPassangers.php',
			type: 'POST',
			dataType: 'json',
			data: {Stop: Stop},
		})
		.always(function(rez) {
			// if (rez.Passangers != "")
			console.log(rez.Passangers);
			console.log($("#Application-"+Stop.StopID));
			if (rez.Passangers == "")
				$(".Sliden").html("Nieko nerasta");
			else
				$(".Sliden").html(rez.Passangers);
			// else
			// 	$(".Sliden .ApplicationMessage").html("Šiuo laikus niekas neužsiregistravęs");
		});

	} else {
		Stop.RouteID = 0;
		Stop.StopID = 0;
		$(".Sliden").slideUp('fast');
		$(".Sliden").removeClass('Sliden');
		$(".SingleStop-active").removeClass('SingleStop-active');
	}
});

$('body').on('click', '.AplicationRegister', function () {

	if (Stop.StopID != $(this).data("stopid") && Stop.RouteID != $(this).data("routeid")) {
		$("#Aplication-"+Stop.RouteID).slideDown('fast');
		Stop.Baggage = $("#Aplication-"+Stop.RouteID+" .Baggage").val();
		console.log(Stop);

		$.ajax({
			url: 'inc/applyForRoute.php',
			type: 'POST',
			dataType: 'json',
			data: {Stop: Stop},
		})
		.always(function(rez) {
			console.log(rez);
			if (rez.Success)
				$(".Sliden .ApplicationMessage").html("Sėkmingai užregistruota");
			else
				$(".Sliden .ApplicationMessage").html(rez.Error);
		});
	}
});



function drawRoutes(Srch) {
	$.ajax({
		url: 'inc/drawRoutes.php',
		type: 'POST',
		dataType: 'json',
		data: {Search: Srch},
	})
	.always(function(rez) {
		$("#routesHolder").html(rez);
	});
}

$('#datepicker').datepicker({
	language: 'lt',
	format: "yyyy-mm-dd",
});