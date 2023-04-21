<!DOCTYPE html>
<html>

<head>
	<title>Thrift Hub | Admin Panel</title>
	<?php
	include 'navbar.php';
	?>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		button {
			background-color: #f76707;
			color: white;
			padding: 8px 16px;
			border: none;
			cursor: pointer;
		}

		button:hover {
			background-color: #e66006;
		}
	</style>
</head>

<body>
<nav>
		<div>
			<a href="homepage.php" id="logo"><img src="img/logo.png" alt="logo" height="60"></a>
			<span id="tagline">Steals and Deals</span>
		</div>
		<div>
			<a href="about.html">About Us</a>
			<a href="contactus.html">Contact Us</a>
			<a href="?view=products">Products</a>
			<a href="?view=users">Users</a>
			<a href="logout.php">Logout</a>
			
			<!-- <button id="login" onclick="gotologin()">Login/Register</button> -->
            <script>
                function gotologin(){
                    window.location.href = "login.php";
                }
            </script>
		</div>
	</nav>
	
	<?php
	// Check which view to display
	$view = $_GET['view'] ?? 'products';
	if ($view == 'users') {
		?>
		<?php
		include('users.php');
	} else {
		include('products.php');
	}
	?>
</body>

</html>