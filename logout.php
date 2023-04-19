<?php
 $con = mysqli_connect("localhost", "root", "", "thrift_hub");
session_start();
session_unset();
session_destroy();
header("Location: login.php");
?>