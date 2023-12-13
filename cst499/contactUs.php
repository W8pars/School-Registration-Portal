
<?php require 'master.php';?>

<div class="container text-center">
	<h1> Contact Us</h1>
	<h2> Have something to share with us? </h2>
</div>
<div class="container text-center">
	<form>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="userfNameInput">First Name</label>
				<input type="text" class="form-control" id="fName" placeholder="First Name">
			</div>
			<div class="form-group col-md-6">
				<label for="userlNameInput">Last Name</label>
				<input type="text" class="form-control" id="lName" placeholder="Last Name">
			</div>
		</div>
		<div class="form-group">
			<label for="userMessageInput">Message</label>
			<input type="text" class="form-control" id="userMessageInput" placeholder="Your message to us here!   ">
		</div>
		<button type="submit" class="btn btn-primary"> Send Message! </button>
	</form>

<?php include 'footer.php';?>
