<!DOCTYPE html>
<html>

<head>
	<title>Thrift Hub | Admin Panel</title>
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
			background-color: #4CAF50;
			color: white;
			padding: 8px 16px;
			border: none;
			cursor: pointer;
		}

		button:hover {
			background-color: #3e8e41;
		}
	</style>
</head>

<body>
	<h1>Thrift Hub | Admin Panel</h1>
	<ul>
		<li><a href="?view=products">Products</a></li>
		<li><a href="?view=users">Users</a></li>
	</ul>
	<?php
	// Check which view to display
	$view = $_GET['view'] ?? 'products';
	if ($view == 'users') {
		include('users.php');
	} else {
		include('products.php');
	}
	?>
</body>

</html>