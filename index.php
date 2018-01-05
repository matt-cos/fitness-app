<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	header("location: login.php");
	exit;
}

// Include config file
require_once 'config.php';

// echo "<table>"; // start a table tag in the HTML

// while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
// echo "<tr><td>" . $row['run_username'] . "</td><td>" . $row['distance'] . "</td><td>" . $row['run_time'] . "</td></tr>";  //$row['index'] the index here is a field name
// }

// echo "</table>"; //Close the table in HTML

// mysql_close(); //Make sure to close out the database connection
?>
 <!-- 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Front End</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
			body{ font: 14px sans-serif; text-align: center; }
		</style>
	</head>
	<body>
		<div class="page-header">
			<h1>Hi, <b><?php // echo $_SESSION['username']; ?></b>. this is the front end of the site</h1>
			<p>data will be displayed here</p>
		</div>
		<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
	</body>
</html>
 -->