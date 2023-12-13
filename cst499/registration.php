<?php include "master.php"; ?>
<div class="container text-center">
	<h1> Welcome to the Registration Page </h1>
</div>
<div class="container text-right">
	<h2> Please Enter Your Information Below to Register.</h2>

<form action="includes/register.inc.php" method="post">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
		</div>
		<div class="form-group col-md-6">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Must be School Email">
		</div>
		<div class="form-group col-md-6">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
		<div class="form-group col-md-6">
			<label for="username">Username</label>
			<input type="username" class="form-control" id="username" name="username" placeholder="Username">
		</div>
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
	</div>
    <div class="form-group">
		<label for="phone">Phone</label>
		<input type="text" class="form-control" id="phone" name="phone" placeholder="7067895766">
	</div>
    <div class="form-group">
		<label for="ssn">SSN</label>
		<input type="text" class="form-control" id="ssn" name="ssn" placeholder="244444444">
	</div>
    <button type="submit" name="submit" id="submit" class="btn btn-primary"  value="Submit">Submit</button>
</form>
</div>
<?php include 'footer.php';?>