
$( document ).ready(function() {
	Search = {};
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