<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
	<div class="jumbotron">
		<div class="container text-center">
			<h1> Student Registration System</h1>
		</div>
		<div class="container text-right">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  			<a class="navbar-brand" href="#"></a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigationBar" aria-controls="navigationBar" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  			</button>

			<div class="collapse navbar-collapse" id="navigationBar">
				<div>
					<ul class="menu-main">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home </a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contactUs.php">Contact Us </a>
						</li>
						<?php 
						// update navbar for logged in user or guest user
						if(isset($_SESSION["userid"])){
						?>
						<li class="nav-item"><a class="nav-link" href="profile.php">Profile: <?php echo $_SESSION["email"]; ?></a></li>
						<li class="nav-item"><a class="nav-link" href="courseListings.php" class="header-login-a">All Courses</a></li>
						<li class="nav-item"><a class="nav-link" href="includes/logout.inc.php" class="header-login-a">Log Out</a></li>

						<?php
						}
						else { // show these onese if not logged in
						?>
						<li class="nav-item"><a class="nav-link" href="registration.php">Register</a></li>
						<li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>
						<?php 
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
		</div>
	</div>


