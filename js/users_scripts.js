
$( document ).ready(function() {
	Search = {};
	Stop = {};
	Search.Limit = 10;

	drawRoutes(Search);
});


$( "#Username" ).on( "input", function() {
	Search.Username = $( "#Username" ).val();
	drawRoutes(Search);
});

$( "#limit" ).on( "change", function() {
	Search.Limit = $( "#limit" ).val();
	drawRoutes(Search);
});

$( "#type" ).on( "change", function() {
	Search.Type = $( "#type" ).val();
	drawRoutes(Search);
});


$('body').on('click', '.actionDelete', function () {
	$.ajax({
		url: 'inc/action-deleteUser.php',
		type: 'POST',
		dataType: 'json',
		data: {RouteID: $(this).data("routeid")},
	})
	.always(function(rez) {
		drawRoutes(Search);
	});
});


function drawRoutes(Srch) {
	$.ajax({
		url: 'inc/drawUsers.php',
		type: 'POST',
		dataType: 'json',
		data: {Search: Srch},
	})
	.always(function(rez) {
		$("#usersHolder").html(rez);
	});
}

$('#datepicker').datepicker({
	language: 'lt',
	format: "yyyy-mm-dd",
});