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

	// Handle product deletion
	if (isset($_POST['delete_product'])) {
		$product_id = $_POST['product_id'];
		$sql = "DELETE FROM product WHERE product_id=$product_id";
		if ($conn->query($sql) === TRUE) {
			echo "Product deleted successfully";
		} else {
			echo "Error deleting product: " . $conn->error;
		}
	}

	// Retrieve products from database
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<h2>Products</h2>";
		echo "<table>";
		echo "<tr><th>ID</th><th>Name</th><th>Category ID</th><th>Description</th><th>Price</th><th>Seller</th><th>Brand</th><th>Size</th><th>Action</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" .
			$row["product_id"] . "</td>";
			echo "<td>" . $row["product_name"] . "</td>";
			echo "<td>" . $row["category_id"] . "</td>";
			echo "<td>" . $row["description"] . "</td>";
			echo "<td>" . $row["price"] . "</td>";
			echo "<td>" . $row["seller"] . "</td>";
			echo "<td>" . $row["brand"] . "</td>";
			echo "<td>" . $row["size"] . "</td>";
			echo "<td>";
			echo "<form method='post'>";
			echo "<input type='hidden' name='product_id' value='" . $row["product_id"] . "'>";
			echo "<button type='submit' name='delete_product'>Delete</button>";
			echo "</form>";
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "No products found";
	}
	$conn->close();
?>
