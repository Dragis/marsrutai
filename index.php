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
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>

<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Maršrutai</a>
    </div>
    <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Maršrutai</a></li>
        <li><a href="stops.php">Stotelės</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="inc/action-logout.php">Atsijungti</a></li>
      </ul>
    </div>
  </div>
</nav> -->

<div class="mainMenuWrapper">
	<div class="menuLeft">
		<a class="mainMenuItem  mainMenuItem-active" href="index.php">Maršrutai</a>
		<a class="mainMenuItem" href="index.php">Stotelės</a>
	</div>
	<div class="menuRight">
		<a class="mainMenuItem" href="inc/action-logout.php">Atsijungti</a>
	</div>
</div>

	    <div class="container">
			<div class="routesSearch">
				<div class="searchItem">
					<input class="SearchField" type="text" name="Search" placeholder="Pradinė stotelė">
					<div class="SearchButton"><span class="glyphicon glyphicon-search"></span></div>
				</div>
				<div class="searchItem">
					<input class="SearchField" type="text" name="Search" placeholder="Galinė stotelė">
					<div class="SearchButton"><span class="glyphicon glyphicon-search"></span></div>
				</div>
				<div class="searchItem">
					<input class="SearchField" type="text" name="Search" placeholder="Vairuotojas">
					<div class="SearchButton"><span class="glyphicon glyphicon-search"></span></div>
				</div>

				<?php
				if ($_SESSION['User']["Type"] == "admin" || $_SESSION['User']["Type"] == "driver") {
					echo '<a href="addRoute.php" type="button" class="btn btn-primary myBtn">Pridėti</a>';
				}

				?>
			</div>

			<div class="routesHolder">

			</div>
	    </div>

		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
