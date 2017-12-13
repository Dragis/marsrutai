 <?php
	header("Access-Control-Allow-Origin: *");
	include('inc/db.php');
	session_start();

	if(empty($_SESSION['User'])) {
		header('Location: login.php');
	}
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Maršrutai</title>
		<meta name="author" content="Dragis">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Poppins:400,500,600,700" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"><!-- Optional theme -->
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.0/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>

<div class="mainMenuWrapper">
	<div class="menuLeft">
		<a class="mainMenuItem  mainMenuItem-active" href="index.php">Maršrutai</a>

				<?php
				if ($_SESSION['User']["Type"] == "admin" || $_SESSION['User']["Type"] == "driver") {
					echo '<a href="addRoute.php" type="button" class="mainMenuItem">Pridėti maršrutą</a>';
				}
				?>

			</div>
	<div class="menuRight">
		<a class="mainMenuItem" href="inc/action-logout.php">Atsijungti</a>
	</div>
</div>

	    <div class="container">
			<div class="routesSearch">
				<div class="searchItem">
					<input class="SearchField" id="searchFrom" type="text" name="Search" placeholder="Įlipimas">
					<div class="SearchButton"><span class="glyphicon glyphicon-search"></span></div>
				</div>
				<div class="searchItem">
					<input class="SearchField" id="searchTo" type="text" name="Search" placeholder="Išlipimas">
					<div class="SearchButton"><span class="glyphicon glyphicon-search"></span></div>
				</div>
				<div class="searchItem">
					<input class="SearchField" id="searchDriver" type="text" name="Search" placeholder="Vairuotojas">
					<div class="SearchButton"><span class="glyphicon glyphicon-search"></span></div>
				</div>
				<div class="searchItem">
					<input class="SearchField" placeholder="Data" id="datepicker" />
				</div>
				<div class="searchItem">					
					<select class="SearchField" id="limit" placeholder="Rezultatai">
					  <option value="10">10</option>
					  <option value="20">20</option>
					  <option value="50">50</option>
					  <option value="100">100</option>
					</select>
				</div>


			</div>

			<div id="routesHolder" class="routesHolder">
				<div class="routeWrapper">
				</div>
			</div>
	    </div>

		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.7.0/combined/js/gijgo.min.js" type="text/javascript"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
