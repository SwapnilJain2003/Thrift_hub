<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thrift_hub";
    $connection = mysqli_connect($host, $username, $password, $dbname);
    if(!$connection)
    {
        die('Retrieval error....');
    }

    $sql = "SELECT * FROM product where category_id = 1";
    $result = $conn->query($sql);


$i = 0;

if ($result->num_rows > 0) {

	// Output data of each row
	$idarray= array();
	while($row = $result->fetch_assoc()) {
		echo "<br>";
		
		// Create an array to store the
		// id of the blogs		
		array_push($idarray,$row['product_id']);
	}
}
else {
	echo "0 results";
}
?>
