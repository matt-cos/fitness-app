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

$current_username =  $_SESSION['username'];

$sql = "SELECT * FROM runs WHERE run_username = '$current_username'";
$result = mysqli_query($link, $sql);
$run_data = "";
$pace = "";

if (mysqli_num_rows($result) > 0) {
	$run_data .= "<table>";
		$run_data .= "<tbody>";
			
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			// $pace = $row["run_time"] / $row["distance"];
			// $pace = TIME_TO_SEC($row["run_time"]);
			// $pace = strtotime( $row["run_time"] );
			// $pace = date( 'Y-m-d H:i:s', $row["run_time"] );
			$pace = "WORKING ON THIS";
			$run_data .= "<tr>";
				// $run_data .= "<td>Username: " . $row["run_username"]. "</td>";
				$run_data .= "<td>Distance: " . $row["distance"] . "</td>";
				$run_data .= "<td>Time: " . $row["run_time"] . "</td>";
				$run_data .= "<td>Pace: " . $pace . "</td>";
			$run_data .= "</tr>";
		}

		$run_data .= "</tbody>";
	$run_data .= "</table>";

} else {
	echo "0 results, time to start running";
}

mysqli_close($conn);

?>
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Front End</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
			body{ font: 14px sans-serif; text-align: center; }
			td {
				border: 1px solid #000;
				padding: 10px;
			}
		</style>
	</head>
	<body>
		<div class="page-header">
			<h1>Hi, <b><?php echo $_SESSION['username']; ?></b>. this is the front end of the site</h1>
			<p>here is all your run data:</p>
			<?php echo $run_data ?>
		</div>
		<p><a href="dashboard.php" class="btn btn-success">Add a Run</a></p>
		<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
	</body>
</html>



