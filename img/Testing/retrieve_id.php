<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "kingpin";
$db = "yourmusic_test";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);  
if(mysqli_connect_errno()) {  
	die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  

/* To sort the id and limit the post by 4 */
$sql = "SELECT * FROM posts ORDER BY timestamp desc limit 4 ";
$result = $conn->query($sql);
$sqlall= "SELECT * FROM posts ORDER BY timestamp desc";
$resultall = $conn->query($sqlall);

$i = 0;

if ($result->num_rows > 0) {

	// Output data of each row
	$idarray= array();
	while($row = $result->fetch_assoc()) {
		echo "<br>";
		
		// Create an array to store the
		// id of the blogs		
		array_push($idarray,$row['id']);
	}
}
else {
	echo "0 results";
}
?>
