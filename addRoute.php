 <?php
	header("Access-Control-Allow-Origin: *");
	include('inc/db.php');
	session_start();

	if ($_SESSION['User']["Type"] != "admin" && $_SESSION['User']["Type"] != "driver") {
		header('Location: index.php');
	}
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Maršrutai</title>
		<meta name="author" content="Dragis">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i,900" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"><!-- Optional theme -->
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.0/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>

<div class="mainMenuWrapper">
	<div class="menuLeft">
		<a class="mainMenuItem " href="index.php">Maršrutai</a>
		<a class="mainMenuItem  mainMenuItem-active" href="addRoute.php">Pridėti maršrutą</a>
	</div>
	<div class="menuRight">
		<a class="mainMenuItem" href="inc/action-logout.php">Atsijungti</a>
	</div>
</div>

	    <div class="container">
			<div class="addRouteForm">
				
				<div class="inputItem">
					<label for="name" class="inputLabel">Pavadinimas: </label>
					<input type="text" class="inputText" id="name">
				</div>
				<div class="inputItem">
					<label  class="inputLabel">Pasikartojantis: </label>
					<div class="chekboxGroup">
						<div class="inputCheckbox" id="notRepeatable">Ne</div>
						<div class="inputCheckbox inputCheckbox-active" id="repeatable">Taip</div>
					</div>
				</div>
				<div class="inputItem" id="dateSelect" style="display: none;">
					<label class="inputLabel">Data: </label>
					<input class="inputText" id="datepicker" />
				</div>
				<div class="inputItem" id="weekdaySelect">
					<label  class="inputLabel">Savaitės dienos: </label>
					<div class="chekboxGroup">
						<div class="inputCheckbox chekboxWeekday" data-day="1">1</div>
						<div class="inputCheckbox chekboxWeekday" data-day="2">2</div>
						<div class="inputCheckbox chekboxWeekday" data-day="3">3</div>
						<div class="inputCheckbox chekboxWeekday" data-day="4">4</div>
						<div class="inputCheckbox chekboxWeekday" data-day="5">5</div>
						<div class="inputCheckbox chekboxWeekday" data-day="6">6</div>
						<div class="inputCheckbox chekboxWeekday" data-day="7">7</div>
					</div>
				</div>
				<div class="inputItem intputItem-marginBot">
					<label class="inputLabel">Stotelės: </label>
					<!-- <div> -->
					<table class="stopsForm" id="stopsForm">
						<thead>
							<tr>
								<th>Stotelė</th>
								<th>Išvykimo laikas</th>
								<th>Trinti</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input id="stop" type="text"></td>
								<td><input id="time" type="text"></td>
								<td class="deleteRow">X</td>
							</tr>
						</tbody>
					</table>
					<div class="addRow">Pridėti</div>
					<!-- </div> -->
				</div>
				<div class="inputActions">
					<span class="errorMessage"></span>
					<div id="saveRoute">Išsaugoti</div>
				</div>

			</div>
	    </div>

		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.0/combined/js/gijgo.min.js" type="text/javascript"></script>
		<script src="js/scripts_addRoute.js"></script>
	</body>
</html>
