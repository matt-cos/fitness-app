<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	header("location: login.php");
	exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welcome</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
			body{ font: 14px sans-serif; text-align: center; }
		</style>
	</head>
	<body>
		<div class="page-header">
			<h1>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to our site.</h1>
			<p>if we put another form here that posts to the "runs" table, and have the username automatically get posted too, we can have all users submitted runs in one table. then we can display only the ones approrpiate for the logged in user</p>
		</div>
		<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
	</body>
</html>
