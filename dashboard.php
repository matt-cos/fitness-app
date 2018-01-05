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
 
// Define variables and initialize with empty values
$distance = $run_time = "";
$distance_err = $run_time_err = "";

$get_current_username =  $_SESSION['username'];
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
	// Validate distance
	if(empty(trim($_POST["distance"]))){
		$distance_err = "Please enter your distance.";
	} else {
		$distance = trim($_POST['distance']);
		// // Close statement
		// mysqli_stmt_close($stmt);
	}

	// Validate run time
	if(empty(trim($_POST['run_time']))){
		$run_time_err = "Please enter your run time.";     
	} else {
		$run_time = trim($_POST['run_time']);
	}

	
	// Check input errors before inserting in database
	if(empty($distance_err) && empty($run_time_err)){

		
		// Prepare an insert statement
		$sql = "INSERT INTO runs (run_username, distance, run_time) VALUES ('$get_current_username', '$distance', '$run_time')";
		 
		// if($stmt = mysqli_prepare($link, $sql)){
		// 	// Bind variables to the prepared statement as parameters
		// 	mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
			
		// 	// Set parameters
		// 	$param_username = $username;
		// 	$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			
		// 	// Attempt to execute the prepared statement
		// 	if(mysqli_stmt_execute($stmt)){
		// 		// Redirect to login page
		// 		header("location: login.php");
		// 	} else{
		// 		echo "Something went wrong. Please try again later.";
		// 	}
		// }

		if (mysqli_query($link, $sql)) {
			echo "New record created successfully.";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		 
		// Close statement
		// mysqli_stmt_close($stmt);
	}
	
	// Close connection
	mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
			body{ font: 14px sans-serif; text-align: center; }
			.wrapper{ width: 350px; padding: 20px; }
		</style>
	</head>
	<body>
		<div class="page-header">
			<h1>Hi, <b><?php echo $get_current_username; ?></b>. Welcome to your dashboard.</h1>
			<h2>
				TODO:
				remove config.php from git
				remove enclosing folder
			</h2>
		</div>

		<div class="wrapper">
			<h2>Add a run</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<label>Distance:<sup>*</sup></label>
					<input type="text" name="distance" class="form-control" value="<?php echo $distance; ?>">
					<span class="help-block"><?php echo $distance_err; ?></span>
				</div>    
				<div class="form-group <?php echo (!empty($run_time_err)) ? 'has-error' : ''; ?>">
					<label>Total Time:<sup>*</sup></label>
					<input type="text" name="run_time" class="form-control" value="<?php echo $run_time; ?>">
					<span class="help-block"><?php echo $run_time_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Submit">
					<input type="reset" class="btn btn-default" value="Reset">
				</div>
			</form>
		</div>    

		<p><a href="./" class="btn btn-primary">View Your Progress</a></p>
		<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
	</body>
</html>

