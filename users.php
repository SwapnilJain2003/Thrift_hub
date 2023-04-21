<?php
	// Connect to database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "thrift_hub";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Handle user deletion
	if (isset($_POST['delete_user'])) {
		$user_id = $_POST['user_id'];
		$sql = "DELETE FROM users WHERE id=$user_id";
		if ($conn->query($sql) === TRUE) {
			echo "User deleted successfully";
		} else {
			echo "Error deleting user: " . $conn->error;
		}
	}

	// Retrieve users from database
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<h2>Users</h2>";
		echo "<table>";
		echo "<tr><th>Username</th><th>user_type</th><th>Email</th><th>Phone Number</th><th>First Name</th><th>Last Name</th><th>Account Created</th><th>Action</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["username"] . "</td>";
			echo "<td>" . $row["user_type"] . "</td>";
			echo "<td>" . $row["email"] . "</td>";
			echo "<td>" . $row["phone_number"] . "</td>";
			echo "<td>" . $row["fname"] . "</td>";
			echo "<td>" . $row["lname"] . "</td>";
			echo "<td>" . $row["user_time"] . "</td>";
			echo "<td>";
			echo "<form method='post'>";
			echo "<input type='hidden' name='user_id' value='" . $row["username"] . "'>";
			echo "<button type='submit' name='delete_user'>Delete</button>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "No users found";
	}
	$conn->close();
?>
