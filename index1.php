<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<style type="text/css">
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
			background: linear-gradient(to bottom, #91a8d0, #f7cac9);
		}

		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100%;
		}

		h1 {
			font-size: 36px;
			margin-bottom: 20px;
			text-align: center;
		}

		a {
			display: inline-block;
			padding: 10px 20px;
			margin-top: 20px;
			background-color: #f7cac9;
			color: #FFF;
			text-decoration: none;
			border-radius: 5px;
			font-size: 16px;
			font-weight: bold;
			transition: all 0.3s ease-in-out;
		}

		a:hover {
			background-color: #91a8d0;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Welcome, <?php echo $user_data['user_name']; ?>!</h1>
		<a href="logout.php">Logout</a>
	</div>
</body>
</html>
