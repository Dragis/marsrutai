 <?php
	header("Access-Control-Allow-Origin: *");
	include('inc/db.php');
	session_start();

	if(empty($_SESSION['userID'])) {
		header('Location: login.php');
	} else {
			// $user_id = $_SESSION['user'];
			// $user_is  = $conn->query("SELECT * FROM users WHERE id='$user_id' LIMIT 1");

			// while ($row = $user_is->fetch_assoc()) {
			// 		$user_name = $row["username"];
			// }
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

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Maršrutai</a>
    </div>
    <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Visi maršrutai <span class="sr-only">(current)</span></a></li>
    	<li><a href="#">Mano maršrutai</a></li>
        <li><a href="#">Pridėti maršrutą</a></li>
        <li><a href="stops.php">Pridėti stotelę</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="inc/action-logout.php">Atsijungti</a></li>
      </ul>
    </div>
  </div>
</nav>


	    <div class="container">
			<div class="routesSearch">

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
