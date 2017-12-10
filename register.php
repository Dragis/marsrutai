 <?php
	header("Access-Control-Allow-Origin: *");
	include('inc/db.php');
	session_start();
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
	            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
	            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
	            <p id="profile-name" class="profile-name-card"></p>
	            <form class="form-signin">
	                <span id="reauth-email" class="reauth-email"></span>
	                <input id="username" type="text" id="inputEmail" class="form-control" placeholder="Vardas" required autofocus>
	                <input id="password" type="password" id="inputPassword" class="form-control" placeholder="Slaptažodis" required>

					<div class="form-group btn-group" role="group"> 
						<button type="button" id="selectUserType-passenger" class="btn btn-default btn-primary" value="passenger" >Keleivis</button> 
						<button type="button" id="selectUserType-driver" class="btn btn-default" value="driver" >Vežėjas</button> 
					</div>
		
					<div id="errorMessage"></div>
	                <button id="action-register" class="btn btn-lg btn-primary btn-block btn-signin" type="button">Registruotis</button>
	            </form>
	            <a href="login.php" class="forgot-password">Prisijungti</a>
	        </div>
	    </div>


		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="js/scripts_login.js"></script>
	</body>
</html>