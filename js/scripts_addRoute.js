
$( document ).ready(function() {
	Days = {};
	Repeatable = true;
	$("#dateSelect").slideUp(0);

	$( ".chekboxWeekday" ).on( "click", function() {
		$(this).toggleClass("inputCheckbox-active");
		if ($(this).hasClass('inputCheckbox-active')) {
		    Days[$(this).data("day")] = true;
		} else {
		    Days[$(this).data("day")] = false;
		}
	});

	$( "#repeatable" ).on( "click", function() {
		$("#weekdaySelect").slideDown("fast");
		$("#dateSelect").slideUp("fast");
		$( "#repeatable" ).addClass('inputCheckbox-active');
		$( "#notRepeatable" ).removeClass('inputCheckbox-active');
		Repeatable = true;
	});

	$( "#notRepeatable" ).on( "click", function() {
		$("#weekdaySelect").slideUp("fast");
		$("#dateSelect").slideDown("fast");
		$( "#repeatable" ).removeClass('inputCheckbox-active');
		$( "#notRepeatable" ).addClass('inputCheckbox-active');
		Repeatable = false;
	});

    $("#stopsForm").on('click','.deleteRow',function(){
        $(this).parent().remove();
    });

	$( ".addRow" ).on( "click", function() {
		$(".stopsForm > tbody").append('<tr><td><input id="stop" type="text"></td><td><input id="time" type="text"></td><td class="deleteRow">X</td></tr>');
	});

	$( "#saveRoute" ).on( "click", function() {
		Route = {};
		Route.Days = Days;
		Route.Repeatable = Repeatable;
		Route.Name = $("#name").val();
		Route.Date = $("#datepicker").val();
		Stops = ";";
		Times = ";";
		error = "";

		$('#stopsForm > tbody > tr').each(function() {
			if ($(this).find("input#stop").val())
				Stops += $(this).find("input#stop").val()+";";
			else
				error = "Visi laukai turi būti užpildyti";

			if ($(this).find("input#time").val())
				Times += $(this).find("input#time").val()+";";
			else
				error = "Visi laukai turi būti užpildyti";

		});

		if (error != "")
		{
			$(".errorMessage").html(error);
		} else {
			Route.Stops = Stops;
			Route.Times = Times;
			$(".errorMessage").html("");

			$.ajax({
				url: 'inc/action-addRoute.php',
				type: 'POST',
				dataType: 'json',
				data: {Route: Route},
			})
			.always(function(rez) {
				if (rez.Success == true)
					window.location.href = 'index.php';
				else
					$(".errorMessage").html(rez.error);
			});
		}

		
		console.log(Route);
	});



	$('#datepicker').datepicker({
	    language: 'lt',
	    format: "yyyy-mm-dd",
	});

});