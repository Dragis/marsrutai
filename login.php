 <?php
	header("Access-Control-Allow-Origin: *");
	include('inc/db.php');
	session_start();
	$_SESSION['userID'] = "";
	if(!empty($_SESSION['User'])) {
		header('Location: index.php');
	} 
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Maršrutai</title>
		<meta name="description" content="Aida - Crative Data Analyst">
		<meta name="author" content="Dragis">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Poppins:400,500,600,700" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"><!-- Optional theme -->
		<link rel="stylesheet" href="css/login-styles.css">
	</head>
	<body>

	    <div class="container">
	        <div class="card card-container">
	            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
	            <form class="form-signin">
	                <span id="reauth-email" class="reauth-email"></span>
	                <input type="text" id="username" class="form-control" placeholder="Vardas">
	                <input type="password"  id="password" class="form-control" placeholder="Slaptažodis" >
					<div id="errorMessage"></div>

	                <button class="btn btn-lg btn-primary btn-block btn-signin" id="action-login"  type="button">Prisijungti</button>
	            </form>
	            <a href="register.php" class="forgot-password">Registruotis</a>
	        </div>
	    </div>

		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="js/scripts_login.js"></script>
	</body>
</html>