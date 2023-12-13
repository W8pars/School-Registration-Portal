<?php
include 'master.php';
?>

<div class="container text-center">
	<h1> Welcome to the Login Page </h1>
</div>
<div class="container text-center">
	<form action="includes/login.inc.php" method="POST">
		<div class="form-group">
    			<label for="email">Email address</label>
   			<input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
  		</div>
  		<div class="form-group">
    			<label for="password">Password</label>
    			<input type="password" name="password" class="form-control" id="password" placeholder="Password">
  		</div>
  		<button type="submit" name="submit" class="btn btn-primary">Login</button>
	</form>

<?php include 'footer.php';?>