<?php
include("connection.php");
if(isset($_POST['Submit'])) {
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$state = $_POST['sname'];
	$country = $_POST['cname'];
	$error = array();
	if(empty($firstname))
		$error['ac'] = "Enter Firstname";
	else if(empty($lastname))
		$error['ac'] = "Enter Lastname";
	else if(empty($username))
		$error['ac'] = "Enter Username";
	else if(empty($email))
		$error['ac'] = "Enter Email Address";
	else if($country=="")
		$error['ac'] = "Select Your Country";
	else if($state=="")
		$error['ac'] = "Select Your State";
	if(count($error) == 0) {
		$query1 = "SELECT * FROM studentdata where username = '$username' or email = '$email'";
		$qq = mysqli_query($connect, $query1);
		$row = mysqli_fetch_array($qq); 
		if(mysqli_num_rows($qq) == 0) {
 			$query = "INSERT INTO studentdata(firstname,lastname,username,email,state,country)VALUES('$firstname','$lastname','$username','$email','$state','$country')";
 			$result = mysqli_query($connect, $query);
 			if($result) {
 				echo "<script>alert('You have successfully applied')</script>";
 			//header("Location: login.php");
 			}
 			else{
 				echo "<script>alert('Failed')</script>";
 			}
 		}
 		else {
 			echo "<script>alert('Enter Unique Username or Email')</script>";
 		}
 	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="validation.js"></script>
</head>
<body>
	<?php
	include 'navbar.php';?>
	<div class="container">
		<h2 class="text-center text-info">Registration Form</h2>
		<form method="post" name="RegForm" action="login.php" onsubmit="return validate();">
			<div class="form-group">
				<label><h3>Firstname</h3></label>
				<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" id="f">
			</div>
			<div class="form-group">
				<label><h3>Lastname</h3></label>
				<input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter Lastname" id="l">
			</div>
			<div class="form-group">
				<label><h3>Username</h3></label>
				<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" id="u">
			</div>
			<div class="form-group">
				<label><h3>Email</h3></label>
				<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Your Email" id="e">
			</div>
			<div class="form-group">
				<label><h3>State</h3></label>
				<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Your State" id="s">
			</div>
			<div class="form-group">
				<label><h3>Country</h3></label>
				<input type="text" name="cname" class="form-control" autocomplete="off" placeholder="Enter Your Country" id="c">
			</div>
			<input type="submit" name="Submit" value="Send" class="btn btn-success">
			<input type="reset" name="Reset" value="Clear" class="btn btn-danger">
		</form>
	</div>
</body>
</html>